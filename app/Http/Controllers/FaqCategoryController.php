<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\FaqCategory;


class FaqCategoryController extends Controller
{
    public function create()
{
    return view('createCat');
}

public function store(Request $request)
{
    // Add validation for form data
    $validatedData = $request->validate([
        'name' => 'required|string|unique:faq_categories',
    ]);

    // Create a new FAQ category
    $category = new FaqCategory;
    $category->name = $validatedData['name'];
    $category->save();

    return redirect()->route('faqPage')->with('success', 'FAQ category added successfully.');
}

public function destroy(FaqCategory $faq_category)
{
    // Check if the user is an admin
    if (Auth::user() && Auth::user()->is_admin) {
        $faq_category->delete();
        return redirect()->route('faqPage')->with('success', 'Category deleted successfully.');
    }

    return redirect()->route('faqPage')->with('error', 'You do not have permission to delete this category.');
}

}
