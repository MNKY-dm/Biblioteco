<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function show(){
        $books = Book::paginate(16);
        return view('catalog', ['books' => $books]);
    }
}
