<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Cart extends Model {
    protected function user(): BelongsTo {
        return $this->belongsTo(User::class, "client_id");
    }

    protected function books(): BelongsToMany {
        return $this->belongsToMany(Book::class);
    }
}
