<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('projects', ProjectController::class);

});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])
    ->group(function () {
        Route::get('/dashboard', function () {
            $users = App\Models\User::all(); // Obtén los usuarios aquí
            return view('users.index', compact('users'));
        })->name('dashboard');
});

