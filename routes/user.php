<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\user\ReviewController;

Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'userlogin')->name('login');
    Route::post('logins', 'userlogins')->name('userlogins');
});

Route::get('register', [UserController::class, 'register'])->name('register');
Route::post('register/save', [UserController::class, 'registerSave'])->name('register-save');

Route::middleware(['auth:user'])->group(function () {

    Route::controller(UserController::class)->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('invoices', 'invoices')->name('invoices');
        Route::get('invoice/download/{id}', 'invoiceDownload')->name('invoice-download');
    });

    Route::prefix('project')->controller(ProjectController::class)->name('project.')->group(function () {
        Route::get('lists', 'Projectlist')->name('project');
        Route::get('purchase/{id}', 'purchase')->name('purchase');
        Route::post('purchase/payment', 'purchasePayment')->name('purchase-payment');
    });
    
    Route::prefix('review')->controller(ReviewController::class)->name('review.')->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('project/{id}', 'project')->name('project');
        Route::post('store', 'store')->name('store');
    });

});
