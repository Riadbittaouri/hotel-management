@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h1>Edit Reservation</h1>

        <form action="{{ route('reservations.update', $reservation->id) }}" method="POST">
            @csrf
            @method('PUT')
            <!-- Ajoutez les champs du formulaire ici avec les valeurs pré-remplies -->
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
