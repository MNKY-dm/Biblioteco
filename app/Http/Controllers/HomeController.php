<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class HomeController extends Controller
{
    public function showBook() {

        $books = Book::all();
//        dd($books->get(1)['name']);

        return view('home', ['books' => $books]);
    }
}
