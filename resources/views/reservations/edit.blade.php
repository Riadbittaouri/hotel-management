@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Reservation</h1>
        <form method="POST" action="{{ route('reservations.update', $reservation->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $reservation->name }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $reservation->email }}" required>
            </div>
            <!-- Add more form fields if needed -->
            <button type="submit" class="btn btn-primary">Update Reservation</button>
        </form>
    </div>
@endsection
