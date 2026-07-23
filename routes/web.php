<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;

Route::get('/', function () {
    return redirect('/login');
});

// Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Dashboard Admin
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'isAdmin'])->name('admin.dashboard');

// Dashboard Student
Route::get('/student/dashboard', function () {
    return view('student.dashboard');
})->middleware('auth')->name('student.dashboard');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// CRUD Events
Route::resource('events', EventController::class)->middleware('auth');
