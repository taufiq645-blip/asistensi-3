<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('barang', BarangController::class);
