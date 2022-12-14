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
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\KidController;
use App\Http\Controllers\Admin\PolicyController;
use App\Http\Controllers\Admin\ServiceBookingController;
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
    Route::get('/login', [AdminController::class, 'login'])->name('login');
    Route::post('/dologin', [AdminController::class, 'dologin'])->name('dologin');

    Route::middleware('isAdmin:admin')->group(function(){
        Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        Route::resource('settings', SettingController::class)->only('index', 'show', 'update', 'edit');
        Route::resource('social_links', SocialLinkController::class)->except('create','store');
        Route::resource('contact', ContactUsController::class)->only('index' , 'show' , 'destroy');
        Route::resource('sliders', SliderController::class);
        Route::resource('about', AboutUsController::class);
        Route::resource('services', ServiceController::class);
        Route::resource('galleries', GalleryController::class)->except('edit','update');
        Route::resource('center_classes', CenterClassController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('users', UserController::class);
        Route::resource('admins', AdminController::class);

        Route::resource('policies', PolicyController::class);

        Route::get('/info_about_kid/{kid}', [KidController::class, 'info_about_kid'])->name('info_about_kid');

        Route::get('/booking_services', [ServiceBookingController::class, 'index'])->name('booking_services.index');
        Route::delete('/booking_services/{booking_service}', [ServiceBookingController::class, 'destroy'])->name('booking_services.destroy');

        Route::get('/add_kid_view/{user}', [KidController::class, 'add_kid_view'])->name('add_kid_view');
        Route::post('/add_kid', [KidController::class, 'add_kid'])->name('add_kid');


        Route::get('/send_report_view/{user}/{kid}', [KidController::class, 'send_report_view'])->name('send_report_view');
        Route::post('/send_report', [KidController::class, 'send_report'])->name('send_report');

        Route::get('/send_image_view/{user}/{kid}', [KidController::class, 'send_image_view'])->name('send_image_view');
        Route::post('/send_image', [KidController::class, 'send_image'])->name('send_image');


        Route::get('/send_message_view/{user}/{kid}', [KidController::class, 'send_message_view'])->name('send_message_view');
        Route::post('/send_message', [KidController::class, 'send_message'])->name('send_message');


});

});