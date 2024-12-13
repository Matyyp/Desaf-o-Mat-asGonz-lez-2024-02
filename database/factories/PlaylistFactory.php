<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PlaylistFactory extends Factory
{
    protected $model = \App\Models\Playlist::class;

    public function definition()
    {
        return [
            'nombre'=>$this->faker->sentence(2),
            'descripcion'=>$this->faker->paragraph,
        ];
    }
}
