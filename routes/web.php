<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

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
    return view('administration'); // This will load the 'administration.blade.php' view.
})->middleware('auth')->name('administration');

Route::get('/dashboard', function () {
    return view('dashboard'); // This will load the 'dashboard.blade.php' view.
})->middleware('auth')->name('dashboard');

// AuthController login route
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
