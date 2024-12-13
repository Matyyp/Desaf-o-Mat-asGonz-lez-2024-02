@extends ('layouts.admin')

@section('title','Modificando un género')

@section('content')

<form action="{{ route('generos.update', $genero) }}" method="POST">
    @csrf <!-- Token CSRF obligatorio -->
    @method('PUT') <!-- Indica que es una solicitud PUT -->
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre del género</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $genero->nombre }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>

@endsection
