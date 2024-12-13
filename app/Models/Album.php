<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'año_lanzamiento', 'caratula', 'artista_id'];

    public function canciones()
    {
        return $this->hasMany(Cancion::class);
    }

    public function artista()
    {
        return $this->belongsTo(Artista::class);
    }
}
