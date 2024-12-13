<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use Illuminate\Http\Request;

class AdminGeneroController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }

    public function index()
    {
        $generos = Genero::all();
        return view('admin.generos.index', compact('generos'));
    }   
    public function create()
    {
        return view('admin.generos.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
        ]);
    
        Genero::create($data);
    
        return redirect()->route('generos.index');
    }
    public function edit(Genero $genero)
    {
        return view('admin.generos.edit', compact('genero'));
    }
    public function update(Request $request, Genero $genero)
    {
        $genero->nombre = $request->nombre;
        $genero ->save();
        return redirect()->route('generos.index');
    }
    public function destroy(Genero $genero)
    {
        $genero -> delete();
        return redirect()->route('generos.index');
    }
}
