<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Cart extends Model {

    // Status : PENDING, CONFIRMED, EXPIRED
    protected $fillable = [
        'client_id',
        'book_id',
        'status',
        'expires_at',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, "client_id");
    }

    public function books(): BelongsToMany {
        return $this->belongsToMany(Book::class, 'cart_book', 'cart_id', 'book_id');
    }
}
