<?php

use Illuminate\Support\Facades\Route;


Route::get('/', [\App\Http\Controllers\User\Home::class, 'index']);

require base_path('routes/admin/admin.php');



