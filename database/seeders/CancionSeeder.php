<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cancion;

class CancionSeeder extends Seeder
{
    public function run()
    {
        Cancion::factory()->count(10)->create();
    }
}
