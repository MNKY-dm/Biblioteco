<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function show(Request $request){
        $q = $request->input('q', '');

        if (strlen($q) >= 3) {
            $books = Book::whereFullText(['name', 'summary', 'author'], $q . '*', ['mode' => 'boolean'])->paginate(16);
            return view('catalog', ['books' => $books, 'q' => $q]);
        }

        $books = Book::paginate(16);
        return view('catalog', ['books' => $books, 'q' => $q]);

    }
}
