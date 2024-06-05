<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Setting\ApiController;
use App\Http\Controllers\Admin\Setting\ContactController;
use App\Http\Controllers\Admin\Setting\EmailController;
use App\Http\Controllers\Admin\Setting\SettingController;
use App\Http\Controllers\Admin\Setting\SocialMediaController;
use App\Http\Controllers\Admin\Setting\LinkListController;


Route::resource('/general', SettingController::class)->only("index", "store");
Route::resource('/api', ApiController::class)->only("index", "store");
Route::resource('/contact', ContactController::class)->only("index", "store");
Route::resource('/social-media', SocialMediaController::class)->only("index", "store");
Route::resource('/email', EmailController::class)->only("index", "store");
Route::resource('/link-list', LinkListController::class);
