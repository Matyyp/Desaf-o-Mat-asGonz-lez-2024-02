@extends ('layouts.admin')

@section('title','Modificando un Artista')

@section('content')

<form action="{{ route('artistas.update', $artista) }}" method="POST">
    @csrf <!-- Token CSRF obligatorio -->
    @method('PUT') <!-- Indica que es una solicitud PUT -->
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $artista->nombre }}" required>
    </div>
    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripcion</label>
        <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ $artista->descripcion }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>

@endsection
