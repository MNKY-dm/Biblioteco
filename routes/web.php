<?php

use App\Http\Controllers\BookDetailController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix("/home")->name('home.')->group(function () {
    Route::get('/', [\App\Http\Controllers\HomeController::class, 'show'])->name('index');

    Route::get('/detail-{id}', [BookDetailController::class, 'show'])->name('detail');
});

Route::prefix("/videos")->name('videos.')->group(function () {
    Route::get('/', function () {
        return view('videos');
    })->name('index');

    Route::get('/detail', function () {
        return view('videos-detail');
    })->name('detail');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');
