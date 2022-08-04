<?php

use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CenterClassController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SocialLinkController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('settings', SettingController::class)->only('index', 'show', 'update', 'edit');
    Route::resource('social_links', SocialLinkController::class)->except('create','store');
    // Route::resource('contact-us', ContactUsController::class)->only('index' , 'show' , 'destroy');
    Route::resource('sliders', SliderController::class);
    Route::resource('about_us', AboutUsController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('galleries', GalleryController::class)->except('edit','update');
    Route::resource('center_classes', CenterClassController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('users', UserController::class);

});
