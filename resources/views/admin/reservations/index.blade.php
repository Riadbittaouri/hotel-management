@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h1>Manage Reservations</h1>

        <a href="{{ route('reservations.create') }}" class="btn btn-primary mb-3">Create Reservation</a>

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
                @foreach ($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->id }}</td>
                        <td>{{ $reservation->name }}</td>
                        <td>{{ $reservation->email }}</td>
                        <td>
                            <a href="{{ route('reservations.edit', $reservation->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
