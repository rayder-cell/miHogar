<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Inmobiliaria Mi Hogar</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>

    <div class="login-container">

        <!-- LOGO -->
        <div class="login-logo">
            <img src="{{ asset('img/LOGO1.png') }}" alt="Mi Hogar">
        </div>

        <p class="login-titulo">Panel Admin</p>
        <p class="login-subtitulo">Ingresa tus credenciales para continuar</p>

        @if ($errors->any())
        <div class="error-msg">
            ❌ {{ $errors->first() }}
        </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="correo">Correo electrónico</label>
                <input type="email" id="correo" name="correo"
                       value="{{ old('correo') }}"
                       placeholder="tu@correo.com"
                       required autofocus>
            </div>

            <div class="form-group">
                <label for="contrasena">Contraseña</label>
                <input type="password" id="contrasena" name="contrasena"
                       placeholder="••••••••"
                       required>
            </div>

            <div class="remember-row">
                <label>
                    <input type="checkbox" name="remember">
                    Recordarme
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
                @endif
            </div>

            <button type="submit" class="btn-login">Ingresar</button>
        </form>

        <div class="back-link">
            <a href="{{ url('/') }}">← Volver al sitio web</a>
        </div>

    </div>

</body>
</html>