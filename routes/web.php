<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BookDetailController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::prefix("/home")->name('home.')->group(function () {
    Route::get('/', [HomeController::class, 'show'])->name('index');

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
