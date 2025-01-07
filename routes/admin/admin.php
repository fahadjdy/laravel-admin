
<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Admin;
use App\Http\Middleware\Admin\AdminAuth;

Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', [Admin::class, 'index']);
});

 