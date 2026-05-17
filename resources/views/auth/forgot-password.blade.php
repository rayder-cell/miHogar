<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar contraseña - Mi Hogar</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="login-container">
        <div class="login-logo">
            <img src="{{ asset('img/LOGO1.png') }}" alt="Mi Hogar">
        </div>

        <p class="login-subtitulo">Ingresa tu correo para recuperar tu contraseña</p>

        @if (session('status'))
            <div class="error-msg" style="background:#1a3a1a; border-color:#2d7a2d; color:#4CAF50;">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="error-msg">
                ❌ {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="form-group">
                <label for="correo">Correo electrónico</label>
                <input type="email" id="correo" name="correo"
                    value="{{ old('correo') }}"
                    placeholder="tu@correo.com" required autofocus>
            </div>
            <button type="submit" class="btn-login">Enviar enlace de recuperación</button>
        </form>

        <div class="back-link">
            <a href="{{ route('login') }}">← Volver al login</a>
        </div>
    </div>
</body>
</html>