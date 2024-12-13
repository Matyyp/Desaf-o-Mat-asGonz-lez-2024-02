@extends ('layouts.app')

@section ('content')
  <div class="container my-5">
      <h2 class="mb-4 text-center">Nuestros Géneros Musicales</h2>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
          @foreach($generos as $genero)
              <div class="col">
                  <a href="" class="text-decoration-none">
                      <div class="card genre-card h-100">
                          <div class="card-body d-flex align-items-center justify-content-center p-3">
                              <h5 class="card-title genre-title text-center text-truncate" title="{{ $genero->nombre }}">
                                  {{ $genero->nombre }}
                              </h5>
                          </div>
                      </div>
                  </a>
              </div>
          @endforeach
      </div>
  </div>
@endsection