<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ApiController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DocumentCotroller;
use App\Http\Controllers\Admin\MailController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\ReferenceCotroller;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SocialMediaController;
use App\Http\Controllers\Front\AuthController as FrontAuth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\UserController;
use \App\Http\Controllers\Admin\BulletinController;

//ADMIN API KODLARI
Route::prefix('admin')->middleware("admin-api")->group(function () {
    Route::post('/login', [AuthController::class, "login"]);
    Route::post('/register', [AuthController::class, "register"]);
    Route::post('/logout', [AuthController::class, "logout"]);
    Route::resource('/pages', PagesController::class);
    Route::resource('/references', ReferenceCotroller::class);
    Route::resource('/documents', DocumentCotroller::class);
    Route::resource('/social-media-setting', SocialMediaController::class);
    Route::resource('/general-setting', SettingController::class);
    Route::resource('/mail-setting', MailController::class);
    Route::resource('/contact-setting', ContactController::class);
    Route::resource('/bulletin', BulletinController::class);
    Route::resource('/api-setting', ApiController::class);
});

//FRONT API KODLARI


//MIDDLEWARE OLMAYAN API KODLARI ADMIN
Route::post("/admin/forgot-password", [AdminController::class, "forgotPassword"]);
Route::post("/admin/reset-password", [AdminController::class, "resetPassword"]);

//MIDDLEWARE OLMAYAN API KODLARI FRONT E-TICARET
Route::post('/forgot-password', [UserController::class, 'forgotPassword']);
Route::post('/reset-password', [UserController::class, 'resetPassword']);

//FRONT E-TICARET API KODLARI
Route::middleware("api")->group(function () {
    Route::post('/register', [FrontAuth::class, "register"]);
    Route::post('/login', [FrontAuth::class, 'login']);
    Route::post('/logout', [FrontAuth::class, 'logout']);
});

//ADMIN E-TICARET API KODLARI
Route::prefix('admin/ecommerce')->middleware("admin-api")->group(function () {

});
