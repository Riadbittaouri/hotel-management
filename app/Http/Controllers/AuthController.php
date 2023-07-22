<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed, redirect to the dashboard or administration page.
            return redirect()->route('dashboard'); // Change 'dashboard' to 'administration' if needed.
        } else {
            // Authentication failed, redirect back with an error message.
            return back()->withErrors(['email' => 'Invalid credentials. Please try again.']);
        }
    }
}
