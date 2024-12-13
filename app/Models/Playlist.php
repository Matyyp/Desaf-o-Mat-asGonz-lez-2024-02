<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion'];

    public function canciones()
    {
        return $this->belongsToMany(Cancion::class, 'playlist_cancion');
    }
}
