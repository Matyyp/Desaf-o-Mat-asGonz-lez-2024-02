<nav class="d-flex flex-wrap align-items-center justify-content-between py-3 mb-4 border-bottom bg-white container">
    <div class="col-md-3 mb-2 mb-md-0">
        <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
            <span class="fs-4">MusicHub</span>
        </a>
    </div>
    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        
        @auth
            @if(auth()->user()->hasRole('admin'))
                <li><a href="{{ route('admin.index') }}" class="nav-link px-2 {{ request()->is('admin') ? 'link-primary' : 'link-secondary' }}">Panel de Admin</a></li>
            @endif
        @endauth
    </ul>
    <div class="col-md-3 text-end">
        @auth
            <span class="me-3">{{ Auth::user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-outline-danger">Cerrar Sesión</button>
            </form>
        @else
            <a class="btn btn-outline-primary me-2" href="{{ route('login') }}">Iniciar sesion</a>
            <a class="btn btn-primary" href="{{ route('register') }}">Unete</a>
        @endauth
    </div>
</nav>
