<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cancion;

class HomeController extends Controller
{
    public function index()
    {
        // Obtener las canciones más populares o según tu criterio de "destacadas"
        $cancionesDestacadas = Cancion::with(['album', 'artistas', 'genero'])
                                    ->orderBy('visitas', 'desc') // Por ejemplo, las más visitadas
                                    ->take(12) // Ajusta el número según tus necesidades
                                    ->get();

        return view('home.index', compact('cancionesDestacadas'));
    }
}
