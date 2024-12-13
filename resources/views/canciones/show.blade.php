@extends('layouts.app')

@section('title', $cancion->titulo)

@section('content')
<div class="container my-5">
    <div class="row align-items-center">
        <div class="col-12 col-md-6 mb-4 mb-md-0">
            <div class="img text-center">
                @if($cancion->caratula)
                    <img src="{{ Storage::url($cancion->caratula) }}" class="img-fluid rounded shadow" alt="Carátula de {{ $cancion->titulo }}" style="max-height: 400px; object-fit: cover;">
                @elseif($cancion->album && $cancion->album->caratula)
                    <img src="{{ Storage::url($cancion->album->caratula) }}" class="img-fluid rounded shadow" alt="Carátula del Álbum {{ $cancion->album->titulo }}" style="max-height: 400px; object-fit: cover;">
                @else
                    <img src="{{ asset('images/placeholder.png') }}" class="img-fluid rounded shadow" alt="Sin Carátula" style="max-height: 400px; object-fit: cover;">
                @endif
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="card border-0 shadow p-4">
                <h1 class="display-5 text-primary">{{ $cancion->titulo }}</h1>
                <hr class="my-3">

                <p class="mb-2">
                    <strong class="text-secondary">Artistas:</strong> <span class="text-dark">{{ $cancion->artistas->pluck('nombre')->join(', ') }}</span>
                </p>

                <p class="mb-2">
                    <strong class="text-secondary">Álbum:</strong> <span class="text-dark">{{ optional($cancion->album)->titulo ?? 'Sin Álbum' }}</span>
                </p>

                <p class="mb-2">
                    <strong class="text-secondary">Género:</strong> <span class="text-dark">{{ optional($cancion->genero)->nombre ?? 'Sin Género' }}</span>
                </p>

                <p class="mb-2">
                    <strong class="text-secondary">Duración:</strong> <span class="text-dark">{{ $cancion->duracion }}</span>
                </p>

                <p class="mb-2">
                    <strong class="text-secondary">Visitas:</strong> <span class="text-dark">{{ $cancion->visitas }}</span>
                </p>

                <hr class="my-3">
                <a href="{{ url()->previous() }}" class="btn btn-secondary btn-lg">Regresar</a>
            </div>
        </div>
    </div>
</div>

@endsection
