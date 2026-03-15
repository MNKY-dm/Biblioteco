<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $q = $request->input('q', '');
        $books = collect(); // collection vide par défaut

        if (strlen($q) >= 3) {
            $books = Book::whereFullText(['name', 'summary', 'author'], $q)->get();
        }

        if ($request->ajax()) {
            return view('catalog.search-partial', ['books' => $books, 'q' => $q]);
        }

        return view('catalog.search', ['books' => $books, 'q' => $q]);
    }
}
