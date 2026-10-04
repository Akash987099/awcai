<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\ProjectController;
use App\Models\admin\Role;
 use App\Http\Controllers\BlogController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DigitalMarketingController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\QuizController;
use PHPUnit\Metadata\Group;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\CmsController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Response;

Route::get('/robots.txt', function () {
    $content = implode("\n", [
        'User-agent: *',
        'Allow: /',
        'Sitemap: ' . url('/sitemap.xml'),
    ]);

    return Response::make($content, 200, ['Content-Type' => 'text/plain']);
});

Route::get('/sitemap.xml', function () {
    $urls = [
        ['loc' => route('index'), 'changefreq' => 'weekly', 'priority' => '1.0'],
        ['loc' => route('about-us'), 'changefreq' => 'monthly', 'priority' => '0.8'],
        ['loc' => route('team'), 'changefreq' => 'monthly', 'priority' => '0.7'],
        ['loc' => route('technologies'), 'changefreq' => 'monthly', 'priority' => '0.7'],
        ['loc' => route('service.web-development'), 'changefreq' => 'monthly', 'priority' => '0.8'],
        ['loc' => route('service.app-development'), 'changefreq' => 'monthly', 'priority' => '0.8'],
        ['loc' => route('service.ui-development'), 'changefreq' => 'monthly', 'priority' => '0.8'],
        ['loc' => route('digital-marketing.overview'), 'changefreq' => 'monthly', 'priority' => '0.8'],
        ['loc' => route('contact.index'), 'changefreq' => 'monthly', 'priority' => '0.7'],
        ['loc' => route('career.index'), 'changefreq' => 'monthly', 'priority' => '0.7'],
        ['loc' => route('quiz.index'), 'changefreq' => 'weekly', 'priority' => '0.7'],
    ];

    $xml = view('seo.sitemap', compact('urls'))->render();

    return Response::make($xml, 200, ['Content-Type' => 'application/xml']);
});

Route::get('/fetch-news', function (Request $request) {
    $apiKey = "43e3ba231d775023e458e5719a48c411";
    $search = $request->query('q', 'India');
    $category = $request->query('topic', 'general');

    $url = "https://gnews.io/api/v4/top-headlines?token={$apiKey}&lang=en&q={$search}&topic={$category}";

    try {
        $response = Http::get($url);
        return response($response->body(), 200)
            ->header('Content-Type', 'application/json');
    } catch (\Exception $e) {
        return response()->json(['error' => 'Failed to fetch news.'], 500);
    }
});

Route::controller(WebController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('technologies', 'technologies')->name('technologies');
    Route::get('about-us', 'aboutUs')->name('about-us');
    Route::post('subsribe', 'subsribe')->name('subsribe');
    Route::post('quick/enquery/save', 'quickEnquery')->name('quick.enquiry.submit');
});

Route::controller(TeamController::class)->group(function () {
    Route::get('team', 'index')->name('team');
});

Route::controller(ContactUsController::class)->group(function () {
    Route::get('contact-us', 'index')->name('contact.index');
});

Route::controller(CareerController::class)->group(function () {
    Route::get('career', 'index')->name('career.index');
});

Route::controller(QuizController::class)->group(function () {
    Route::get('quiz', 'index')->name('quiz.index');
});

Route::prefix('projects')->controller(ProjectController::class)->name('projects.')->group(function(){
    Route::get('', 'index')->name('index');
});

Route::prefix('project')->controller(ProjectController::class)->name('project.')->group(function () {
    Route::get('/{name}', 'project')->name('index');
});

Route::controller(ProjectController::class)->group(function () {
    Route::get('complete/projects', 'complateProject')->name('complate_project');
});

Route::prefix('service')->controller(ServiceController::class)->name('service.')->group(function () {
    Route::get('web/development', 'webDevelopment')->name('web-development');
    Route::get('app/development', 'appDevelopment')->name('app-development');
    Route::get('ui/ux/development', 'uiDevelopment')->name('ui-development');
});

Route::prefix('digital-marketing')->controller(DigitalMarketingController::class)->name('digital-marketing.')->group(function () {
    Route::get('/', 'overview')->name('overview');
    Route::get('{section}', 'section')->name('section');
    Route::get('{section}/{page}', 'item')->name('item');
});

Route::prefix('chat')->controller(ChatbotController::class)->name('chat')->group(function () {
    Route::get('', 'index')->name('index');
    Route::post('send', 'send')->name('send');
});

Route::controller(CmsController::class)->group(function () {
    Route::get('cms/{id}', 'cms')->name('cms');
});
