@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h1>Edit User</h1>

        <!-- User Edit Form -->
        <form action="{{ route('users.update', $user->id) }}" method="POST" class="mb-3">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Update User</button>
        </form>
    </div>
@endsection
