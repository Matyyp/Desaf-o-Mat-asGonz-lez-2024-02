<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Artista;

class ArtistaSeeder extends Seeder
{
    public function run()
    {
        Artista::factory()->count(10)->create();
    }
}
