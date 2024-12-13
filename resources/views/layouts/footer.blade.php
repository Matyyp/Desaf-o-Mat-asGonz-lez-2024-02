<footer class="bg-dark text-white py-4 mt-auto">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h5>Contacto</h5>
                <p>Email: ejemplo@ejemplo.cl</p>
                <p>Teléfono: +1 234 567 890</p>
            </div>
            <div class="col-md-4">
                <h5>Enlaces</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('home.index') }}" class="text-white text-decoration-none">Inicio</a></li>
                    <li><a href="canciones" class="text-white text-decoration-none">Canciones</a></li>
                    <li><a href="generos" class="text-white text-decoration-none">Géneros</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5>Términos y Condiciones</h5>
                <p><a href="#" class="text-white text-decoration-none">Política de Privacidad</a></p>
                <p><a href="#" class="text-white text-decoration-none">Términos de Uso</a></p>
            </div>
        </div>
        <hr class="bg-white">
        <p class="text-center mb-0">&copy; {{ date('Y') }} MusicHub. Todos los derechos reservados.</p>
    </div>
</footer>