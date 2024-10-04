<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

//Route::inertia('/about', 'About')->name('about'); // укороченная запись
//Route::get('/about', function () {
//    return inertia('About', ['user' => 'Neo']);
//})->name('about'); // альтернатива варианту сверху

Route::get('/', function () {
//    sleep(1);
    return Inertia::render('Home');
})->name('home');


