<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ReservationController;

Route::get('/', function () {
    return redirect()->route('login');
});

// Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/admin/dashboard', [EventController::class, 'adminDashboard'])
    ->middleware(['auth', 'isAdmin'])
    ->name('admin.dashboard');

// Dashboard Student
Route::get('/student/dashboard', [EventController::class, 'dashboard'])
    ->middleware('auth')
    ->name('student.dashboard');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// CRUD Events
Route::resource('events', EventController::class)->middleware('auth');

// Réservation
Route::post('/events/{event}/reserve', [ReservationController::class, 'store'])
    ->middleware('auth')
    ->name('reservations.store');

// Mes billets
Route::get('/my-tickets', [ReservationController::class, 'myTickets'])
    ->middleware('auth')
    ->name('tickets.index');
