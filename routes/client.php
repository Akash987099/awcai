<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\panel\ClientController;
use App\Http\Controllers\client\CustomerController;
use App\Http\Controllers\client\ProductController;

Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'loginClient')->name('login');
    Route::post('logins', 'loginsClient')->name('logins');
});

Route::middleware(['auth:client'])->group(function(){

    Route::controller(ClientController::class)->group(function(){
        Route::get('', 'index')->name('index');
        Route::get('tokens', 'tokens')->name('tokens');
    });

    Route::prefix('customer')->controller(CustomerController::class)->name('customer.')->group(function(){
        Route::get('staff', 'index')->name('index');
        Route::get('add/{id}', 'add')->name('add');
        Route::post('store', 'store')->name('store');
        Route::get('pay/{id}', 'pay')->name('pay');
        Route::post('pay/amount', 'payAmount')->name('pay-amount');

        Route::get('fetchservice', 'fetchservice')->name('fetchservice');
        Route::get('add', 'addUser')->name('addUser');
        Route::get('add/form', 'addform')->name('add-from');
        Route::post('userStore', 'userStore')->name('userStore');
    });

    Route::prefix('product')->controller(ProductController::class)->name('product.')->group(function(){
        Route::get('', 'index')->name('index');
        Route::get('add', 'add')->name('add');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::delete('delete/{id}', 'delete')->name('delete');
        Route::post('update', 'update')->name('update');
    });

});