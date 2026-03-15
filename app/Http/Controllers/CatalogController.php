<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function show(Request $request){

        $q = $request->input('q', '');

        // pense-bête pour la syntaxe : $variable = condition ? valeur_si_vrai : valeur_si_faux ;

        $books = strlen($q) >= 2
            ? Book::whereFullText(['name', 'summary', 'author'], $q . '*', ['mode' => 'boolean'])
                ->orWhereHas('categories', fn($query) => $query->where('name', 'like', '%'.$q.'%'))
                ->orWhereHas('tags', fn($query) => $query->where('name', 'like', '%'.$q.'%'))
                ->paginate(16)
            : Book::paginate(16);


        return view('catalog', compact('books', 'q'));

    }
}
