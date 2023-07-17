<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'date1' => 'required|date',
            'date2' => 'required|date',
            'subject' => 'required',
        ]);

        Contact::create($validatedData);

        return redirect()->back()->with('success', 'Data saved successfully!');
    }
}
