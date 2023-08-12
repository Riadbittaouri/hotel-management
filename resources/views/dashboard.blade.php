@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h1>User Management</h1>

        <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Create User</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                
                    <tr>
                        <td>{{ auth()->user()->id }}</td>
                        <td>{{ auth()->user()->name }}</td>
                        <td>{{ auth()->user()->email }}</td>
                        <td>
                            <a href="{{ route('users.edit', auth()->user()->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('users.destroy', auth()->user()->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                
            </tbody>
        </table>
    </div>
@endsection
