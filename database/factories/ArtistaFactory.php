<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArtistaFactory extends Factory
{
    protected $model = \App\Models\Artista::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->name,
            'descripcion' => $this->faker->sentence(10),
        ];
    }
}
