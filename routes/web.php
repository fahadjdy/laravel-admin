<?php

use Illuminate\Support\Facades\Route;

// User routes
Route::get('/', function () {
    return view('user.index');
});


// Admin routes 
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () {
        return view('admin.index');
    });
});

