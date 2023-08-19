<?php

use App\Http\Controllers\Admin\Authentication\AdminController;
use App\Http\Controllers\Admin\Authentication\AuthController;
use App\Http\Controllers\Admin\Cms\AccountController;
use App\Http\Controllers\Admin\Cms\AddressController;
use App\Http\Controllers\Admin\Cms\BlogController;
use App\Http\Controllers\Admin\Cms\BranchController;
use App\Http\Controllers\Admin\Cms\BulletinController;
use App\Http\Controllers\Admin\Cms\CatalogController;
use App\Http\Controllers\Admin\Cms\DocumentController;
use App\Http\Controllers\Admin\Cms\PackageController;
use App\Http\Controllers\Admin\Cms\PagesController;
use App\Http\Controllers\Admin\Cms\ReferenceController;
use App\Http\Controllers\Admin\Cms\ServiceController;
use App\Http\Controllers\Admin\Cms\SliderController;
use App\Http\Controllers\Admin\Cms\SssController;
use App\Http\Controllers\Admin\Customer\CommentController;
use App\Http\Controllers\Admin\Customer\CustomerController;
use App\Http\Controllers\Admin\Customer\MessageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\Setting\ApiController;
use App\Http\Controllers\Admin\Setting\ContactController;
use App\Http\Controllers\Admin\Setting\EmailController;
use App\Http\Controllers\Admin\Setting\LinkListController;
use App\Http\Controllers\Admin\Setting\SettingController;
use App\Http\Controllers\Admin\Setting\SocialMediaController;
use App\Http\Controllers\Admin\Shop\BrandController;
use App\Http\Controllers\Admin\Shop\CategoryController;
use App\Http\Controllers\Admin\Shop\SubCategoryController;
use App\Http\Controllers\Admin\Shop\SubSubCategoryController;
use App\Http\Controllers\Admin\Shop\VariantCategoryController;
use App\Http\Controllers\Admin\Shop\VariantController;
use App\Http\Controllers\Front\AuthController as FrontAuth;
use App\Http\Controllers\Front\BasketController;
use App\Http\Controllers\Front\CategoryController as FrontCategory;
use App\Http\Controllers\Front\PagesController as FrontPages;
use App\Http\Controllers\Front\ProductController as FrontProduct;
use App\Http\Controllers\Front\SssController as FrontSss;
use App\Http\Controllers\Front\UserController;
use Illuminate\Support\Facades\Route;


//ADMIN API KODLARI
Route::prefix('admin')->middleware("admin-api")->group(function () {
    Route::post('/login', [AuthController::class, "login"]);
    Route::post('/register', [AuthController::class, "register"]);
    Route::post('/logout', [AuthController::class, "logout"]);
    Route::resource('/pages', PagesController::class);
    Route::resource('/account', AccountController::class);
    Route::resource('/address', AddressController::class);
    Route::resource('/blog', BlogController::class);
    Route::resource('/branch', BranchController::class);
    Route::resource('/brand', BrandController::class);
    Route::resource('/slider', SliderController::class);
    Route::resource('/catalog', CatalogController::class);
    Route::resource('/comment', CommentController::class);
    Route::resource('/customer', CustomerController::class);
    Route::resource('/package', PackageController::class);
    Route::resource('/link-list', LinkListController::class);
    Route::resource('/message', MessageController::class);
    Route::resource('/reference', ReferenceController::class);
    Route::resource('/service', ServiceController::class);
    Route::resource('/documents', DocumentController::class);
    Route::resource('/bulletin', BulletinController::class);
    Route::resource('/sss', SssController::class);
    Route::resource('/category', CategoryController::class);
    Route::resource('/sub-category', SubCategoryController::class);
    Route::resource('/sub-subcategory', SubSubCategoryController::class);
    Route::resource('/variant', VariantController::class);
    Route::resource('/variant-category', VariantCategoryController::class);
    Route::resource('/products', ProductController::class);
    Route::post('/image-remove', [ProductImageController::class, "removeImage"]);
    Route::post('/image-remove-cover', [ProductImageController::class, "removeCoverImage"]);
    Route::prefix("setting")->group(function () {
        Route::resource('/', SettingController::class)->only("index", "store");
        Route::resource('/api', ApiController::class)->only("index", "store");
        Route::resource('/contact', ContactController::class)->only("index", "store");
        Route::resource('/social-media', SocialMediaController::class)->only("index", "store");
        Route::resource('/email', EmailController::class)->only("index", "store");
    });
});

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
Route::post("/admin/forgot-password", [AdminController::class, "forgotPassword"]);
Route::post("/admin/reset-password", [AdminController::class, "resetPassword"]);

//MIDDLEWARE OLMAYAN API KODLARI FRONT
Route::post('/forgot-password', [UserController::class, 'forgotPassword']);
Route::post('/reset-password', [UserController::class, 'resetPassword']);
