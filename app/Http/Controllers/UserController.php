<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Show the list of users
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }
    // Show the form to create a new user
    public function create()
    {
        return view('users.create');
    }

    // Store a new user in the database
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    // Show a specific user
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    // Show the form to edit a user
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // Update a user in the database
    public function update(Request $request, User $user)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6',
        ]);

        $user->update([
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ]);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    // Delete a user from the database
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
