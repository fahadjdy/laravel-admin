<?php

use Illuminate\Support\Facades\Route;

    Route::get('/maintenance', function () {
        return view('maintenance');
    })->name('maintenance');

    Route::get('/404', function () {
        return view('404');
    })->name('404');  

    Route::get('/500', function () {
        return view('500');
    })->name('500');
    
    Route::get('/', [\App\Http\Controllers\User\Home::class, 'index'])->middleware(\App\Http\Middleware\User\Maintenance::class);


    // admin/admin.php routes include in bootstrap/app.php 




