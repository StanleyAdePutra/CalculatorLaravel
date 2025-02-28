<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('login');
});

Route::get('/calculator', function () {
    return view('calculator');
});

Route::get('/history', function () {
    return view('history');
});
