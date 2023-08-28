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
        
            // Validate the request data here and update user profile data
            // For example:
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            // ... update other fields as needed
            $user->save();
        
            return redirect()->route('profile.edit')->with('success', 'Profile updated successfully.');
        }
        
    }
    


