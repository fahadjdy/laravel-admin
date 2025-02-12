
<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Admin;
use App\Http\Controllers\Admin\Category;
use App\Http\Middleware\Admin\AdminAuth;

Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', [Admin::class, 'login']);
    Route::post('/table-data', [Admin::class, 'tableData']);
    Route::post('/checkLogin', [Admin::class, 'checkLogin']);
});

Route::group(['prefix' => 'admin', 'middleware' => [AdminAuth::class]], function () {
    Route::get('/dashboard', [Admin::class, 'dashboard']);

    Route::get('/profile', [Admin::class, 'profile']);

    Route::get('/category', [Admin::class, 'category']);
    Route::post('/category/getAjaxCategory', [Category::class, 'getAjaxCategory']);
    Route::get('/category/add', [Category::class, 'addOrEditCategory']);
    Route::get('/category/edit/{id}', [Category::class, 'addOrEditCategory'])->name('category.edit');
    Route::post('/category/update/{id}', [Category::class, 'update']);
    Route::post('/category/store', [Category::class, 'store']);
    Route::delete('/category/delete/{id}', [Category::class, 'destroy'])->name('category.delete');
    Route::delete('/category/image/delete/{id}', [Category::class, 'deleteCategoryImage']);



    Route::post('profile/update', [Admin::class, 'update'])->name('admin.profile.update');    
    Route::post('profile/change-password', [Admin::class, 'changePassword'])->name('admin.profile.change_password');

    Route::get('/logout', [Admin::class, 'logout']);
});

 