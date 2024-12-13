<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cancion;
use App\Models\Artista;
use App\Models\Playlist;

class RelacionesSeeder extends Seeder
{
    public function run()
    {
        // Poblar la tabla intermedia `artista_cancion`
        Cancion::all()->each(function ($cancion) {
            $artistas = Artista::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $cancion->artistas()->attach($artistas);
        });

        // Poblar la tabla intermedia `playlist_cancion`
        Playlist::all()->each(function ($playlist) {
            $canciones = Cancion::inRandomOrder()->take(rand(5, 10))->pluck('id');
            $playlist->canciones()->attach($canciones);
        });
    }
}
