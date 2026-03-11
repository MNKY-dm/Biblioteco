<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Random\RandomException;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     * @throws RandomException
     */
    public function run(): void
    {

        $this->call([
            CategorySeeder::class,
            TagSeeder::class,
        ],);
        // User::factory(10)->create();

        $books = Book::factory(60)->create();
        foreach ($books as $book) {
            $nbCategories = random_int(1, 3);
            $categoriesId = Category::all()->random($nbCategories)->pluck('id');
            $book->categories()->attach($categoriesId);

            $nbTags = random_int(1, 5);
            $tagsId = Tag::all()->random($nbTags)->pluck('id');
            $book->tags()->attach($tagsId);
        }
    }
}
