<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;


// Controllers
use App\Http\Controllers\UserController;
use App\Http\Middleware\EnsureAuth;

Route::get('/', function () {
    return view('auth');
});


// If not logged in
Route::post('/register', [UserController::class, 'store'])->name('register');
Route::post('/login', [UserController::class, 'login'])->name('login');


// If logged in
Route::middleware([EnsureAuth::class])->group(function(){
    Route::get('/home', [MovieController::class, 'getMovies'])->name('home');
    Route::get('/watchlater', [MovieController::class, 'getWatchlater'])->name('watchlater');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/movie/{id}', [MovieController::class, 'getMovieDetails'])->name('movie.details');
    Route::post('/movie/{id}', [MovieController::class, 'toWatchlist'])->name('movie.towatchlist');
    Route::delete('/movie/{id}', [MovieController::class, 'removeFromWatchlist'])->name('movie.removefromwatchlist');
});