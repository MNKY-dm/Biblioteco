<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cart_book', function (Blueprint $table) {
            $table->foreignId('cart_id')->references('id')->on('carts');
            $table->foreignId('book_id')->references('id')->on('books');
            $table->primary(['cart_id', 'book_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_book');
    }
};
