@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12"> <!-- Extend the column size for a large table -->
            <div class="card">
                <div class="card-header">{{ __('Manage Reservations') }}</div>

                <div class="card-body">
                    <div class="table-responsive"> <!-- Make the table responsive -->
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th>Date d'arrivée</th>
                                    <th>Date de départ</th>
                                    <th>Subject</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reservations as $reservation)
                                    <tr>
                                        <td>{{ $reservation->name }}</td>
                                        <td>{{ $reservation->email }}</td>
                                        <td>{{ $reservation->message }}</td>
                                        <td>{{ $reservation->date1 }}</td>
                                        <td>{{ $reservation->date2 }}</td>
                                        <td>{{ $reservation->subject }}</td>
                                        <td>
                                            <a href="{{ route('reservations.edit', ['id' => $reservation->id]) }}">Edit</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('reservations.delete', ['id' => $reservation->id]) }}">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
