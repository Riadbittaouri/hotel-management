@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create New Reservation</h1>
        <form method="POST" action="{{ route('reservations.store') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <!-- Add more form fields if needed -->
            <button type="submit" class="btn btn-primary">Create Reservation</button>
        </form>
    </div>
@endsection
