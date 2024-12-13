
@extends('layouts.guest')

@section('content')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse - MusicHub</title>
    <!-- Incluye los estilos de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <div class="container mt-5 d-flex justify-content-center">
        <div class="row col-4 shadow p-5">
            <div class="text-center mb-3">
                <h1>Registrarse</h1>
            </div>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="mb-3" >
                    <label for="name" class="form-label">Nombre</label>
                    <input class="form-control" id="name" type="text" name="name" required>
                </div>

                <!-- Email -->
                <div class="mb-3" >
                    <label for="email" class="form-label">Email</label>
                    <input class="form-control" id="email" type="email" name="email" required>
                </div>

                <!-- Password -->
                <div class="mb-3" >
                    <label for="password" class="form-label">Contraseña</label>
                    <input class="form-control" id="password" type="password" name="password" required>
                </div>

                <!-- Confirm Password -->
                <div class="mb-3" >
                    <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                    <input class="form-control" id="password_confirmation" type="password" name="password_confirmation" required>
                </div>
                <!-- Submit -->
                <button type="submit" class="btn btn-primary w-100">Registrarse</button>
                <div class="text-center mt-3">
                    <p>¿Ya tienes una cuenta? <a href="{{ route('login') }}">Inicia sesión</a></p>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

@endsection

