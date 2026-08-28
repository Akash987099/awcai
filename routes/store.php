<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\store\StoreController;

Route::controller(StoreController::class)->group(function(){
    Route::get('', 'index')->name('index');
});
