@extends ('layouts.admin')

@section('title','Creando un género')

@section('content')

<form action="{{ route('generos.store') }}" method="POST">
    @csrf <!-- Token CSRF obligatorio -->
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre del género</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
    </div>
    <button type="submit" class="btn btn-primary">Crear</button>
</form>

@endsection
