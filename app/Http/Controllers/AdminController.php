<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('login');
    }

    // Handle the login request
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            // Authentication passed, redirect to the admin dashboard
            return redirect()->intended('/admin/dashboard');
        } else {
            // Authentication failed, redirect back to the login form with an error message
            return redirect()->route('login')->with('error', 'Invalid credentials');
        }
    }

    // Logout the user
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
