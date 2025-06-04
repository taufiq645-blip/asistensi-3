<?php

use Illuminate\Support\Facades\Route;

// Home route
Route::get('/', function () {
    return view('welcome');
});

// Inventory routes
Route::resource('inventory', 'InventoryController');

// Additional routes can be added here as needed.