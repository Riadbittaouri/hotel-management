@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h1>Create User</h1>

        <!-- User Creation Form -->
        <form action="{{ route('users.store') }}" method="POST" class="mb-3">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Create User</button>
        </form>
    </div>
@endsection
