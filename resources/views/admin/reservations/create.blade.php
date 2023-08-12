@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h1>Create Reservation</h1>

        <form action="{{ route('reservations.store') }}" method="POST">
            @csrf
            <!-- Ajoutez les champs du formulaire ici -->
            <button type="submit" class="btn btn-success">Create</button>
        </form>
    </div>
@endsection
