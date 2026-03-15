<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function show() {
        return view('my-cart');
    }

    public function addBook(Book $book) {
        if ($book->status === 'AVAILABLE') {
            $user = auth()->user();

            if (!$user->borrowings()->whereIn('status', ['ACTIVE', 'LATE'])->exists()) {
                $cart = $user->carts()->where('status', 'PENDING')->first();
                if ($cart !== null) {
                    if ($cart->books()->count() < 6 ) {
                        $cart->books()->attach($book->id);
                        return view('message.book-added', ['book' => $book]);
                    }
                    $message = "Vous avez déjà atteint le nombre de livres maximum autorisé.";
                } else {
                    $cart = Cart::create([
                        'client_id' => $user->id,
                        'status' => 'PENDING',
                        'expires_at' => now()->addHours(2)
                    ]);
                    $cart->books()->attach($book->id);
                    return view('message.book-added', ['book' => $book]);
                }
            } else {
                $message = "Impossible d'ajouter un livre au panier : vous avez déjà un emprunt en cours.";
            }
            return view('message.error', ['message' => $message]);
        } else {
            return view("message.error",  ['message' =>"Le livre est indisponible."]);
        }
    }
}
