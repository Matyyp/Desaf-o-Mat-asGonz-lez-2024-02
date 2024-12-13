<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cancion extends Model
{
    use HasFactory;
    protected $table = 'canciones';


    protected $fillable = [
        'titulo',
        'genero_id',
        'album_id',
        'duracion',
        'archivo_mp3',
        'caratula',
        'visitas',
    ];
    

    public function album()
    {
        return $this->belongsTo(Album::class);
    }

    public function genero()
    {
        return $this->belongsTo(Genero::class);
    }

    public function artistas()
    {
        return $this->belongsToMany(Artista::class, 'artista_cancion');
    }


    public function playlists()
    {
        return $this->belongsToMany(Playlist::class, 'playlist_cancion');
    }

    public function scopeName($query, $name)
    {
        if ($name) {
            return $query->where('titulo', 'LIKE', "%{$name}%")
                         ->orWhereHas('artistas', function ($q) use ($name) {
                             $q->where('nombre', 'LIKE', "%{$name}%");
                         })
                         ->orWhereHas('album', function ($q) use ($name) {
                             $q->where('titulo', 'LIKE', "%{$name}%");
                         });
        }
        return $query;
    }
    
}
