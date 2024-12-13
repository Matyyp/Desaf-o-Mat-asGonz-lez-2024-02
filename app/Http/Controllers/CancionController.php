<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cancion;

class CancionController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->input('search');
        $canciones = Cancion::name($search)
                            ->with(['album', 'artistas', 'genero'])
                            ->paginate(12)
                            ->withQueryString();

        return view('canciones.index', compact('canciones', 'search'));
    }

    public function show(Cancion $cancione)
    {
        $cancione->increment('visitas');
        $cancione->load(['album', 'artistas', 'genero']);
        return view('canciones.show', ['cancion' => $cancione]);
    }
}
