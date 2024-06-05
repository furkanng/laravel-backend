<?php

use App\Http\Controllers\Front\AuthController as FrontAuth;
use App\Http\Controllers\Front\BasketController;
use App\Http\Controllers\Front\CategoryController as FrontCategory;
use App\Http\Controllers\Front\PagesController as FrontPages;
use App\Http\Controllers\Front\ProductController as FrontProduct;
use App\Http\Controllers\Front\SssController as FrontSss;
use App\Http\Controllers\Front\UserController;
use Illuminate\Support\Facades\Route;


//FRONT WITH AUTH API KODLARI
Route::middleware("api")->group(function () {
    Route::post('/register', [FrontAuth::class, "register"]);
    Route::post('/login', [FrontAuth::class, 'login']);
    Route::post('/logout', [FrontAuth::class, 'logout']);
    Route::get("/basket", [BasketController::class, "getBasket"]);
    Route::get("/add-basket", [BasketController::class, "addBasket"]);
    Route::get("/remove-basket", [BasketController::class, "removeBasket"]);
});
// FRONT NO AUTH API KODLARI

Route::controller(FrontCategory::class)->group(function () {
    Route::get('/category', 'getCategory');
    Route::get('/sub-category', 'getSubCategory');
    Route::get('/sub-category/{catId}', 'getSubCatyWithCatId');
});

Route::controller(FrontProduct::class)->group(function () {
    Route::get('/product', 'getProduct');
    Route::get('/product/category/{catId}', 'getProductCatId');
    Route::get('/product/sub-category/{subCatId}', 'getProductSubCatId');
});

Route::get('/sss', [FrontSss::class, 'getSss']);
Route::get('/pages', [FrontPages::class, 'getPages']);


//MIDDLEWARE OLMAYAN API KODLARI ADMIN


//MIDDLEWARE OLMAYAN API KODLARI FRONT
Route::post('/forgot-password', [UserController::class, 'forgotPassword']);
Route::post('/reset-password', [UserController::class, 'resetPassword']);
