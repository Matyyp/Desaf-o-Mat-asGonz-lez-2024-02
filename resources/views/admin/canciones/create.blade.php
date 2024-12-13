@extends ('layouts.admin')

@section('title','Creando una Canción')

@section('content')

<form action="{{ route('canciones.store') }}" method="POST" enctype="multipart/form-data">
    @csrf <!-- Token CSRF obligatorio -->

    <!-- Título -->
    <div class="mb-3">
        <label for="titulo" class="form-label">Título</label>
        <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo') }}" required>
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
        <select class="form-control @error('genero_id') is-invalid @enderror" id="genero_id" name="genero_id">
            <option value="" disabled selected>Seleccione un género</option>
            @foreach($generos as $genero)
                <option value="{{ $genero->id }}" {{ old('genero_id') == $genero->id ? 'selected' : '' }}>
                    {{ $genero->nombre }}
                </option>
            @endforeach
        </select>
        @error('genero_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Álbum -->
    <div class="form-group">
        <label for="album_id" class="form-label">Álbum (Opcional)</label>
        <select class="form-control @error('album_id') is-invalid @enderror" id="album_id" name="album_id">
            <option value="" disabled selected>Seleccione un álbum</option>
            @foreach($albums as $album)
                <option value="{{ $album->id }}" {{ old('album_id') == $album->id ? 'selected' : '' }}>
                    {{ $album->titulo }}
                </option>
            @endforeach
        </select>
        @error('album_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Duración -->
    <div class="mb-3">
        <label for="duracion" class="form-label">Duración (en segundos)</label>
        <input type="number" class="form-control" id="duracion" name="duracion" value="{{ old('duracion') }}" required>
    </div>


    <!-- Archivo MP3 -->
    <div class="mb-3">
        <label for="archivo_mp3" class="form-label">Archivo MP3</label>
        <input type="file" class="form-control @error('archivo_mp3') is-invalid @enderror" id="archivo_mp3" name="archivo_mp3" accept=".mp3" >
        @error('archivo_mp3')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Carátula -->
    <div class="mb-3">
        <label for="caratula" class="form-label">Carátula (Opcional, si no pertenece a un álbum)</label>
        <input type="file" class="form-control @error('caratula') is-invalid @enderror" id="caratula" name="caratula" accept="image/*">
        @error('caratula')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Crear</button>
</form>

@endsection
