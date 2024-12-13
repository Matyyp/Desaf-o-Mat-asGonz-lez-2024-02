@extends ('layouts.admin')

@section('title','Creando un Álbum')

@section('content')

<form action="{{ route('albums.store') }}" method="POST" enctype="multipart/form-data">
    @csrf <!-- Token CSRF obligatorio -->

    <div class="mb-3">
        <label for="titulo" class="form-label">Título</label>
        <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo') }}" required>
    </div>

    <div class="mb-3">
        <label for="año_lanzamiento" class="form-label">Año de Lanzamiento</label>
        <input type="number" class="form-control" id="año_lanzamiento" name="año_lanzamiento" value="{{ old('año_lanzamiento') }}" required>
    </div>

    <div class="mb-3">
        <label for="artista_id" class="form-label">Artista</label>
        <select class="form-control @error('artista_id') is-invalid @enderror" id="artista_id" name="artista_id">
            <option value="" disabled selected>Seleccione un artista</option> <!-- Placeholder -->
            @foreach($artistas as $artista)
                <option value="{{ $artista->id }}" {{ old('artista_id') == $artista->id ? 'selected' : '' }}>{{ $artista->nombre }}</option>
            @endforeach
        </select>
        @error('artista_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="caratula" class="form-label">Carátula</label>
        <input type="file" class="form-control @error('caratula') is-invalid @enderror" id="caratula" name="caratula" accept="image/*">
        @error('caratula')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Crear</button>
</form>

@endsection
