<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Shop\CategoryController;
use App\Http\Controllers\Admin\Shop\ProductController;
use App\Http\Controllers\Admin\Shop\ProductImageController;
use App\Http\Controllers\Admin\Shop\SubCategoryController;
use App\Http\Controllers\Admin\Shop\SubProductController;
use App\Http\Controllers\Admin\Shop\SubSubCategoryController;
use App\Http\Controllers\Admin\Shop\VariantCategoryController;
use App\Http\Controllers\Admin\Shop\VariantController;
use App\Http\Controllers\Admin\Shop\BrandController;


Route::resource('/category', CategoryController::class);
Route::resource('/sub-category', SubCategoryController::class);
Route::resource('/sub-subcategory', SubSubCategoryController::class);
Route::resource('/variant', VariantController::class);
Route::resource('/variant-category', VariantCategoryController::class);
Route::resource('/product', ProductController::class);
Route::resource('/sub-product', SubProductController::class);
Route::resource('/product-image', ProductImageController::class);
Route::resource('/brand', BrandController::class);
