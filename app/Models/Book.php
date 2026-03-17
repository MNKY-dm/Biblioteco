<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    use HasFactory;
    public function categories() : BelongsToMany {
        return $this->belongsToMany(Category::class);
    }

    public function tags() : BelongsToMany {
        return $this->belongsToMany(Tag::class);
    }

    public function borrowings() : BelongsToMany {
        return $this->belongsToMany(Borrowing::class, 'borrowing_book', 'borrowing_id', 'id_book');
    }

    public function carts(): BelongsToMany {
        return $this->belongsToMany(Cart::class, 'cart_book', 'book_id', 'cart_id');
    }

    protected $fillable = [
        'status',
        'image_path',
    ];

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
        ];
    }
}
