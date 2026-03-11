<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $dir = storage_path("app/public/books");
        $files = scandir($dir);

        return [
            'code' => 'BOOK' .  str_pad(fake()->unique()->randomNumber(5),  6, "0", STR_PAD_LEFT),
            'name' => fake()->words(rand(1, 3), true),
            'summary' => fake('fr_FR')->text(500),
            'author' => fake('fr_FR')->name(),
            'image_path' => 'books/' . $files[rand(0, count($files) - 1)],
            'language' => 'FR',
            'status' => "DISPONIBLE",
            'published_at' => now(),
        ];
    }
}
