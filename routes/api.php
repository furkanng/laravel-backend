<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Front\AuthController as FrontAuth;
use Illuminate\Support\Facades\Route;

//ADMIN API KODLARI
Route::prefix('admin')->middleware("admin-api")->group(function () {
    Route::post('/login', [AuthController::class, "login"]);
    Route::post('/register', [AuthController::class, "register"]);
    Route::post('/logout', [AuthController::class, "logout"]);
});

//FRONT API KODLARI
Route::middleware("api")->group(function () {
    Route::post('/register', [FrontAuth::class, "register"]);
    Route::post('/login',[FrontAuth::class,'login']);
    Route::post('/logout',[FrontAuth::class,'logout']);

});

//MIDDLEWARE OLMAYAN API KODLARI ("forgotPassword","resetPassword" vb.)
