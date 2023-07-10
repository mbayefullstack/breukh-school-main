<?php

namespace Database\Seeders;

use App\Models\Niveaux;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NiveauxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=1; $i < 6; $i++) { 
            Niveaux::factory()->create([
                'libelle'   => "Niveau $i"
            ]);
        }
    }
}
