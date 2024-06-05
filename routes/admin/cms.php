<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Cms\PackageController;
use App\Http\Controllers\Admin\Cms\PagesController;
use App\Http\Controllers\Admin\Cms\ReferenceController;
use App\Http\Controllers\Admin\Cms\AddressController;
use App\Http\Controllers\Admin\Cms\BlogController;
use App\Http\Controllers\Admin\Cms\BranchController;
use App\Http\Controllers\Admin\Cms\BulletinController;
use App\Http\Controllers\Admin\Cms\SssController;
use App\Http\Controllers\Admin\Cms\DocumentController;
use App\Http\Controllers\Admin\Cms\ServiceController;
use App\Http\Controllers\Admin\Cms\SliderController;
use App\Http\Controllers\Admin\Cms\AccountController;
use App\Http\Controllers\Admin\Cms\CatalogController;


Route::resource('/bulletin', BulletinController::class);
Route::resource('/sss', SssController::class);
Route::resource('/address', AddressController::class);
Route::resource('/blog', BlogController::class);
Route::resource('/branch', BranchController::class);
Route::resource('/package', PackageController::class);
Route::resource('/reference', ReferenceController::class);
Route::resource('/pages', PagesController::class);
Route::resource('/account', AccountController::class);
Route::resource('/documents', DocumentController::class);
Route::resource('/service', ServiceController::class);
Route::resource('/slider', SliderController::class);
Route::resource('/catalog', CatalogController::class);


