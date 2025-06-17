<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;


// Controllers
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('auth');
});

Route::get('/getMovies', [MovieController::class, 'getMovies'])->name('getMovies');
Route::post('/register', [UserController::class, 'store'])->name('register');
Route::post('/login', [UserController::class, 'login'])->name('login');
