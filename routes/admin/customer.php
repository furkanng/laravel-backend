<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\Customer\CommentController;
use App\Http\Controllers\Admin\Customer\CustomerController;
use App\Http\Controllers\Admin\Customer\MessageController;

Route::resource('/', CustomerController::class);
Route::resource('/comment', CommentController::class);
Route::resource('/message', MessageController::class);
