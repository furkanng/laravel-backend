<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ApiController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DocumentCotroller;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\MailController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ReferenceCotroller;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SocialMediaController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\VariantController;
use App\Http\Controllers\Front\AuthController as FrontAuth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\UserController;
use \App\Http\Controllers\Admin\BulletinController;
use \App\Http\Controllers\Admin\SssController;
use \App\Http\Controllers\Front\CategoryController as FrontCategory;
use \App\Http\Controllers\Front\ProductController as FrontProduct;
use \App\Http\Controllers\Front\SssController as FrontSss;


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
    Route::resource('/bulletin',BulletinController::class);
    Route::resource('/sss',SssController::class);

    Route::resource('/api-setting', ApiController::class);
    Route::resource('/category', CategoryController::class);
    Route::resource('/subcategory', SubCategoryController::class);
    Route::resource('/product-variant', VariantController::class);
    Route::resource('/product-features', FeatureController::class);
    Route::resource('/products', ProductController::class);
});

//FRONT WITH AUTH API KODLARI
Route::middleware("api")->group(function () {
    Route::post('/register', [FrontAuth::class, "register"]);
    Route::post('/login', [FrontAuth::class, 'login']);
    Route::post('/logout', [FrontAuth::class, 'logout']);

});
// FRONT NO AUTH API KODLARI

Route::controller(FrontCategory::class)->group(function (){
    Route::get('/category','getCategory');
    Route::get('/sub-category','getSubCategory');
    Route::get('/sub-category/{catId}','getSubCatyWithCatId');

});

Route::controller(FrontProduct::class)->group(function (){
    Route::get('/product','getProduct');
    Route::get('/product/category/{catId}','getProductCatId');
    Route::get('/product/sub-category/{subCatId}','getProductSubCatId');

});

Route::get('/sss',[FrontSss::class,'getSss']);


//MIDDLEWARE OLMAYAN API KODLARI ADMIN
Route::post("/admin/forgot-password", [AdminController::class, "forgotPassword"]);
Route::post("/admin/reset-password", [AdminController::class, "resetPassword"]);

//MIDDLEWARE OLMAYAN API KODLARI FRONT
Route::post('/forgot-password', [UserController::class, 'forgotPassword']);
Route::post('/reset-password', [UserController::class, 'resetPassword']);
