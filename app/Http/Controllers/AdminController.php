<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function inbox()
{
    $admin = Auth::user();
    $messages = Message::where('admin_id', $admin->id)
        ->orderBy('created_at', 'asc')
        ->get();

    // Retrieve the users associated with the messages
    $users = User::whereIn('id', $messages->pluck('user_id'))->get();

    return view('adminInbox', compact('messages', 'users'));
}


    public function chat($user_id)
    {
        $admin = Auth::user();

        $messages = Message::where(function ($query) use ($user_id, $admin) {
            $query->where('user_id', $user_id)->where('admin_id', $admin->id);
        })->orWhere(function ($query) use ($user_id, $admin) {
            $query->where('user_id', $admin->id)->where('admin_id', $user_id);
        })->orderBy('created_at', 'asc')
        ->get();

        return view('admin_chat', compact('messages', 'user_id'));
    }

    public function sendMessage(Request $request, $user_id)
    {
        $admin = Auth::user();

        Message::create([
            'user_id' => $admin->id,
            'admin_id' => $user_id,
            'content' => $request->input('message'),
        ]);

        return redirect()->route('admin.chat', ['user_id' => $user_id]);
    }

    public function manageUsers()
    {
        $users = User::all();
        return view('manageUsers', compact('users'));
    }

    public function updateUser(Request $request, $userId)
    {
        $user = User::findOrFail($userId);
        $user->is_admin = $request->has('make_admin');
        $user->save();

        return redirect()->back()->with('success', 'User updated successfully!');
    }

    public function deleteUser($userId)
    {
        User::findOrFail($userId)->delete();
        return redirect()->back()->with('success', 'User deleted successfully!');
    }
}
