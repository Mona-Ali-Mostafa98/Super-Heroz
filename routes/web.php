<?php

use App\Http\Controllers\Website\AboutUsController;
use App\Http\Controllers\Website\CategoryController;
use App\Http\Controllers\Website\ClassController;
use App\Http\Controllers\Website\ContactUsController;
use App\Http\Controllers\Website\GalleryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\IndexController;
use App\Http\Controllers\Website\PolicyController;
use App\Http\Controllers\Website\ServiceController;
use App\Http\Controllers\Website\UserController;

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

Route::prefix('website')->name('website.')->group(function () {
    Route::get('/index', [IndexController::class, 'index'])->name('index');
    Route::get('/about_us', [AboutUsController::class, 'index'])->name('about_us');
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('/classes', [ClassController::class, 'index'])->name('classes');
    Route::get('/contact_us/create', [ContactUsController::class, 'create'])->name('contact_us.create');
    Route::post('/contact_us/store', [ContactUsController::class, 'store'])->name('contact_us.store');
    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
    Route::get('/services', [ServiceController::class, 'index'])->name('services');
    Route::get('/services/{service}', [ServiceController::class, 'show'])->name('services.show');
    Route::get('/policy', [PolicyController::class, 'index'])->name('policy');

    Route::get('/reserve_service', [ServiceController::class, 'reserve_service'])->name('reserve_service');
    Route::post('/reserve_service', [ServiceController::class, 'reserve_service_store'])->name('reserve_service_store');

    Route::get('/register/create', [UserController::class, 'create'])->name('register.create');
    Route::post('/register', [UserController::class, 'store'])->name('register');

    Route::get('/profile', [UserController::class, 'profile'])->name('profile')->middleware('auth'); //edit , show
    Route::put('/profile/{user}', [UserController::class, 'update_profile'])->name('profile.update')->middleware('auth');

    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/dologin', [UserController::class, 'dologin'])->name('dologin');
    // Route::post('/reset_password', [UserController::class, 'dologin'])->name('dologin');

    Route::get('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');


    Route::get('/add_kid_view', [UserController::class, 'add_kid_view'])->name('add_kid_view');
    Route::post('/add_kid/store', [UserController::class, 'add_kid'])->name('add_kid.store');
    Route::get('/kids', [UserController::class, 'kids'])->name('kids');



});