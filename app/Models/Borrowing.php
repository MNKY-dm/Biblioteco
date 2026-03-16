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

    public static function createFromCart(Cart $cart): Borrowing {

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
