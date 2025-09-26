<?php

use App\Models\Technology;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\BlogController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\AbotUsController;
use App\Http\Controllers\Site\ContactController;
use App\Http\Controllers\Site\ProjectController;
use App\Http\Controllers\Site\ServiceController;
use App\Http\Controllers\Site\TechnologyController;

Route::get('/privacy', function () {

    session()->put('lang', 'en');

    return view('site.privacy');
});

Route::get('/privacy/ar', function () {

    session()->put('lang', 'ar');

    return view('site.privacy');
});
Route::get('/privacy/en', function () {

    session()->put('lang', 'en');

    return view('site.privacy');
});

Route::namespace('Site')->name('site.')->middleware('lang')->group(function () {
    Route::get('lang/{lang}', [HomeController::class, 'lang'])->name('lang');
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('about-us', [AbotUsController::class, 'index'])->name('about');
    Route::get('contact', [ContactController::class, 'index'])->name('contact.index');
    Route::post('contact', [ContactController::class, 'store'])->name('contact.store');
    Route::get('blogs', [BlogController::class, 'index'])->name('blogs.index');
    Route::get('blogs/show/{blog:slug}', [BlogController::class, 'show'])->name('blog.show');
    Route::get('services', [ServiceController::class, 'index'])->name('services.index');
    Route::get('services/show/{service:slug}', [ServiceController::class, 'show'])->name('service.show');
    Route::post('services/store', [ServiceController::class, 'store'])->name('service.store');
    Route::get('projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('projects/show/{project:slug}', [ProjectController::class, 'show'])->name('project.show');
    Route::get('technologys', [TechnologyController::class, 'index'])->name('technologys.index');
    Route::post('subscribe', [HomeController::class, 'subscribe'])->name('subscribe');
    Route::post('join', [HomeController::class, 'join'])->name('join.store');
});
