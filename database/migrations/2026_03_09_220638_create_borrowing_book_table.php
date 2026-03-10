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
        Schema::create('borrowing_book', function (Blueprint $table) {
            $table->foreignId('id_book')->references('id')->on('books');
            $table->foreignId('borrowing_id')->references('id')->on('books');
            $table->primary(['id_book', 'borrowing_id']);
            // $table->string('status', 50); colonne ajoutée ensuite pour la V2, pour un rendu des livres au compte-goutte
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrowing_book');
    }
};
