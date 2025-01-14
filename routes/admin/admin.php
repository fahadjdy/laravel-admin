
<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Admin;

Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', [Admin::class, 'login']);
    Route::post('/checkLogin', [Admin::class, 'checkLogin']);
});

Route::group(['prefix' => 'admin', 'middleware' => 'adminAuth'], function () {
    Route::get('/dashboard', [Admin::class, 'dashboard']);
    Route::get('/profile', [Admin::class, 'profile']);
    Route::get('/logout', [Admin::class, 'logout']);
});

 