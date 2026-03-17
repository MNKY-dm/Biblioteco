<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function show() {
        $user = auth()->user();
        $carts = $user->carts();
        $cart = $carts->where('status', 'PENDING')->first();

        return view('my-cart', ['cart' => $cart]);
    }

    public function addBook(Book $book) {
        if ($book->status === 'AVAILABLE') {
            $user = auth()->user();

            if (!$user->borrowings()->whereIn('status', ['ACTIVE', 'LATE'])->exists()) {
                $cart = $user->carts()->where('status', 'PENDING')->first();
                if ($cart !== null) {
                    if ($cart->books()->count() < 6 ) {
//                        dd($cart->id, \DB::select('SELECT * FROM carts WHERE id = ?', [$cart->id]));
                        $cart->books()->attach($book);
                        return redirect()->route('book-detail', ['book' => $book])->with('success', 'Livre ajouté au panier avec succès !');
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

        // Récupérer le panier "EN ATTENTE", si l'user en a un
        $cart = $user->carts()->where('status', 'PENDING')->first();
        if ($cart !== null) {

            // Vérifier si le panier n'est pas plein
            if ($cart->books()->count() <= 6) {

                // Vérifier si le panier n'est pas vide
                if ($cart->books()->count() > 0 ) {

                    // Regarder l'état de chacun des livres
                    foreach ($cart->books as $book) {

                        // Si le livre n'est pas "DISPONIBLE"
                        if ($book->status !== 'AVAILABLE') {

                            // Retourne le message d'erreur précisant quel livre n'est plus disponible
                            return view('message.error', ['message' => "Un livre n'est plus disponible.", 'book' => $book]);
                        }
                    }

                    // Si tous les livres sont "DISPONIBLE" :
                    Borrowing::createFromCart($cart, $user->id);

                    // Passer le panier en "CONFIRME"
                    $cart->status = 'CONFIRMED';

                    $cart->save();

                    // Retourne le message de confirmation
                    return view('message.cart-confirmed', ['book' => $cart]);
                } else {

                    // Si le panier est vide
                    $message = "Votre panier est vide.";
                }
            } else {

                // Si le panier est plein
                $message = "Votre panier est plein.";
            }
        } else {

            // Si aucun panier n'est "EN ATTENTE"
            $message =  "Vous n'avez pas de panier en cours.";
        }

        // Retourne le message d'erreur en fonction de l'erreur
        return view('message.error', ['message' => $message]);
    }
}
