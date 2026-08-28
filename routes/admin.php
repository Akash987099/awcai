<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\ArticleController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\CustomerController;
use App\Http\Controllers\admin\ProjectController;
use App\Http\Controllers\admin\TokenController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\TxnController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\admin\ProjectCategroyController;
Use App\Http\Controllers\admin\TechnologyController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\TemplateController;
use App\Http\Controllers\admin\SalutationController;
use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\admin\StateController;
use App\Http\Controllers\admin\DistrictController;
use App\Http\Controllers\admin\TehsilController;
use App\Http\Controllers\api\CountryController;

// Route::controller(LoginController::class)->group(function(){
//     Route::get('login', 'login')->name('login');
// });

Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'login')->name('login');
    Route::post('logins', 'logins')->name('logins');
});

Route::middleware(['auth:admin'])->group(function () {

Route::controller(AdminController::class)->group(function(){
    Route::get('', 'index')->name('index');
    Route::get('project/sale', 'projectSale')->name('project-sale');
    Route::get('project/approve/{id}', 'downloadApprove')->name('download-approve');
    Route::get('visit', 'visit')->name('visit');
    Route::get('tracking', 'tracking')->name('tracking');
});

Route::prefix('category')->controller(CategoryController::class)->name('category.')->group(function(){
    Route::get('', 'index')->name('index');
    Route::get('add', 'add')->name('add');
    Route::post('store', 'store')->name('store');
    Route::get('edit/{id}', 'edit')->name('edit');
    Route::post('update', 'update')->name('update');
    Route::delete('delete/{id}', 'delete')->name('delete');
});

Route::prefix('service')->controller(ServiceController::class)->name('service.')->group(function(){
    Route::get('', 'index')->name('index');
    Route::get('add/{id}', 'add')->name('add');
    Route::post('store', 'store')->name('store');
    Route::get('edit/{id}', 'edit')->name('edit');
    Route::post('update', 'update')->name('update');
    Route::delete('delete/{id}', 'delete')->name('delete');
});

Route::prefix('role')->controller(RoleController::class)->name('role.')->group(function(){
    Route::get('', 'index')->name('index');
    Route::get('add', 'add')->name('add');
    Route::post('store', 'store')->name('store');
    Route::get('edit/{id}', 'edit')->name('edit');
    Route::post('update', 'update')->name('update');
    Route::delete('delete/{id}', 'delete')->name('delete');
});

Route::prefix('customer')->controller(CustomerController::class)->name('customer.')->group(function(){
    Route::get('', 'index')->name('index');
    Route::get('add', 'add')->name('add');
    Route::get('fetchservice', 'fetchservice')->name('fetchservice');
    Route::post('store', 'store')->name('store');
    Route::get('edit/{id}', 'edit')->name('edit');
    Route::post('update', 'update')->name('update');
    Route::delete('delete/{id}', 'delete')->name('delete');
    Route::get('charge', 'charge')->name('charge');
    Route::get('charge-add', 'chargeAdd')->name('charge-add');
    Route::post('charge-store', 'chargeStore')->name('charge-store');
});

Route::prefix('token')->controller(TokenController::class)->name('token.')->group(function(){
    Route::get('', 'index')->name('index');
    Route::get('add', 'add')->name('add');
    Route::get('fetchservice', 'fetchservice')->name('fetchservice');
    Route::post('store', 'store')->name('store');
    Route::get('edit/{id}', 'edit')->name('edit');
    Route::post('update', 'update')->name('update');
    Route::delete('delete/{id}', 'delete')->name('delete');
    Route::get('transfer', 'transfer')->name('transfer');
    Route::post('transfer/store', 'transferStore')->name('transfer-store');
    Route::get('transfer/details', 'transferDetails')->name('transfer-details');
});

Route::prefix('setting')->controller(SettingController::class)->name('setting.')->group(function(){
    Route::get('', 'index')->name('index');
    Route::get('account', 'account')->name('account');
    Route::post('account/store', 'accountStore')->name('account-store');
});

Route::prefix('txn')->controller(TxnController::class)->name('txn.')->group(function(){
    Route::get('', 'index')->name('index');
});

Route::prefix('project/category')->controller(ProjectCategroyController::class)->name('project_category.')->group(function(){
    Route::get('', 'index')->name('index');
    Route::get('add', 'add')->name('add');
    Route::post('store', 'store')->name('store');
    Route::get('edit/{id}', 'edit')->name('edit');
    Route::delete('delete/{id}', 'delete')->name('delete');
    Route::post('update', 'update')->name('update');
});

Route::prefix('technology')->controller(TechnologyController::class)->name('technology.')->group(function(){
    Route::get('', 'index')->name('index');
    Route::get('add', 'add')->name('add');
    Route::post('store', 'store')->name('store');
    Route::get('edit/{id}', 'edit')->name('edit');
    Route::post('update', 'update')->name('update');
    Route::delete('delete/{id}', 'delete')->name('delete');
});

Route::prefix('project')->controller(ProjectController::class)->name('project.')->group(function(){
    Route::get('', 'index')->name('index');
    Route::get('add', 'add')->name('add');
    Route::post('store', 'store')->name('store');
    Route::get('edit/{id}', 'edit')->name('edit');
    Route::post('update', 'update')->name('update');
    Route::delete('delete/{id}', 'delete')->name('delete');
});

Route::prefix('blog')->controller(BlogController::class)->name('blog.')->group(function(){
    Route::get('', 'index')->name('index');
    Route::get('add', 'add')->name('add');
    Route::post('store', 'store')->name('store');
    Route::get('edit/{id}', 'edit')->name('edit');
    Route::post('update', 'update')->name('update');
    Route::delete('delete/{id}', 'delete')->name('delete');
});

Route::prefix('article')->controller(ArticleController::class)->name('article.')->group(function(){
    Route::get('', 'index')->name('index');
    Route::get('add', 'add')->name('add');
    Route::post('store', 'store')->name('store');
    Route::get('edit/{id}', 'edit')->name('edit');
    Route::post('update', 'update')->name('update');
    Route::delete('delete/{id}', 'delete')->name('delete');
});

Route::prefix('template')->controller(TemplateController::class)->name('template.')->group(function(){
    Route::get('', 'index')->name('index');
    Route::get('add', 'add')->name('add');
    Route::post('store', 'store')->name('store');
    Route::get('edit/{id}', 'edit')->name('edit');
    Route::post('update', 'update')->name('update');
    Route::delete('delete/{id}', 'delete')->name('delete');
});

Route::prefix('salutation')->controller(SalutationController::class)->name('salutation.')->group(function(){
    Route::get('', 'index')->name('index');
    Route::get('add', 'add')->name('add');
    Route::post('store', 'store')->name('store');
    Route::get('edit/{id}', 'edit')->name('edit');
    Route::post('update', 'update')->name('update');
    Route::delete('delete/{id}', 'delete')->name('delete');
});

Route::prefix('contact')->controller(ContactController::class)->name('contact.')->group(function(){
    Route::get('', 'index')->name('index');
    Route::get('add', 'add')->name('add');
    Route::post('store', 'store')->name('store');
    Route::get('edit/{id}', 'edit')->name('edit');
    Route::post('update', 'update')->name('update');
    Route::delete('delete/{id}', 'delete')->name('delete');
});

// API

Route::prefix('country')->controller(CountryController::class)->name('country.')->group(function(){
    Route::get('', 'index')->name('index');
    Route::get('add', 'add')->name('add');
    Route::post('store', 'store')->name('store');
    Route::get('edit/{id}', 'edit')->name('edit');
    Route::post('update', 'update')->name('update');
    Route::delete('delete/{id}', 'delete')->name('delete');
});

Route::prefix('state')->controller(StateController::class)->name('state.')->group(function(){
    Route::get('', 'index')->name('index');
    Route::get('add', 'add')->name('add');
    Route::post('store', 'store')->name('store');
    Route::get('edit/{id}', 'edit')->name('edit');
    Route::post('update', 'update')->name('update');
    Route::delete('delete/{id}', 'delete')->name('delete');
});

Route::prefix('district')->controller(DistrictController::class)->name('district.')->group(function(){
    Route::get('', 'index')->name('index');
    Route::get('add', 'add')->name('add');
    Route::post('store', 'store')->name('store');
    Route::get('edit/{id}', 'edit')->name('edit');
    Route::post('update', 'update')->name('update');
    Route::delete('delete/{id}', 'delete')->name('delete');
});

Route::prefix('tehsil')->controller(TehsilController::class)->name('tehsil.')->group(function(){
    Route::get('', 'index')->name('index');
    Route::get('add', 'add')->name('add');
    Route::post('store', 'store')->name('store');
    Route::get('edit/{id}', 'edit')->name('edit');
    Route::post('update', 'update')->name('update');
    Route::delete('delete/{id}', 'delete')->name('delete');
});

});