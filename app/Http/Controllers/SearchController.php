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
            $books = Book::whereFullText(['name', 'summary', 'author'], $q . '*', ['mode' => 'boolean'])->get();
        }

        if ($request->ajax()) {
            return view('search.search-partial', ['books' => $books, 'q' => $q]);
        }

        return view('search.search', ['books' => $books, 'q' => $q]);
    }
}
