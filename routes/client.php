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
use App\Http\Controllers\client\PncReviewController;
use App\Http\Controllers\client\PncVideoController;
Route::controller(LoginController::class)->group(function(){Route::get('login','loginClient')->name('login');Route::post('logins','loginsClient')->name('logins');});
Route::middleware(['auth:client'])->group(function(){
Route::get('',[ClientController::class,'index'])->name('index');Route::get('tokens',[ClientController::class,'tokens'])->name('tokens');
Route::get('videos',[PncVideoController::class,'index'])->name('pnc-videos.index');Route::post('videos',[PncVideoController::class,'store'])->name('pnc-videos.store');Route::delete('videos/{id}',[PncVideoController::class,'delete'])->name('pnc-videos.delete');Route::get('reviews',[PncReviewController::class,'index'])->name('pnc-reviews.index');Route::post('reviews',[PncReviewController::class,'store'])->name('pnc-reviews.store');Route::post('reviews/{id}',[PncReviewController::class,'update'])->name('pnc-reviews.update');Route::delete('reviews/{id}',[PncReviewController::class,'delete'])->name('pnc-reviews.delete');
Route::get('settings',[WebsiteSettingController::class,'show'])->name('settings.show');Route::post('settings',[WebsiteSettingController::class,'update'])->name('settings.update');
Route::get('sliders',[WebsiteSliderController::class,'index'])->name('slider.index');Route::post('sliders',[WebsiteSliderController::class,'store'])->name('slider.store');Route::delete('sliders/{id}',[WebsiteSliderController::class,'delete'])->name('slider.delete');
Route::get('services',[WebsiteServiceController::class,'index'])->name('client-services.index');Route::post('services',[WebsiteServiceController::class,'store'])->name('client-services.store');Route::post('services/{id}',[WebsiteServiceController::class,'update'])->name('client-services.update');Route::delete('services/{id}',[WebsiteServiceController::class,'delete'])->name('client-services.delete');
Route::get('blogs',[WebsiteBlogController::class,'index'])->name('client-blogs.index');Route::post('blogs',[WebsiteBlogController::class,'store'])->name('client-blogs.store');Route::post('blogs/{id}',[WebsiteBlogController::class,'update'])->name('client-blogs.update');Route::delete('blogs/{id}',[WebsiteBlogController::class,'delete'])->name('client-blogs.delete');
Route::get('articles',[WebsiteArticleController::class,'index'])->name('client-articles.index');Route::post('articles',[WebsiteArticleController::class,'store'])->name('client-articles.store');Route::delete('articles/{id}',[WebsiteArticleController::class,'delete'])->name('client-articles.delete');
Route::get('news',[WebsiteNewsController::class,'index'])->name('client-news.index');Route::post('news',[WebsiteNewsController::class,'store'])->name('client-news.store');Route::delete('news/{id}',[WebsiteNewsController::class,'delete'])->name('client-news.delete');
Route::get('faqs',[WebsiteFaqController::class,'index'])->name('client-faqs.index');Route::post('faqs',[WebsiteFaqController::class,'store'])->name('client-faqs.store');Route::post('faqs/{id}',[WebsiteFaqController::class,'update'])->name('client-faqs.update');Route::delete('faqs/{id}',[WebsiteFaqController::class,'delete'])->name('client-faqs.delete');
Route::prefix('customer')->controller(CustomerController::class)->name('customer.')->group(function(){Route::get('staff','index')->name('index');Route::get('add/{id}','add')->name('add');Route::post('store','store')->name('store');Route::get('pay/{id}','pay')->name('pay');Route::post('pay/amount','payAmount')->name('pay-amount');Route::get('fetchservice','fetchservice')->name('fetchservice');Route::get('add','addUser')->name('addUser');Route::get('add/form','addform')->name('add-from');Route::post('userStore','userStore')->name('userStore');});
Route::prefix('product')->controller(ProductController::class)->name('product.')->group(function(){Route::get('','index')->name('index');Route::get('add','add')->name('add');Route::post('store','store')->name('store');Route::get('edit/{id}','edit')->name('edit');Route::delete('delete/{id}','delete')->name('delete');Route::post('update','update')->name('update');});});
