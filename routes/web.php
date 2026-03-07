<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/home/detail', function () {
    return view('photo-detail');
});

Route::get('/book-{id}', function (string $id) {
    return view('book', ['book' => $id]);
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
});

Route::get('/contact', function () {
    return view('contact');
});
