<?php

namespace App\Http\Controllers;


use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class NewsController extends Controller
{
   // Display a listing of the news.
public function index()
{
    $newsItems = News::all();

    return view('newsPage', compact('newsItems'));
}


    public function create()
{
    if (Auth::user() && Auth::user()->is_admin) {
        $newsItems = News::all(); // Initialize it with an empty array or retrieve news items here if needed
        return view('create', compact('newsItems'));
    } else {
        // Handle unauthorized access or display an error message.
        return redirect()->route('news.index')->with('error', 'You are not authorized to add news.');
    }
}


    public function store(Request $request)
{
    if (Auth::user() && Auth::user()->is_admin) {
        // Validation rules for news creation
        $request->validate([
            'Title' => 'required|max:255',
            'Content' => 'required',
            'Cover_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'Publishing_date' => 'required|date',
        ]);

        // Handle file upload (if a cover image is provided)
        if ($request->hasFile('Cover_image')) {
            $image = $request->file('Cover_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public', $imageName);
        } else {
            $imageName = null;
        }

        // Create and save the news
        News::create([
            'Title' => $request->input('Title'),
            'Content' => $request->input('Content'),
            'Cover_image' => $imageName,
            'Publishing_date' => $request->input('Publishing_date'),
        ]);

        return redirect()->route('news.index')->with('success', 'News added successfully.');
    } else {
        // Handle unauthorized access or display an error message.
        return redirect()->route('newsPage')->with('error', 'You are not authorized to add news.');
    }
}

    public function show($id)
{
    $newsItem = News::find($id);

    // Check if the news item was found
    if (!$newsItem) {
        return redirect()->route('news.index')->with('error', 'News item not found.');
    }

    return view('newsPage', compact('newsItem'));
}

public function edit($id)
{
    $newsItem = News::find($id);

    // Check if the news item was found
    if (!$newsItem) {
        return redirect()->route('news.index')->with('error', 'News item not found.');
    }

    return view('edit', compact('newsItem'));
}

public function update(Request $request, $id)
{
    // Validate the request data
    $request->validate([
        'Title' => 'required|max:255',
        'Content' => 'required',
        'Cover_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'Publishing_date' => 'required|date',
    ]);

    // Find the news item by ID
    $newsItem = News::find($id);

    // Check if the news item was found
    if (!$newsItem) {
        return redirect()->route('news.index')->with('error', 'News item not found.');
    }

    // Handle file upload (if a new cover image is provided)
    if ($request->hasFile('Cover_image')) {
        $image = $request->file('Cover_image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public', $imageName);
        $newsItem->Cover_image = $imageName;
    }

    // Update the news item with the new data
    $newsItem->Title = $request->input('Title');
    $newsItem->Content = $request->input('Content');
    $newsItem->Publishing_date = $request->input('Publishing_date');
    $newsItem->save();

    return redirect()->route('newsPage')->with('success', 'News updated successfully.');
}

public function destroy($id)
{
    $news = News::findOrFail($id);
    $news->delete();

    return redirect()->route('newsPage')->with('success', 'News item deleted successfully.');
}


}



