<?php

use Illuminate\Support\Facades\Route;

// User routes
Route::get('/', [\App\Http\Controllers\User\Home::class, 'index']);


// Admin routes 
// Route::group(['prefix' => 'admin'], function () {
//     Route::get('/login', [\App\Http\Controllers\User\Home::class, 'index']);
// });

