<?php

namespace Database\Seeders;

use App\Models\classe;
use App\Models\Niveaux;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClasseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $niveaux = Niveaux::all();
        foreach ($niveaux as $niveau) {
            classe::factory(3)->create([
                'niveaux_id'   => $niveau->id
            ]);
        }
    }
}
