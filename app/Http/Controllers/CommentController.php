<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
{
    // Validate the comment input
    $request->validate([
        'comment_text' => 'required',
        'news_id' => 'required|exists:news,id', // Ensure the news post exists
    ]);

    // Create a new comment
    Comment::create([
        'user_id' => auth()->id(), // Get the authenticated user's ID
        'news_id' => $request->input('news_id'),
        'comment_text' => $request->input('comment_text'),
    ]);

    return back()->with('success', 'Comment added successfully.');
}
}
