<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{

// ...

public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');

    // Check if the user exists in the database
    $user = User::where('email', $credentials['email'])->first();

    if (!$user) {
        throw ValidationException::withMessages([
            'email' => 'These credentials do not match our records.',
        ]);
    }

    if (Auth::attempt($credentials)) {
        // Authentication passed...

        // Check if the user is an admin (you need to define a column in your users table to identify admins)
        if ($user->is_admin) {
            return redirect()->intended('administration'); // Redirect admin to the administration page.
        } else {
            // If not an admin, redirect to a different page for regular users.
            return redirect()->intended('dashboard'); // Replace 'dashboard' with your desired redirect route for regular users.
        }
    } else {
        throw ValidationException::withMessages([
            'email' => 'These credentials do not match our records.',
        ]);
    }
}

}
