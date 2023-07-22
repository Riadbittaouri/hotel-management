<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




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



Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/login', [AdminController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AdminController::class, 'login'])->name('login.post');
Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

Route::get('/administration', function () {
    return view('administration'); // This will load the 'administration.blade.php' view.
})->name('administration');

Route::get('/dashboard', function () {
    return view('dashboard'); // This will load the 'dashboard.blade.php' view.
})->name('dashboard');

Route::post('/login', [AuthController::class, 'login'])->name('login.post');
