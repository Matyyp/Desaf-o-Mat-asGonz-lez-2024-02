@extends ('layouts.admin')

@section('title', 'Listado de Albumes')

@section('content')

<h1>Administrar Albums</h1>
<a href="{{ route('albums.create') }}" class="btn btn-primary mb-3">Crear album</a>
<table class="table">
  <thead>
    <tr>
        <th>Carátula</th>
        <th>Título</th>
        <th>Año de lanzamiento</th>
        <th>Artista</th>
        <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach($albums as $album)
      <tr>
        <td>
          @if($album->caratula)
            <img src="{{ Storage::url($album->caratula) }}" alt="Carátula del Álbum" width="100">
          @else
            <span>Sin carátula</span>
          @endif
        </td>
        <td>{{ $album->titulo }}</td>
        <td>{{ $album->año_lanzamiento }}</td>
        <td>{{ $album->artista->nombre }}</td>
        <td>
            <a href="{{ route('albums.edit', $album) }}" class="btn btn-sm btn-warning">Editar</a>
            <form action="{{ route('albums.destroy', $album) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar este álbum?')">Eliminar</button>
            </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>

@endsection
