<?php

use App\Http\Controllers\calculatorController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('login');
});

Route::get('/calculator', [calculatorController::class, 'index'])->name('calculator');

Route::get('/history', [calculatorController::class, 'history'])->name('history');

Route::post('/api/calculate', [calculatorController::class, 'calculate'])->name('calculate');
