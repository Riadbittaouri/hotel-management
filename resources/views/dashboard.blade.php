@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h1>Welcome to Admin Dashboard</h1>
        
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        Overview
                    </div>
                    <div class="card-body">
                        <p>No activity found.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        Recent Activities
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (auth()->user()->activities as $activity)
                                        @if (!$activity->user->is_admin)
                                            <tr>
                                                <td>{{ $activity->user->name }}</td>
                                                <td>{{ $activity->created_at->format('Y-m-d') }}</td>
                                                <td>{{ $activity->created_at->format('H:i:s') }}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    @if (auth()->user()->activities->where('user.is_admin', 0)->isEmpty())
                                        <tr>
                                            <td colspan="3">No activity found.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Admin Statistics
                    </div>
                    <div class="card-body">
                        <canvas id="admin-stats-chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
