<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactNotification;
use Auth;

class ContactController extends Controller
{
    public function showContactForm()
    {
        return view('contactForm');
    }

    public function sendContactMessage(Request $request)
{
    // Validate the form data
    $request->validate([
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
        'email' => 'required|email', // Add email validation
    ]);

    // Get the currently authenticated user (assuming you have user authentication)
    $user = Auth::user();

    // Get all admin users
    $adminUsers = User::where('is_admin', 1)->get();

    // Create a new message for each admin user
    foreach ($adminUsers as $adminUser) {
        Message::create([
            'user_id' => optional($user)->id,
            'admin_id' => $adminUser->id,
            'subject' => $request->input('subject'),
            'content' => $request->input('message'),
            'sender_email' => $request->input('email'), // Use the user's provided email as the sender
        ]);

        // Send an email notification to the admin user
       // Mail::to($adminUser->email)
    //->send(new ContactNotification($request->all(), $request->input('name'), $request->input('email')));

    }

    // Redirect back with a success message
    return redirect()->route('contact.form')->with('success', 'Your message has been sent successfully!');
}

}
