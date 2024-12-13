@extends('layouts.admin')

@section('title', 'Editar Álbum')

@section('content')

<h1>Editar Álbum</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('albums.update', $album) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="titulo" class="form-label">Título</label>
        <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo', $album->titulo) }}" required>
    </div>

    <div class="mb-3">
        <label for="año_lanzamiento" class="form-label">Año de Lanzamiento</label>
        <input type="number" class="form-control" id="año_lanzamiento" name="año_lanzamiento" value="{{ old('año_lanzamiento', $album->año_lanzamiento) }}" required>
    </div>

    <div class="mb-3">
        <label for="artista_id" class="form-label">Artista</label>
        <select class="form-control" id="artista_id" name="artista_id" required>
            <option value="" disabled>Seleccione un artista</option>
            @foreach($artistas as $artista)
                <option value="{{ $artista->id }}" {{ old('artista_id', $album->artista_id) == $artista->id ? 'selected' : '' }}>
                    {{ $artista->nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="caratula" class="form-label">Carátula</label>
        @if($album->caratula)
            <div class="mb-2">
                <img src="{{ Storage::url($album->caratula) }}" alt="Carátula actual" width="100">
            </div>
        @endif
        <input type="file" class="form-control" id="caratula" name="caratula" accept="image/*">
    </div>

    <button type="submit" class="btn btn-success">Actualizar</button>
    <a href="{{ route('albums.index') }}" class="btn btn-secondary">Cancelar</a>
</form>

@endsection
