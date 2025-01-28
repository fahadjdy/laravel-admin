
<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Admin;

Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', [Admin::class, 'login']);
    Route::post('/table-data', [Admin::class, 'tableData']);
    Route::post('/checkLogin', [Admin::class, 'checkLogin']);
});

Route::group(['prefix' => 'admin', 'middleware' => 'adminAuth'], function () {
    Route::get('/dashboard', [Admin::class, 'dashboard']);
    Route::get('/profile', [Admin::class, 'profile']);
    Route::get('/category', [Admin::class, 'category']);
    Route::get('/logout', [Admin::class, 'logout']);
    Route::post('profile/update', [Admin::class, 'update'])->name('admin.profile.update');
    Route::post('profile/change-password', [Admin::class, 'changePassword'])->name('admin.profile.change_password');
});

 