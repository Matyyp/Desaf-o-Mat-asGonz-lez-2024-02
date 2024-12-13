<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     * Incluye funcionalidad de búsqueda y paginación.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request)
     {
         $search = $request->input('search');

         // Consulta base con relaciones necesarias
         $albumsQuery = Album::with('artista');

         // Si hay una búsqueda, filtrar los álbumes por título, artista o año de lanzamiento
         if ($search) {
             $albumsQuery->where('titulo', 'like', "%{$search}%")
                        ->orWhereHas('artista', function($query) use ($search) {
                            $query->where('nombre', 'like', "%{$search}%");
                        })
                        ->orWhere('año_lanzamiento', 'like', "%{$search}%");
         }

         // Paginación, por ejemplo, 10 álbumes por página
         $albums = $albumsQuery->paginate(10)->withQueryString();

         return view('albums.index', compact('albums', 'search'));
     }

    /**
     * Display the specified resource.
     * Muestra los detalles del álbum y sus canciones.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        // Cargar las canciones relacionadas con el álbum
        $album->load('canciones.artistas');

        return view('albums.show', compact('album'));
    }

    // Otros métodos (create, store, edit, update, destroy) se mantienen sin cambios o se implementan según tus necesidades.
}
