@extends('layouts.admin')

@section('title', 'Editar Canción')

@section('content')

<h1>Editar Canción</h1>

<form action="{{ route('canciones.update', $cancione) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- Título -->
    <div class="mb-3">
        <label for="titulo" class="form-label">Título</label>
        <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo', $cancione->titulo) }}" required>
    </div>

    <!-- Artista -->
    <div class="form-group">
        <label for="artistas" class="form-label">Artistas</label>
        <div>
            @foreach($artistas as $artista)
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="artista_{{ $artista->id }}" name="artistas[]" value="{{ $artista->id }}" {{ is_array(old('artistas')) && in_array($artista->id, old('artistas')) ? 'checked' : '' }}>
                    <label class="form-check-label" for="artista_{{ $artista->id }}">{{ $artista->nombre }}</label>
                </div>
            @endforeach
        </div>
        @error('artistas')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Género -->
    <div class="form-group">
        <label for="genero_id" class="form-label">Género</label>
        <select class="form-control" id="genero_id" name="genero_id">
            @foreach($generos as $genero)
                <option value="{{ $genero->id }}" {{ old('genero_id', $cancione->genero_id) == $genero->id ? 'selected' : '' }}>
                    {{ $genero->nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Álbum -->
    <div class="form-group">
        <label for="album_id" class="form-label">Álbum</label>
        <select class="form-control" id="album_id" name="album_id">
            <option value="">Sin Álbum</option>
            @foreach($albums as $album)
                <option value="{{ $album->id }}" {{ old('album_id', $cancione->album_id) == $album->id ? 'selected' : '' }}>
                    {{ $album->titulo }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Duración -->
    <div class="mb-3">
        <label for="duracion" class="form-label">Duración (en segundos)</label>
        <input type="number" class="form-control" id="duracion" name="duracion" value="{{ old('duracion', strtotime($cancione->duracion)) }}" required>
    </div>

    <!-- Archivo MP3 -->
    <div class="mb-3">
        <label for="archivo_mp3" class="form-label">Archivo MP3</label>
        <input type="file" class="form-control" id="archivo_mp3" name="archivo_mp3" accept=".mp3">
        @if($cancione->archivo_mp3)
            <small>Archivo actual: {{ $cancione->archivo_mp3 }}</small>
        @endif
    </div>

    <!-- Carátula -->
    <div class="mb-3">
        <label for="caratula" class="form-label">Carátula</label>
        <input type="file" class="form-control" id="caratula" name="caratula" accept="image/*">
        @if($cancione->caratula)
            <img src="{{ Storage::url($cancione->caratula) }}" alt="Carátula actual" width="100">
        @endif
    </div>

    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="{{ route('canciones.index') }}" class="btn btn-secondary">Cancelar</a>
</form>

@endsection
