<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\client\ProductController;
use App\Http\Controllers\api\CountryController;
use App\Http\Controllers\admin\StateController;
use App\Http\Controllers\admin\DistrictController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\api\WebsiteMasterController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('check.api')->group(function () {
    Route::get('products', [ProductController::class, 'products']);
    Route::get('website-settings', [WebsiteMasterController::class, 'settings']);
    Route::get('sliders', [WebsiteMasterController::class, 'sliders']);
    Route::get('services', [WebsiteMasterController::class, 'services']);
    Route::get('blogs', [WebsiteMasterController::class, 'blogs']);
    Route::get('articles', [WebsiteMasterController::class, 'articles']);
    Route::get('news', [WebsiteMasterController::class, 'news']);
    Route::get('faqs', [WebsiteMasterController::class, 'faqs']);
    Route::get('cms-pages', [WebsiteMasterController::class, 'cmsPages']);
    Route::get('reviews', [WebsiteMasterController::class, 'reviews']);
    Route::get('videos', [WebsiteMasterController::class, 'videos']);
});

Route::controller(CountryController::class)->group(function () {
    Route::get('country', 'country');
    Route::get('countrybyid/{id}', 'countrybyid');
});

Route::get('/category', [CategoryController::class, 'category']);
Route::get('/category-subcategory', [CategoryController::class, 'categorySubcategory']);
Route::get('/sub-category/{id?}', [CategoryController::class, 'subCategory']);
Route::get('/brands', [CategoryController::class, 'brands']);

Route::controller(StateController::class)->group(function () {
    Route::get('state', 'state');
    Route::get('statebyid/{id}', 'statebyid');
    Route::get('statebycountryid/{id}', 'statebycountryid');
});

Route::controller(DistrictController::class)->group(function () {
    Route::get('district', 'district');
    Route::get('districtbyid/{id}', 'districtbyid');
    Route::get('districtbystateid/{id}', 'districtbystateid');
});
