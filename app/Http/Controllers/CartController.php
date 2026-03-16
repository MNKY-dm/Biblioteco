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

    public function deleteBook(Book $book) {
        $user = auth()->user();
        $cart = $user->carts()->where('status', 'PENDING')->first();
        if ($cart !== null) {
            if ($cart->books()->where('book_id', $book->id)->exists()) {
                $cart->books()->detach($book->id);
                return view('message.book-deleted', ['book' => $book]);
            } else {
                return view('message.error', ['message' => "Le livre n'est pas dans votre panier."]);
            }
        } else {
            return view('message.error', ['message' => "Vous n'avez pas de panier en attente."]);
        }
    }

    public function confirm() {
        $user = auth()->user();
        $cart = $user->carts()->where('status', 'PENDING')->first();
        if ($cart !== null) {
            if ($cart->books()->count() < 6) {
                if ($cart->books()->count() > 0 ) {
                    if ($cart->books()->where('status', !"AVAILABLE")->exists()) {

                    }
                } else {
                    $message = "Votre panier est vide.";
                }
            } else {
                $message = "Votre panier est plein.";
            }
        } else {
            return view('message.error', ['message' => "Vous n'avez pas de panier en cours."]);
        }
    }
}
