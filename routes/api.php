<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\client\ProductController;
use App\Http\Controllers\api\CountryController;
use App\Http\Controllers\admin\StateController;
use App\Http\Controllers\admin\DistrictController;
use App\Http\Controllers\Api\CategoryController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('check.api')->group(function () {
    Route::get('products', [ProductController::class, 'products']);
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
