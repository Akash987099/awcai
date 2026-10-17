
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\panel\ClientController;
use App\Http\Controllers\client\CustomerController;
use App\Http\Controllers\client\ProductController;
use App\Http\Controllers\client\WebsiteSettingController;
use App\Http\Controllers\client\WebsiteSliderController;
use App\Http\Controllers\client\WebsiteServiceController;
use App\Http\Controllers\client\WebsiteBlogController;
use App\Http\Controllers\client\WebsiteArticleController;
use App\Http\Controllers\client\WebsiteNewsController;
use App\Http\Controllers\client\WebsiteFaqController;
use App\Http\Controllers\client\WebsiteCmsPageController;
use App\Http\Controllers\client\PncReviewController;
use App\Http\Controllers\client\PncVideoController;
use App\Http\Controllers\client\WebsiteAboutController;

/*
|--------------------------------------------------------------------------
| Client Authentication Routes
|--------------------------------------------------------------------------
*/

Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'loginClient')->name('login');
    Route::post('logins', 'loginsClient')->name('logins');
});

/*
|--------------------------------------------------------------------------
| Authenticated Client Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth:client'])->group(function () {

    // Authentication
    Route::post('logout', [LoginController::class, 'logoutClient'])
        ->name('logout');

    // Dashboard
    Route::get('', [ClientController::class, 'index'])
        ->name('index');

    Route::get('tokens', [ClientController::class, 'tokens'])
        ->name('tokens');

    // Videos
    Route::controller(PncVideoController::class)
        ->prefix('videos')
        ->name('pnc-videos.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::post('', 'store')->name('store');
            Route::delete('{id}', 'delete')->name('delete');
        });

    // Reviews
    Route::controller(PncReviewController::class)
        ->prefix('reviews')
        ->name('pnc-reviews.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::post('', 'store')->name('store');
            Route::post('{id}', 'update')->name('update');
            Route::delete('{id}', 'delete')->name('delete');
        });

    // Website Settings
    Route::controller(WebsiteSettingController::class)
        ->prefix('settings')
        ->name('settings.')
        ->group(function () {
            Route::get('', 'show')->name('show');
            Route::post('', 'update')->name('update');
        });

    // About Us
    Route::controller(WebsiteAboutController::class)
        ->prefix('about')
        ->name('about.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::post('', 'update')->name('update');
        });

    // Website Sliders
    Route::controller(WebsiteSliderController::class)
        ->prefix('sliders')
        ->name('slider.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::post('', 'store')->name('store');
            Route::delete('{id}', 'delete')->name('delete');
        });

    // Website Services
    Route::controller(WebsiteServiceController::class)
        ->prefix('services')
        ->name('client-services.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::post('', 'store')->name('store');
            Route::post('{id}', 'update')->name('update');
            Route::delete('{id}', 'delete')->name('delete');
        });

    // Website Blogs
    Route::controller(WebsiteBlogController::class)
        ->prefix('blogs')
        ->name('client-blogs.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::post('', 'store')->name('store');
            Route::post('{id}', 'update')->name('update');
            Route::delete('{id}', 'delete')->name('delete');
        });

    // Website Articles
    Route::controller(WebsiteArticleController::class)
        ->prefix('articles')
        ->name('client-articles.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::post('', 'store')->name('store');
            Route::delete('{id}', 'delete')->name('delete');
        });

    // Website News
    Route::controller(WebsiteNewsController::class)
        ->prefix('news')
        ->name('client-news.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::post('', 'store')->name('store');
            Route::delete('{id}', 'delete')->name('delete');
        });

    // Website FAQs
    Route::controller(WebsiteFaqController::class)
        ->prefix('faqs')
        ->name('client-faqs.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::post('', 'store')->name('store');
            Route::post('{id}', 'update')->name('update');
            Route::delete('{id}', 'delete')->name('delete');
        });

    // CMS Pages
    Route::controller(WebsiteCmsPageController::class)
        ->prefix('cms-pages')
        ->name('client-cms.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::post('', 'store')->name('store');
            Route::post('{id}', 'update')->name('update');
            Route::delete('{id}', 'delete')->name('delete');
        });

    /*
    |--------------------------------------------------------------------------
    | Customer Routes
    |--------------------------------------------------------------------------
    */

    Route::prefix('customer')
        ->controller(CustomerController::class)
        ->name('customer.')
        ->group(function () {
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

    /*
    |--------------------------------------------------------------------------
    | Product Routes
    |--------------------------------------------------------------------------
    */

    Route::prefix('product')
        ->controller(ProductController::class)
        ->name('product.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::get('add', 'add')->name('add');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::delete('delete/{id}', 'delete')->name('delete');
            Route::post('update', 'update')->name('update');
        });

});