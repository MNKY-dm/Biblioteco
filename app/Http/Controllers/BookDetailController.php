<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookDetailController extends Controller
{
    public function show($id) {

        $book = Book::findOrFail($id);
        return view('book-detail', ['book' => $book]);
    }
}
