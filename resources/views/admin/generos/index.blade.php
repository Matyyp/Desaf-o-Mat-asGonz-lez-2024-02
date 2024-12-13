@extends ('layouts.admin')
@section('title', 'Listado de Generos')
@section('content')
<h1>Administrar Generos</h1>
<a href="{{ route('generos.create') }}" class="btn btn-primary mb-3">Crear genero</a>
<table class="table">
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach($generos as $genero)
      <tr>
        <td>{{ $genero->nombre }}</td>
        <td>
            <!-- Botón Editar -->
            <a href="{{ route('generos.edit', $genero) }}" class="btn btn-sm btn-warning">Editar</a>
            
            <!-- Botón Eliminar -->
            <form action="{{ route('generos.destroy', $genero) }}" method="POST" class="d-inline">
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