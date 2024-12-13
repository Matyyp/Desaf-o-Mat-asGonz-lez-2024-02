<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Panel de Administración - {{ config('app.name', 'Blog Musical') }}</title>

    <!-- Tabler CSS desde CDN -->
    <link href="https://cdn.jsdelivr.net/npm/@tabler/core@latest/dist/css/tabler.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/@tabler/icons@latest/iconfont/tabler-icons.min.css" rel="stylesheet"/>

    <style>
         aside.navbar-vertical {
             position: fixed;
             top: 0;
             bottom: 0;
             left: 0;
             overflow-y: auto;
         }
    </style>
  </head>
  <body>
    <div class="page">
      <header class="navbar navbar-expand-md navbar-light bg-white border-bottom">
        <div class="container-xl">
          
          <h1 class="navbar-brand navbar-brand-autodark pe-0 pe-md-3">
            <a href="{{ route('admin.index') }}">Panel Admin</a>
          </h1>
          <div class="navbar-nav flex-row order-md-last">
            <div class="nav-item dropdown">
              <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown">
                <span class="avatar avatar-sm">{{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}</span>
                <div class="d-none d-xl-block ps-2">{{ Auth::user()->name }}</div>
              </a>
              <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button type="submit" class="dropdown-item">Cerrar sesión</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </header>

      <!-- Sidebar (barra lateral) -->
      <aside class="navbar navbar-vertical navbar-expand-md navbar-light">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="sidebar-menu">
            <ul class="navbar-nav pt-lg-3">
              <li class="nav-item {{ request()->is('admin/generos*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('generos.index') }}">
                  <span class="nav-link-title">Géneros Musicales</span>
                </a>
              </li>
              <li class="nav-item {{ request()->is('admin/artistas*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('artistas.index') }}">
                  <span class="nav-link-title">Artistas</span>
                </a>
              </li>
              <li class="nav-item {{ request()->is('admin/albums*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('albums.index') }}">
                  <span class="nav-link-title">Álbumes</span>
                </a>
              </li>
              <li class="nav-item {{ request()->is('admin/canciones*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('canciones.index') }}">
                  <span class="nav-link-title">Canciones</span>
                </a>
              </li>
              <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/') }}">
                  <span class="nav-link-title">Ir al Inicio</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </aside>

      <div class="page-wrapper">
        <div class="container-xl mt-3">
          @yield('content')
        </div>
      </div>
    </div>

    <!-- Tabler JS desde CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@latest/dist/js/tabler.min.js"></script>
  </body>
</html>
