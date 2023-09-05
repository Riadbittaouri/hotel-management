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
        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea name="message" class="form-control">{{ $reservation->message }}</textarea>
        </div>
        <div class="mb-3">
            <label for="date1" class="form-label">Date d'arrivée</label>
            <input type="date" name="date1" class="form-control" value="{{ $reservation->date1 }}" required>
        </div>
        <div class="mb-3">
            <label for="date2" class="form-label">Date de départ</label>
            <input type="date" name="date2" class="form-control" value="{{ $reservation->date2 }}" required>
        </div>
        <div class="mb-3">
            <label for="subject" class="form-label">Subject</label>
            <input type="text" name="subject" class="form-control" value="{{ $reservation->subject }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Reservation</button>
    </form>
</div>
@endsection
