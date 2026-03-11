<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            "AVENTURE",
            "HUMOUR",
            "TRAGEDIE",
            "CYBERPUNK",
            "STEAMPUNK",
            "MAGIE",
            "SORCELLERIE",
            "DYSTOPIE",
            "HEROIC FANTASY",
            "MYTHOLOGIE",
            "POST-APOCALYPTIQUE",
            "DRAME",
            "SAGA",
            "NOUVELLE",
            "ONE-SHOT",
            "ENQUETE",
            "GUERRE",
            "SPACE OPERA",
            "SUPER-HEROS",
            "FOLKLORE",
            "ANALYSE",
            "THESE",
            "BAGUETTE MAGIQUE",
            "ARME",
            "COMBAT",
            "ARTS MARTIAUX",
            "DECOUVERTE",
            "INVENTION",
            "PLANETE",
            "MONSTRE",
            "SURNATUREL",
            "EXTRATERRESTRE",
            "ANIMAL",
            "HUMAIN",
            "CERVEAU",
            "OCEAN",
            "BATEAU",
            "AUTOMOBILE",
            "MECANIQUE",
            "POLITIQUE",
            "TELEVISION",
            "RECORD",
            "ANIMATION",
            "ACTIVITE",
            "EXPERIENCE",
            "TEMOIGNAGE",
            "AUTOBIOGRAPHIE",
            "FICTION",
            "MUSIQUE",
            "ARTISTE"
        ];

        foreach ($tags as $tag) {
            Tag::create([
                'name' => $tag,
            ]);
        }
    }
}
