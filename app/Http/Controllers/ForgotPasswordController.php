<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Validation\ValidationException; 

class ForgotPasswordController extends Controller
{
    public function showResetForm(Request $request, $token = null)
    {
        return view('forgotPassword')->with(['token' => $token, 'email' => $request->email]);
    }
    
    public function changePassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email', // Add email field validation
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        // Find the user by email
        $user = \App\Models\User::where('email', $request->input('email'))->first();

        // Check if the user exists
        if (!$user) {
            throw ValidationException::withMessages([
                'email' => ['User not found.'],
            ]);
        }

        // Check if the current password is correct
        if (!Hash::check($request->input('current_password'), $user->password)) {
            throw ValidationException::withMessages([
                'current_password' => ['The current password is incorrect.'],
            ]);
        }

        // Update the password
        $user->password = Hash::make($request->input('new_password'));
        $user->save();

        // Add a success flash message
        return redirect()->route('forgot-password')->with('success', 'Password changed successfully.');
    }
}
