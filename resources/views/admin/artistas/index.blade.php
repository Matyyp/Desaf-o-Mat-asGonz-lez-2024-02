@extends ('layouts.admin')

@section('title', 'Listado de Artistas')

@section('content')

<h1>Administrar Artistas</h1>
<a href="{{ route('artistas.create') }}" class="btn btn-primary mb-3">Crear artista</a>
<table class="table">
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Descripción</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach($artistas as $artista)
      <tr>
        <td>{{ $artista->nombre }}</td>
        <td>{{ $artista->descripcion }}</td>
        <td>
            <!-- Botón Editar -->
            <a href="{{ route('artistas.edit', $artista) }}" class="btn btn-sm btn-warning">Editar</a>
            
            <!-- Botón Eliminar -->
            <form action="{{ route('artistas.destroy', $artista) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar este género?')">Eliminar</button>
            </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>

@endsection