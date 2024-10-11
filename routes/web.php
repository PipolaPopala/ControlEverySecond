<?php

use App\Http\Controllers\AuthController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    Route::get('/users', function(Request $request) {
        return inertia('Users', [
            'users' => User::when($request->search, function ($query) use ($request) {
                $query
                    ->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%');
            })->paginate(5)->withQueryString(),

            'searchTerm' => $request->search,

            'can' => [
                'delete_user' => Auth::user() ? Auth::user()->can('delete', User::class) : null,
            ]
        ]);
    })->name('users');
});

Route::middleware('guest')->group(function () {
    Route::inertia('/register', 'Register')->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::inertia('/login', 'Login')->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});


