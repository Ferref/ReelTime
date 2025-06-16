<?php

use Illuminate\Support\Facades\Route;


// Controllers
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('auth');
});

Route::get('/home', function () {
    return view('home');
});


Route::post('/register', [UserController::class, 'store'])->name('register');
