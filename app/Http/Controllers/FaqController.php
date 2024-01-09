<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\FaqCategory;
use App\Models\FaqEntry; 

class FaqController extends Controller
{
    public function index()
    {
        // Fetch all FAQs and categories
        $categories = FaqCategory::all();
        $faqs = FaqEntry::all(); // Updated model name
        
        return view('faqPage', compact('categories', 'faqs'));
    }

    public function create()
{
    // Fetch all categories
    $categories = FaqCategory::all();
    
    return view('createFaq', compact('categories'));
}


    public function store(Request $request)
{
    // Add validation for form data
    $validatedData = $request->validate([
        'question' => 'required|string',
        'answer' => 'required|string',
        'category_id' => 'required|exists:faq_categories,id',
    ]);

    // Create a new FAQ entry
    $faq = new FaqEntry;
    $faq->question = $validatedData['question'];
    $faq->answer = $validatedData['answer'];
    $faq->category_id = $validatedData['category_id'];
    $faq->save();

    return redirect()->route('faqPage')->with('success', 'FAQ question added successfully.');
}

    public function edit(FaqEntry $faq)
    {
        // Implement logic to fetch the FAQ entry and return an edit view
        return view('faq.edit', compact('faq'));
    }

    public function destroy(FaqEntry $faq)
{
    // Check if the user is an admin
    if (Auth::user() && Auth::user()->is_admin) {
        $faq->delete();
        return redirect()->route('faqPage')->with('success', 'FAQ deleted successfully.');
    }

    return redirect()->route('faqPage')->with('error', 'You do not have permission to delete this FAQ.');
}
 }
