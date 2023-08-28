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
                        <p>Welcome to the Admin Dashboard! This section provides a snapshot of key statistics and insights related to user activities and engagement. You can quickly see the total number of users registered, the total logins recorded, and the average number of logins per day. Additionally, we highlight the number of new users who joined this month and the total active users interacting with the platform. As an admin, you can gain insights into user engagement through the average activity per user metric. Explore further to analyze user behavior and make informed decisions to enhance user experience.</p>   
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        Recent Activities
                    </div>
                    <div class="card-body" style="height: 300px; overflow-y: auto;">
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
                                        <td colspan="3">No recent non-admin activities found.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
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
                        <ul>
                            <li>Total Users: {{ App\Models\User::count() }}</li>
                            <li>Total Logins: {{ App\Models\UserActivity::count() }}</li>
                            <li>Average Logins per Day: {{ round(App\Models\UserActivity::count() / (strtotime('now') - strtotime('first day of this month')) * 86400, 2) }}</li>
                            <li>New Users This Month: {{ App\Models\User::whereMonth('created_at', now()->month)->count() }}</li>
                            <li>Total Active Users: {{ App.Models.UserActivity::distinct('user_id')->count() }}</li>
                            <li>Average Activity per User: {{ round(App.Models.UserActivity::count() / App.Models.UserActivity::distinct('user_id')->count(), 2) }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
