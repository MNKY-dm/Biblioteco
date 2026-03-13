<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Borrowing extends Model
{
    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class, 'borrowing_book', 'borrowing_id', 'book_id');
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
