<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class HomeController extends Controller
{
    public function show() {

        $books = Book::take(8)->get();

        return view('home', ['books' => $books]);
    }
}
