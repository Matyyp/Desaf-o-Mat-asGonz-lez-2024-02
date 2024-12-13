<?php

namespace App\Http\Controllers;

use App\Models\Cancion;
use App\Models\Artista;
use App\Models\Genero;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminCancionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }

    public function index()
    {
        $canciones = Cancion::with(['album', 'artistas'])->get();
        return view('admin.canciones.index', compact('canciones'));
    }
    public function create()
    {
        $generos = Genero::all();
        $artistas = Artista::all();
        $albums = Album::all();
        return view('admin.canciones.create', compact('generos','artistas','albums'));
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'genero_id' => 'required|exists:generos,id',
            'album_id' => 'nullable|exists:albums,id',
            'artistas' => 'required|array',
            'artistas.*' => 'exists:artistas,id', 
            'duracion' => 'required|integer|min:1', 
            'archivo_mp3' => 'nullable|mimes:mp3|max:10240',
            'caratula' => 'nullable|image|max:2048', 
        ]);
        $data['duracion'] = gmdate('H:i:s', $data['duracion']);
        if ($request->hasFile('archivo_mp3')) {
            $data['archivo_mp3'] = $request->file('archivo_mp3')->store('canciones', 'public');
        }
        if (!empty($data['album_id'])) {
            // Si pertenece a un álbum, usa la carátula del álbum
            $album = Album::find($data['album_id']);
            $data['caratula'] = $album->caratula;
        } elseif ($request->hasFile('caratula')) {
            // Si no pertenece a un álbum, sube la carátula propia
            $data['caratula'] = $request->file('caratula')->store('caratulas', 'public');
        }
        $cancion = Cancion::create($data);
        $cancion->artistas()->sync($data['artistas']);

        return redirect()->route('canciones.index')->with('success', 'Canción creada con éxito.');
    }

    public function edit(Cancion $cancione)
    {
        $generos = Genero::all();
        $artistas = Artista::all();
        $albums = Album::all();
    
        return view('admin.canciones.edit', compact('cancione', 'generos', 'artistas', 'albums'));
    }

    public function update(Request $request, Cancion $cancione)
    {
        $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'genero_id' => 'required|exists:generos,id',
            'album_id' => 'nullable|exists:albums,id',
            'artistas' => 'required|array',
            'artistas.*' => 'exists:artistas,id',
            'duracion' => 'required|integer|min:1',
            'archivo_mp3' => 'nullable|mimes:mp3|max:10240',
            'caratula' => 'nullable|image|max:2048', 
        ]);
        $data['duracion'] = gmdate('H:i:s', $data['duracion']);
        if ($request->hasFile('archivo_mp3')) {
            if ($cancione->archivo_mp3) {
                Storage::disk('public')->delete($cancione->archivo_mp3);
            }
            $data['archivo_mp3'] = $request->file('archivo_mp3')->store('canciones', 'public');
        }
        if (!empty($data['album_id'])) {
            $album = Album::find($data['album_id']);
            $data['caratula'] = $album->caratula;
        } elseif ($request->hasFile('caratula')) {
            if ($cancione->caratula && (!$cancione->album_id || $cancione->caratula !== $cancione->album->caratula)) {
                Storage::disk('public')->delete($cancione->caratula);
            }
            $data['caratula'] = $request->file('caratula')->store('caratulas', 'public');
        }
        $cancione->update($data);
        $cancione->artistas()->sync($data['artistas']);

        return redirect()->route('canciones.index')->with('success', 'Canción actualizada con éxito.');
    }


    public function destroy(Cancion $cancione)
    {
        if ($cancione->caratula && (!$cancione->album_id || $cancione->caratula !== optional($cancione->album)->caratula)) {
            Storage::disk('public')->delete($cancione->caratula);
        }
        if ($cancione->archivo_mp3) {
            Storage::disk('public')->delete($cancione->archivo_mp3);
        }
        $cancione->delete();
        return redirect()->route('canciones.index')->with('success', 'Canción eliminada con éxito.');
    }

}
