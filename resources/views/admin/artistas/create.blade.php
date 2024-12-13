@extends ('layouts.admin')

@section('title','Creando un Artista')

@section('content')

<form action="{{ route('artistas.store') }}" method="POST">
    @csrf <!-- Token CSRF obligatorio -->
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre del artista</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
    </div>
    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripcion</label>
        <input type="text" class="form-control" id="descripcion" name="descripcion" required>
    </div>
    <button type="submit" class="btn btn-primary">Crear</button>
</form>

@endsection