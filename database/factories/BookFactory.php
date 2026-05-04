<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory;

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
        $faker = FakerFactory::create('fr_FR');

        $dir = "/var/www/Biblioteco/storage/app/public/books";
        $extensionsAutorisees = ['jpg', 'jpeg', 'png', 'webp'];

        $files = scandir($dir);
        $validFiles = [];

        foreach ($files as $file) {
            if ($file === "." || $file === "..") {
                continue;
            } elseif (str_starts_with(".", $file)) {
                continue;
            }
            else {
                foreach ($extensionsAutorisees as $extension) {
                    if (str_ends_with($file, $extension)) {
                        $validFiles[] = $file;
                    }
                }
            }
        }


        return [
            'code' => 'BOOK' . str_pad($faker->unique()->randomNumber(5), 6, "0", STR_PAD_LEFT),
            'name' => trim($this->faker->sentence(rand(1, 3)), "."),
            'summary' => $this->faker->text(500),
            'author' => $this->faker->name(),
            'image_path' => 'books/' . $validFiles[rand(0, count($validFiles) - 1)],
            'language' => 'FR',
            'status' => "AVAILABLE",
            'published_at' => now(),
        ];
    }
}
