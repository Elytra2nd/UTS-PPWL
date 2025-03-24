<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\CartController;
Route::get('/', function () {
    return view('welcome');
});
// routes/web.php

Route::get('/obat', [ObatController::class, 'index'])->name('obat.index');
Route::get('/obat/cari', [ObatController::class, 'search'])->name('obat.search');


Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index']);
    Route::post('/cart', [CartController::class, 'store']);
    
});

