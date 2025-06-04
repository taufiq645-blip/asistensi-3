<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Define API routes for inventory management
Route::middleware('api')->group(function () {
    Route::get('/inventory', 'InventoryController@index');
    Route::get('/inventory/{id}', 'InventoryController@show');
    Route::post('/inventory', 'InventoryController@store');
    Route::put('/inventory/{id}', 'InventoryController@update');
    Route::delete('/inventory/{id}', 'InventoryController@destroy');
});