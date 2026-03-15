<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $q = $request->input('q', '');

        $books = strlen($q) >= 3
            ? Book::whereFullText(['name', 'summary', 'author'], $q . '*', ['mode' => 'boolean'])
                ->orWhereHas('categories', fn($q2) => $q2->where('name', 'like', '%'.$q.'%'))
                ->orWhereHas('tags', fn($q2) => $q2->where('name', 'like', '%'.$q.'%'))
                ->get()
            : collect();

        return view('search.search-partial', compact('books', 'q'));
    }
}
