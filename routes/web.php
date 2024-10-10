<?php

use App\Http\Controllers\AuthController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

//Route::inertia('/about', 'About')->name('about'); // укороченная запись
//Route::get('/about', function () {
//    return inertia('About', ['user' => 'Neo']);
//})->name('about'); // альтернатива варианту сверху

//Route::get('/', function () {
////    sleep(1);
//    return Inertia::render('Home');
//})->name('home');

Route::inertia('/', 'Home')->name('home');

Route::middleware('auth')->group(function () {
    Route::inertia('/dashboard', 'Dashboard')->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::inertia('/users', 'Users', ['users' => User::paginate(5)])->name('users');
});

Route::middleware('guest')->group(function () {
    Route::inertia('/register', 'Register')->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::inertia('/login', 'Login')->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});


