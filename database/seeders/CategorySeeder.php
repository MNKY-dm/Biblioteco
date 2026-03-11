<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'SCIENCE FICTION',
            "FANTAISIE",
            "FANTASTIQUE",
            "ROMANCE",
            "LITTERATURE GENERALE",
            "BIOGRAPHIE",
            "ESSAI",
            "SCIENCE",
            "TECHNOLOGIE",
            "BIOLOGIE",
            "MEDECINE",
            "GEOSCIENCE",
            "ECONOMIE",
            "PSYCHOLOGIE",
            "PHILOSOPHIE",
            "MATHEMATIQUE",
            "INFORMATIQUE",
            "CHIMIE",
            "PHYSIQUE",
            "ASTRONOMIE",
            "BANDE DESSINEE",
            "JEUNESSE",
            "PREMIERE LECTURE",
            "EVEIL",
            "BEAUX LIVRES",
            "ART",
            "GUIDE DE VOYAGE",
            "GUIDE PRATIQUE",
            "HORREUR",
            "POLICIER",
            "POLAR",
            "THRILLER",
            "DOCUMENTAIRE",
            "SPORT",
            "SOCIETE",
            "HISTOIRE",
            "GEOGRAPHIE",
            "MANGA",
            "SCOLAIRE",
            "LANGUE",
            ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
            ]);
        }
    }
}
