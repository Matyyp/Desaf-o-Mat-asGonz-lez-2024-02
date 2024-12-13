@extends('layouts.app')

@section('title', 'Listado de Canciones')

@section('content')
    <h1 class="text-center my-4">Listado de Canciones</h1>

    <div class="container">
        <div>
            <div class="container">
                <h2 class="">Buscador</h2>
                <form action="canciones" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" name="search" class="form-control" placeholder="Buscar por título, artista o álbum" value="{{ request('search') }}">
                        <button class="btn btn-primary" type="submit">Buscar</button>
                    </div>
                </form>
            </div>
        </div>
        @if($search)
            <div class="alert alert-secondary text-center">
                Resultados de la búsqueda para: <strong>{{ $search }}</strong>
            </div>
        @endif
        @if($canciones->isEmpty())
            <p class="text-center">No se encontraron canciones.</p>
        @else
            <div class="row gy-3">
                @foreach($canciones as $cancion)
                    <div class="col-6 col-sm-4 col-md-3">
                        <a href="{{ route('canciones.show', $cancion) }}" class="text-decoration-none text-dark">
                            <div class="card h-100">
                                @if($cancion->caratula)
                                    <img src="{{ Storage::url($cancion->caratula) }}" class="card-img-top" alt="Carátula de {{ $cancion->titulo }}" style="height: 150px; object-fit: cover;">
                                @elseif($cancion->album && $cancion->album->caratula)
                                    <img src="{{ Storage::url($cancion->album->caratula) }}" class="card-img-top" alt="Carátula del Álbum {{ $cancion->album->titulo }}" style="height: 150px; object-fit: cover;">
                                @else
                                    <img src="{{ asset('images/placeholder.png') }}" class="card-img-top" alt="Sin Carátula" style="height: 150px; object-fit: cover;">
                                @endif

                                <div class="card-body text-center p-2">
                                    <h6 class="card-title mb-1 text-truncate" title="{{ $cancion->titulo }}">{{ $cancion->titulo }}</h6>
                                    <small class="text-muted">
                                        {{ $cancion->artistas->pluck('nombre')->join(', ') ?: 'Sin Artistas' }}
                                    </small>
                                    <div class="mt-2">
                                        <span class="badge bg-secondary">{{ $cancion->duracion }}</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center mt-4">
                {{ $canciones->links() }}
            </div>
        @endif
    </div>
@endsection
