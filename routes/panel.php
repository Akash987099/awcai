<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\panel\PanelController;

Route::controller(PanelController::class)->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('services', 'service')->name('service');
    Route::get('web/{name}', 'webname')->name('webname');
    Route::get('web/{name}/about', 'about')->name('about');
    Route::get('web/{name}/services', 'services')->name('services');
    Route::get('web/{name}/blogs', 'blogs')->name('blogs');
    Route::get('web/{name}/gallery', 'gallery')->name('gallery');
    Route::get('web/{name}/contact', 'contact')->name('contact');
});