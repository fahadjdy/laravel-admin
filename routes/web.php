<?php

use Illuminate\Support\Facades\Route;


Route::get('/', [\App\Http\Controllers\User\Home::class, 'index']);

// admin/admin.php routes include in bootstrap/app.php 




