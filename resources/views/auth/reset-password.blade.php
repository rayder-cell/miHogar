<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva contraseña - Mi Hogar</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="login-container">
        <div class="login-logo">
            <img src="{{ asset('img/LOGO1.png') }}" alt="Mi Hogar">
        </div>

        <p class="login-subtitulo">Ingresa tu nueva contraseña</p>

        @if ($errors->any())
            <div class="error-msg">
                ❌ {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="form-group">
                <label for="correo">Correo electrónico</label>
                <input type="email" id="correo" name="email"
                    value="{{ old('email', $request->email) }}"
                    placeholder="tu@correo.com" required autofocus>
            </div>

            <div class="form-group">
                <label for="password">Nueva contraseña</label>
                <input type="password" id="password" name="password"
                    placeholder="••••••••" required autocomplete="new-password">
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirmar contraseña</label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                    placeholder="••••••••" required autocomplete="new-password">
            </div>

            <button type="submit" class="btn-login">Guardar nueva contraseña</button>
        </form>

        <div class="back-link">
            <a href="{{ route('login') }}">← Volver al login</a>
        </div>
    </div>
</body>
</html>