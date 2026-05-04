<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BookDetailController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MyProfileController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;


Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);


Route::get('/home', [HomeController::class, 'show'])->name('home');
Route::get('/', [HomeController::class, 'show'])->name('home');

Route::get('/catalog', [CatalogController::class, "show"])->name('catalog');

Route::get("/search", [SearchController::class, 'search'])->name("search");

Route::get('/detail-{id}', [BookDetailController::class, 'show'])->name('book-detail');


Route::get('/borrow-{id}', [BorrowController::class, 'borrow'])->name('borrow')->middleware('auth');

Route::get('/my-profile', [MyProfileController::class, 'show'])->name('my-profile')->middleware('auth');
Route::post('/my-profile', [MyProfileController::class, 'store'])->name('update-profile')->middleware('auth');

Route::get('/my-borrowings', [BorrowController::class, 'showMyBorrowings'])->name('my-borrowings')->middleware('auth');

Route::prefix('/cart')->name('cart.')->middleware('auth')->group(function () {
    Route::get('/', [CartController::class, 'show'])->name('index');
    Route::post('/add/{book}', [CartController::class, 'addBook'])->name('add-book');
    Route::delete('/delete/{book}', [CartController::class, 'deleteBook'])->name('delete-book');
    Route::post('/confirm', [CartController::class, 'confirm'])->name('confirm');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');
