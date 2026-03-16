<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Borrowing extends Model
{
    // Status : ACTIVE, RETURNED, LATE
    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class, 'borrowing_book', 'id_book', 'borrowing_id');
    }

    public static function createFromCart(Cart $cart, $userId): Borrowing {

        // Créer un emprunt
        $borrowing =  Borrowing::create([
            'client_id' => $userId,
            'start_date' => now(),
            'deadline' => now()->addDays(14),
            'status' => "ACTIVE",
        ]);

        // Pour chaque livre dans le panier
        foreach ($cart->books as $book) {

            // Passer le livre en "EMPRUNTE"
            $book->status = "BORROWED";

            $book->save();

            // L'attacher à l'emprunt (relation n:m)
            $borrowing->books()->attach($book);

        }

        // Renvoyer l'emprunt
        return $borrowing;
    }

    protected $fillable = [
        'client_id',
        'start_date',
        'deadline',
        'status',
        'returned_at',
    ];

    protected function casts(): array
    {
        return [
            'deadline' => 'datetime',
        ];
    }
}
