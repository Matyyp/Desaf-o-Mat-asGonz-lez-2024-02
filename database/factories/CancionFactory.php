<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CancionFactory extends Factory
{
    protected $model = \App\Models\Cancion::class;

    public function definition()
    {
        return [
            'titulo'=>$this->faker->sentence(2),
            'duracion'=>$this->faker->time('h:i:s'),
            'año_lanzamiento'=>$this->faker->year,
            'caratula'=>$this->faker->imageUrl(),
            'archivo_mp3'=>$this->faker->url,
            'album_id' => \App\Models\Album::factory(),
            'genero_id' => \App\Models\Genero::factory(),
        ];
    }
}
