<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GeneroFactory extends Factory
{
    protected $model = \App\Models\Genero::class;
    
    public function definition()
    {
        return [
            'nombre' => $this->faker->unique()->word,
        ];
    }
}
