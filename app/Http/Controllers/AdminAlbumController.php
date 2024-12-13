<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class AdminAlbumController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }

    public function index()
    {
        $artistas = Artista::all();
        $albums = Album::all();
        return view('admin.albums.index', compact('albums','artistas'));
    }

    public function create()
    {
        $artistas = Artista::all();
        return view('admin.albums.create', compact('artistas'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'año_lanzamiento' => 'required|digits:4|integer|min:1900|max:2100',
            'artista_id' => 'required|exists:artistas,id',
            'caratula' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('caratula')) {
            $path = $request->file('caratula')->store('caratulas', 'public');
            $data['caratula'] = $path;
        }
        Album::create($data);
        return redirect()->route('albums.index');
    }

    public function edit(Album $album)
    {
        $artistas = Artista::all();
        return view('admin.albums.edit', compact('album','artistas'));
    }

    public function update(Request $request, Album $album)
{
    $data = $request->validate([
        'titulo' => 'required|string|max:255',
        'año_lanzamiento' => 'required|digits:4|integer|min:1900|max:2100',
        'artista_id' => 'required|exists:artistas,id',
        'caratula' => 'nullable|image|max:2048', 
    ]);

    if ($request->hasFile('caratula')) {
        if ($album->caratula) {
            Storage::delete('public/' . $album->caratula);
        }

        $path = $request->file('caratula')->store('caratulas', 'public');
        $data['caratula'] = $path;
    }

    // Asignación manual de los campos
    $album->titulo = $data['titulo'];
    $album->año_lanzamiento = $data['año_lanzamiento'];
    $album->artista_id = $data['artista_id'];

    if (isset($data['caratula'])) {
        $album->caratula = $data['caratula'];
    }

    $album->save();

    return redirect()->route('albums.index');
}

    public function destroy(Album $album)
    {
        $album->delete();
        return redirect()->route('albums.index');
    }
}
