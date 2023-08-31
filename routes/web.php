<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;


// Existing routes using Route::middleware and Route::prefix
Route::middleware(['auth', 'prevent.dashboard'])->group(function () {
    Route::prefix('admin')->group(function () {
        // Add your existing routes here
    });
    Route::resource('reservations', ReservationController::class);
});

// New user management routes
Route::middleware(['auth', 'prevent.dashboard'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});

// Your other existing routes
Route::get('/', function () {
    return view('index');
});

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

// Login and Logout Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Administration and Dashboard Routes
Route::get('/administration', function () {
    return view('administration');
})->middleware(['auth', 'prevent.dashboard'])->name('administration');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');


Route::prefix('admin')->group(function () {
    // ...
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});


// AuthController login route
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/users', [UserController::class, 'index'])->name('users.index');


Route::resource('users','App\Http\Controllers\Admin\UserController');
Route::middleware(['auth', 'admin'])->prefix('admin')->namespace('Admin')->group(function () {
    Route::resource('reservations', 'ReservationController');
});


Route::get('/admin/dashboard', 'AdminDashboardController@index')->name('admin.dashboard');

// Add this route to handle profile editing
Route::get('/profile/edit', 'App\Http\Controllers\ProfileController@edit')->name('profile.edit');
// Define the route for updating the profile
Route::post('/profile/update', 'App\Http\Controllers\ProfileController@update')->name('profile.update');
Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit', 'App\Http\Controllers\ProfileController@edit')->name('profile.edit');
    Route::post('/profile/update', 'ProfileController@update')->name('profile.update');
    Route::get('/manage/reservations', [ReservationController::class, 'index'])->name('manage.reservations');

});
