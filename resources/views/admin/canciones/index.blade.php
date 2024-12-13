@extends ('layouts.admin')

@section('content')
<h1>Administrar Canciones</h1>

<a href="{{ route('canciones.create') }}" class="btn btn-primary mb-3">Crear canción</a>

<table class="table">
  <thead>
    <tr>
      <th>Carátula</th>
      <th>Título</th>
      <th>Duración</th>
      <th>Álbum</th>
      <th>Artistas</th>
      <th>Genero</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach($canciones as $cancion)
      <tr>
        <td>
          @if($cancion->caratula)
            <img src="{{ Storage::url($cancion->caratula) }}" alt="Carátula Canción" width="100">
          @elseif($cancion->album && $cancion->album->caratula)
            <img src="{{ Storage::url($cancion->album->caratula) }}" alt="Carátula Álbum" width="100">
          @else
            Sin carátula
          @endif
        </td>
        <td>{{ $cancion->titulo }}</td>
        <td>{{ $cancion->duracion }}</td>
        <td>{{ optional($cancion->album)->titulo ?? 'Sin Álbum' }}</td>
        <td>{{ $cancion->artistas->pluck('nombre')->join(', ') ?: 'Sin Artistas' }}</td>
        <td>{{ $cancion->genero->nombre }}</td>
        <td>
          <a href="{{ route('canciones.edit', $cancion) }}" class="btn btn-sm btn-warning">Editar</a>
          <form action="{{ route('canciones.destroy', $cancion) }}" method="POST" class="d-inline">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta canción?')">Eliminar</button>
          </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
@endsection
