<?php

use Illuminate\Support\Facades\Route;


Route::get('/', [\App\Http\Controllers\User\Home::class, 'index']);

include_once __DIR__.'/admin/admin.php';




