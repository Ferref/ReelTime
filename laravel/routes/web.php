<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;


// Controllers
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('auth');
});

Route::get('/home', [MovieController::class, 'getMovies'])->name('home');
Route::post('/register', [UserController::class, 'store'])->name('register');
Route::post('/login', [UserController::class, 'login'])->name('login');
