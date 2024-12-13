<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artista extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion'];

    public function albums()
    {
        return $this->hasMany(Album::class);
    }

    public function canciones()
    {
        return $this->belongsToMany(Cancion::class, 'artista_cancion');
    }
}
