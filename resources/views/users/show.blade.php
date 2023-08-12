@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h1>User Details</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Email: {{ $user->email }}</h5>
            </div>
        </div>
    </div>
@endsection
