<?php

namespace App\Http\Controllers;

use App\Models\UserActivity;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $nonAdminUserActivities = UserActivity::whereHas('user', function ($query) {
            $query->where('is_admin', 0);
        })->latest()->take(3)->get();

        return view('dashboard', compact('nonAdminUserActivities'));
    }
}