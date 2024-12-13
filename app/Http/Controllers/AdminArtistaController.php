<?php

namespace App\Http\Controllers;

use App\Models\Artista;
use Illuminate\Http\Request;

class AdminArtistaController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }

    public function index()
    {
        $artistas = Artista::all();
        return view('admin.artistas.index', compact('artistas'));
    }

    public function create()
    {
         return view('admin.artistas.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required',
        ]);
    
        Artista::create($data);
    
        return redirect()->route('artistas.index');
    }

    public function edit(Artista $artista)
    {
        return view('admin.artistas.edit', compact('artista'));
    }


    public function update(Request $request, Artista $artista)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:1000',
        ]);

        $artista->update($data);

        return redirect()->route('artistas.index');
    }

    public function destroy(Artista $artista)
    {
        $artista -> delete();
        return redirect()->route('artistas.index');
    }
}
