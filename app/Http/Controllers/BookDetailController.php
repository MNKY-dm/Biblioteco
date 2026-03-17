<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookDetailController extends Controller
{
    public function show($id) {
        $book = Book::findOrFail($id);
        $cart = auth()->user()->carts()->where('status', 'PENDING')->first();

        $tagIds = $book->tags->pluck("id"); // Récupérer les id des tags du livre actuel
        $booksWithSameTags = Book::with("tags")
            ->whereHas("tags", function ($query) use ($tagIds) {
                $query->whereIn("tags.id", $tagIds);
            }) // récupère tous les tags de la table book_tag qui sont égaux aux tags du livre actuel
            ->where("id", "!=", $book->id) // Exclure le livre actuel
            ->get();
        return view('book-detail', ['book' => $book, 'booksWithSameTags' => $booksWithSameTags, 'cart' => $cart]);
    }
}
