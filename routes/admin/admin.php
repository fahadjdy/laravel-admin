
<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Admin;
use App\Http\Controllers\Admin\Category;
use App\Http\Controllers\Admin\Slider;
use App\Http\Controllers\Admin\Testimonial;
use App\Http\Middleware\Admin\AdminAuth;
use App\Http\Controllers\Admin\SocialMedia;

Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', [Admin::class, 'login']);
    Route::post('/checkLogin', [Admin::class, 'checkLogin']);
});

Route::group(['prefix' => 'admin', 'middleware' => [AdminAuth::class]], function () {
    Route::get('/dashboard', [Admin::class, 'dashboard']);

    // Profile 
    Route::get('/profile', [Admin::class, 'profile']);
    Route::post('/profile/logo/save', [Admin::class, 'saveProfileLogo'])->name('admin.profile.logo.save'); // logo update
   
   // Profile - Site Detail
    Route::post('/profile/site-detail/favicon/save', [Admin::class, 'saveFavicon'])->name('admin.profile.favicon.save'); // logo update
    Route::post('/profile/site-detail/watermark/save', [Admin::class, 'saveWatermark'])->name('admin.profile.watermark.save'); // logo update
    Route::post('/profile/site-detail/{id}', [Admin::class, 'saveSiteDetails'])->name('profile.site.detail.update');

    // Profile - Bio Data
    Route::post('/profile/bio-data/save', [Admin::class, 'saveBioData'])->name('profile.save');

    // Profile - Social Media
    Route::get('/profile/social-media/getAjaxSocialMedia', [SocialMedia::class, 'getAjaxSocialMedia']);
    Route::post('/profile/social-media/store', [SocialMedia::class, 'store']);
    Route::post('/profile/social-media/update/{id}', [SocialMedia::class, 'update']);
    Route::delete('/profile/social-media/delete/{id}', [SocialMedia::class, 'destroy']);
    

    Route::get('/category', [Category::class, 'index']);
    Route::post('/category/getAjaxCategory', [Category::class, 'getAjaxCategory']);
    Route::get('/category/add', [Category::class, 'addOrEditCategory']);
    Route::get('/category/edit/{id}', [Category::class, 'addOrEditCategory'])->name('category.edit');
    Route::post('/category/update/{id}', [Category::class, 'update']);
    Route::post('/category/store', [Category::class, 'store']);
    Route::delete('/category/delete/{id}', [Category::class, 'destroy'])->name('category.delete');
    Route::delete('/category/image/delete/{id}', [Category::class, 'deleteCategoryImage']);


    // Testimonial 
    Route::get('/testimonial', [Testimonial::class, 'index']);


    // Slider 
    Route::get('/slider', [Slider::class, 'index']);

    Route::post('profile/update', [Admin::class, 'update'])->name('admin.profile.update');    
    Route::post('profile/change-password', [Admin::class, 'changePassword'])->name('admin.profile.change_password');

    Route::get('/logout', [Admin::class, 'logout']);
});

 




