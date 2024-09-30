<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
});

Route::inertia('/about', 'About', ['user' => 'Neo']);
//Route::get('/about', function () {
//    return inertia('About', ['user' => 'Neo']);
//}); // альтернатива варианту сверху
