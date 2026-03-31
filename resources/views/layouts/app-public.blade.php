<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inmobiliaria Mi Hogar</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Arial', sans-serif; background: #000; color: #fff; }

        /* NAVBAR */
        nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #000;
            padding: 10px 40px;
            border-bottom: 2px solid #c9a84c;
        }
        nav .logo img { height: 60px; }
        nav .menu {
            display: flex;
            align-items: center;
            gap: 30px;
            list-style: none;
        }
        nav .menu a {
            color: #c9a84c;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        nav .menu a:hover { color: #fff; }
        nav .menu .login a { color: #c9a84c; }

        /* FOOTER */
        footer {
            background: #c9a84c;
            color: #000;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 40px;
            font-size: 13px;
            font-weight: bold;
        }
        footer .redes { display: flex; gap: 15px; font-size: 20px; }
        footer .redes a { color: #000; text-decoration: none; }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav>
        <div class="logo">
            <img src="{{ asset('img/LOGO1.png') }}" alt="Mi Hogar"> 
        </div>
        <ul class="menu">
            <li><a href="#"><img src="{{ asset('img/lupa.png') }}" style="height:20px;"></a></li>
            <li><a href="{{ route('proyectos.index') }}">Nuestros Proyectos</a></li>
            <li><a href="{{ route('asesores.index') }}">Asesores de Venta</a></li>
            <li><a href="{{ route('nosotros') }}">Nosotros</a></li>
            <li class="login"><a href="{{ route('login') }}">LOGIN</a></li>
        </ul>
    </nav>

    <!-- CONTENIDO -->
    <main>
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer>
        <span>©2026 Inmobiliaria Mi Hogar</span>
        <div class="redes">
            <a href="#">&#x534;</a>
            <a href="#">&#xf09a;</a>
            <a href="#">&#xf16d;</a>
            <a href="#">&#xf232;</a>
        </div>
        <div style="text-align:right;">
            Andahuaylas, Apurímac<br>
            Cel. 912345678
        </div>
    </footer>

</body>
</html>