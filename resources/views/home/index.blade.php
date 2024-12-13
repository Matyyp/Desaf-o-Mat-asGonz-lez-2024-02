@extends('layouts.app')

@section('title', 'Inicio')

@section('content')

    <section class="jumbotron text-center bg-primary text-white py-5">
        <div class="container">
            <h1 class="jumbotron-heading">Bienvenido a MusicHub</h1>
            <p class="lead">Descubre, escucha y disfruta de tus canciones y álbumes favoritos.</p>
            <p>
                <a href="canciones" class="btn btn-secondary my-2">Explorar Canciones</a></li>
                <a href="generos" class="btn btn-secondary my-2">Explorar Géneros</a>
            </p>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <h2 class="mb-4 text-center">Canciones Destacadas</h2>

            @if($cancionesDestacadas->isEmpty())
                <p class="text-center">No hay canciones destacadas para mostrar.</p>
            @else
                @php
                    // Dividir las canciones en grupos de 4
                    $chunks = $cancionesDestacadas->chunk(4);
                @endphp

                <div id="cancionesDestacadasCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        @foreach($chunks as $index => $chunk)
                            <button type="button" data-bs-target="#cancionesDestacadasCarousel" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}" aria-current="{{ $index == 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"></button>
                        @endforeach
                    </div>

                    <div class="carousel-inner">
                        @foreach($chunks as $index => $chunk)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <div class="row gy-3">
                                    @foreach($chunk as $cancion)
                                        <div class="col-6 col-md-3">
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
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#cancionesDestacadasCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Anterior</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#cancionesDestacadasCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Siguiente</span>
                    </button>
                    <hr>
                </div>
            @endif
        </div>
    </section>

    <section class="pb-5">
        <div class="container">
            <h2 class="mb-4 text-center">¿Buscas algo en especifico?</h2>
            <form action="canciones" method="GET">
                <div class="input-group mb-3">
                    <input type="text" name="search" class="form-control" placeholder="Buscar por título, artista o álbum" value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">Buscar</button>
                </div>
            </form>
        </div>
    </section>

@endsection
