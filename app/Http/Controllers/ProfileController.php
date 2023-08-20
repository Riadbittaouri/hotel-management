<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


    class ProfileController extends Controller
    {
        public function edit()
        {
            $user = Auth::user();
            return view('users.edit-profile', compact('user'));
        }
    
        public function update(Request $request)
        {
            $user = Auth::user();
    
            // Validate the request data here
            // Update user profile data
    
            return redirect()->route('users.edit.profile')->with('success', 'Profile updated successfully.');
        }
    }
    


