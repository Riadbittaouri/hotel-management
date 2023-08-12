<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
{
    $users = User::latest()->paginate(5);
    return view('users.index', compact('users'));
}

public function create()
{
    return view('users.create');
}

public function store(Request $request)
{
    // Validation
    User::create($request->all());
    return redirect()->route('users.index');
}

public function edit(User $user)
{
    return view('users.edit', compact('user'));
}

public function update(Request $request, User $user)
{
    // Validation
    $user->update($request->all());
    return redirect()->route('users.index');
}

public function destroy(User $user)
{
    $user->delete();
    return redirect()->route('users.index');
}

}
