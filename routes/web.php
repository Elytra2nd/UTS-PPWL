<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// routes/web.php
use App\Http\Controllers\ObatController;
Route::get('/obat', [ObatController::class, 'index'])->name('obat.index');
Route::get('/obat/cari', [ObatController::class, 'search'])->name('obat.search');

use App\Http\Controllers\CartController;
Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index']);
    Route::post('/cart', [CartController::class, 'store']);
    
});

