<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Authentication\AuthController;
use App\Http\Controllers\Admin\Authentication\AdminController;

Route::post('/login', [AuthController::class, "login"]);
Route::post('/register', [AuthController::class, "register"]);
Route::post('/logout', [AuthController::class, "logout"]);

Route::post("/forgot-password", [AdminController::class, "forgotPassword"]);
Route::post("/reset-password", [AdminController::class, "resetPassword"]);
