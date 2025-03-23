<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// routes/web.php
use App\Http\Controllers\ObatController;
Route::get('/obat', [ObatController::class, 'index'])->name('obat.index');
Route::get('/obat/cari', [ObatController::class, 'search'])->name('obat.search');
Route::get('/obat/{id}', [ObatController::class, 'show'])->name('obat.show');
