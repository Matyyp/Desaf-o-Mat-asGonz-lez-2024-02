<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            ArtistaSeeder::class,
            GeneroSeeder::class,
            AlbumSeeder::class,
            CancionSeeder::class,
            PlaylistSeeder::class,
            RelacionesSeeder::class,
        ]);
    }
}
