<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // Authentication passed...
        $user = Auth::user(); // Retrieve the authenticated user
        $is_admin = ($user && $user->isAdmin()) ? true : false;

        return view('homePageUsers')->with(['user' => $user, 'is_admin' => $is_admin]);
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
}

public function logout()
{
    Auth::logout();

    return redirect()->route('homePageUsers'); 
}

}
