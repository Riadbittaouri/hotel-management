<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;

// Public routes
Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/index', function () {
    return view('index');
});

Route::get('/rooms', function () {
    return view('rooms');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');

// Authentication routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Authenticated user routes
Route::middleware(['auth'])->group(function () {
    // Dashboard routes
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profile routes
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    // Manage Reservations

    Route::get('/manage/reservations', [ReservationController::class, 'index'])->name('manage.reservations');
    Route::get('/reservations/{id}/edit', [ReservationController::class, 'edit'])->name('reservations.edit');
    Route::get('/reservations/{id}/delete', [ReservationController::class, 'delete'])->name('reservations.delete');
    Route::put('/reservations/{id}', [ReservationController::class, 'update'])->name('reservations.update');
    // Admin-only routes
    Route::middleware(['auth'])->group(function () {
        // Admin Dashboard
        Route::get('/admin/dashboard', 'AdminDashboardController@index')->name('admin.dashboard');
    
        // User Management
        Route::resource('users', UserController::class);
        Route::resource('reservations', ReservationController::class, ['as' => 'admin']);
    
        // Additional admin routes can be added here
    });
    
});
