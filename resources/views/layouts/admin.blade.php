<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin - Mi Hogar</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * { margin:0; padding:0; box-sizing:border-box; }
        body { font-family: Arial, sans-serif; background:#f4f4f4; display:flex; min-height:100vh; }

        /* SIDEBAR */
        .sidebar {
            width: 250px;
            background: #000;
            border-right: 2px solid #c9a84c;
            min-height: 100vh;
            padding: 20px 0;
            position: fixed;
        }
        .sidebar .logo {
            text-align: center;
            padding: 20px;
            border-bottom: 1px solid #c9a84c;
            margin-bottom: 20px;
        }
        .sidebar .logo span {
            color: #c9a84c;
            font-size: 1.2rem;
            font-weight: bold;
        }
        .sidebar ul { list-style: none; }
        .sidebar ul li a {
            display: block;
            padding: 12px 25px;
            color: #fff;
            text-decoration: none;
            font-size: 0.9rem;
            border-left: 3px solid transparent;
            transition: all 0.2s;
        }
        .sidebar ul li a:hover,
        .sidebar ul li a.active {
            background: #111;
            border-left: 3px solid #c9a84c;
            color: #c9a84c;
        }

        /* CONTENIDO */
        .main-content {
            margin-left: 250px;
            flex: 1;
            padding: 30px;
        }

        /* TOPBAR */
        .topbar {
            background: #fff;
            padding: 15px 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            border-bottom: 2px solid #c9a84c;
            border-radius: 4px;
        }
        .topbar h1 { font-size: 1.3rem; color: #333; }
        .topbar .user { color: #666; font-size: 0.9rem; }

        /* BOTONES */
        .btn-gold {
            background: #c9a84c;
            color: #000;
            padding: 8px 20px;
            font-weight: bold;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 0.9rem;
        }
        .btn-gold:hover { background: #b8962a; }
        .btn-danger {
            background: #dc3545;
            color: #fff;
            padding: 6px 14px;
            font-weight: bold;
            border: none;
            cursor: pointer;
            font-size: 0.85rem;
        }
        .btn-secondary {
            background: #666;
            color: #fff;
            padding: 6px 14px;
            font-weight: bold;
            text-decoration: none;
            font-size: 0.85rem;
        }

        /* TABLA */
        table { width:100%; border-collapse:collapse; background:#fff; }
        table th {
            background: #000;
            color: #c9a84c;
            padding: 12px 15px;
            text-align: left;
            font-size: 0.85rem;
        }
        table td { padding: 12px 15px; border-bottom: 1px solid #eee; font-size: 0.9rem; }
        table tr:hover { background: #f9f9f9; }

        /* FORMULARIO */
        .form-group { margin-bottom: 20px; }
        .form-group label { display:block; margin-bottom:6px; font-weight:bold; color:#333; font-size:0.9rem; }
        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid #ddd;
            font-size: 0.9rem;
            background: #fff;
        }
        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #c9a84c;
        }
        .card {
            background: #fff;
            padding: 25px;
            border-top: 3px solid #c9a84c;
        }
    </style>
</head>
<body>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <div class="logo">
            <span><img src="{{ asset('img/LOGO1.png') }}" alt="Mi Hogar"><small style="color:#aaa; font-size:0.75rem;"></small></span>
        </div>
        <ul>
            <li><a href="{{ route('admin.proyectos.index') }}" class="{{ request()->is('admin') ? 'active' : '' }}">🏠 Inicio</a></li>
            <li><a href="{{ route('admin.proyectos.index') }}" class="{{ request()->is('admin/proyectos*') ? 'active' : '' }}">🏗️ Proyectos</a></li>
            <li><a href="{{ route('admin.asesores.index') }}" class="{{ request()->is('admin/asesores*') ? 'active' : '' }}">👥 Asesores</a></li>
            <li><a href="{{ url('/') }}">🌐 Ver sitio web</a></li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" style="background:none; border:none; width:100%; text-align:left; padding:12px 25px; color:#fff; cursor:pointer; font-size:0.9rem; border-left:3px solid transparent;">
                        🚪 Cerrar sesión
                    </button>
                </form>
            </li>
        </ul>
    </div>

    <!-- CONTENIDO PRINCIPAL -->
    <div class="main-content">
        <div class="topbar">
            <h1>@yield('titulo', 'Panel de Administración')</h1>
            <span class="user">👤 {{ auth()->user()->nombre }}</span>
        </div>

        @if(session('success'))
        <div style="background:#d4edda; border:1px solid #c3e6cb; color:#155724; padding:12px 20px; margin-bottom:20px; border-radius:4px;">
            ✅ {{ session('success') }}
        </div>
        @endif

        @yield('content')
    </div>

</body>
</html>