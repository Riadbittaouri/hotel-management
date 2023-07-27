<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login'); // Replace 'login' with the name of your login view file.
    }

    public function login(Request $request)
    {
        // ...

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
            // ...
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $request->session()->flash('logged_out', true);

        return redirect('/login');
    }
}
