@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        @if (auth()->user()->is_admin)
            <h1>Welcome to Admin Dashboard</h1>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            Admin Activities
                        </div>
                        <div class="card-body" style="height: 300px; overflow-y: auto;">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>User ID</th>
                                        <th>Activity Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $userActivities = App\Models\UserActivity::orderBy('created_at', 'desc')->get();
                                    @endphp
                                    @foreach ($userActivities as $activity)
                                        <tr>
                                            <td>{{ $activity->user_id }}</td>
                                            <td>{{ $activity->created_at }}</td>
                                        </tr>
                                    @endforeach
                                    @if ($userActivities->isEmpty())
                                        <tr>
                                            <td colspan="3">No user activities found.</td>
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
                                <li>Total Active Users: {{ App\Models\UserActivity::distinct('user_id')->count() }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-info" role="alert">
                <p>Welcome to your User Dashboard! Explore your activities and account details.</p>
            </div>
        @endif
    </div>
@endsection
