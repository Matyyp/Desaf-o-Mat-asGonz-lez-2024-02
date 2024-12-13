<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AlbumFactory extends Factory
{
    protected $model = \App\Models\Album::class;

    public function definition()
    {
        return [
            'titulo' => $this->faker->sentence(2),
            'año_lanzamiento' => $this->faker-> year,
            'caratula' => $this->faker-> imageUrl(),
            'artista_id' => \App\Models\Artista::factory(),
        ];
    }
}
