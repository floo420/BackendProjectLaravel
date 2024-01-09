<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Message;
use App\Models\User;
use Auth;

class UserController extends Controller
{
    public function inbox()
    {
        $user = Auth::user();
        
        // Retrieve all user messages and messages from the collective admin account (admin_id = 0)
        $messages = Message::where('user_id', $user->id)
            ->orWhere('admin_id', 0)
            ->orderBy('created_at', 'asc')
            ->get();

        // Retrieve the list of admin users
        $admins = User::where('is_admin', 1)->get();

        return view('userInbox', compact('messages', 'admins'));
    }

    public function chat($user_id)
    {
        $user = Auth::user();

        // Retrieve messages between the user and the selected admin
        $messages = Message::where(function ($query) use ($user, $user_id) {
            $query->where('user_id', $user->id)->where('admin_id', $user_id);
        })->orWhere(function ($query) use ($user, $user_id) {
            $query->where('user_id', $user_id)->where('admin_id', 0);
        })->orderBy('created_at', 'asc')
            ->get();

        return view('user_chat', compact('messages', 'user_id'));
    }

    public function sendMessage(Request $request, $user_id)
    {
        $user = Auth::user();

        // Send a message to the selected admin
        Message::create([
            'user_id' => $user->id,
            'admin_id' => $user_id,
            'content' => $request->input('message'),
        ]);

        return redirect()->route('user.chat', ['user_id' => $user_id]);
    }

    public function accountInfo()
    {
        $user = Auth::user();
        return view('accountInfo', compact('user'));
    }

    public function updateAccountInfo(Request $request)
    {
        $user = Auth::user();
    
        $request->validate([
            'birthdate' => 'nullable|date',
            'about_me' => 'nullable|string',
            'avatar' => 'nullable|image|max:2048', // Validating for an image file
        ]);
    
        // Handle the user's upload
        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $path = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $path;
        }
    
        $user->birthdate = $request->birthdate;
        $user->about_me = $request->about_me;
        $user->save();
    
        return redirect()->route('account.info')->with('success', 'Account updated successfully!');
    }
    

}
