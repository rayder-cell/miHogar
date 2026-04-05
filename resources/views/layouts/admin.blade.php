<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin - Mi Hogar</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * { margin:0; padding:0; box-sizing:border-box; }
        body { font-family: Arial, sans-serif; background:#f0f2f5; display:flex; min-height:100vh; }

        /* SIDEBAR */
        .sidebar {
            width: 250px;
            background: #000;
            min-height: 100vh;
            padding: 0;
            position: fixed;
            display: flex;
            flex-direction: column;
            border-right: 2px solid #c9a84c;
        }
        .sidebar .logo {
            text-align: center;
            padding: 20px;
            background: #0a0a0a;
            border-bottom: 1px solid #c9a84c;
        }
        .sidebar .logo img { height: 60px; }
        .sidebar .logo-text {
            color: #c9a84c;
            font-size: 1rem;
            font-weight: bold;
            margin-top: 8px;
        }
        .sidebar .logo-sub {
            color: #888;
            font-size: 0.7rem;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        /* MENÚ GRUPOS */
        .menu-group { padding: 15px 0 5px; }
        .menu-label {
            color: #666;
            font-size: 0.7rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            padding: 0 20px;
            margin-bottom: 5px;
        }
        .sidebar ul { list-style: none; }
        .sidebar ul li a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 11px 20px;
            color: #ccc;
            text-decoration: none;
            font-size: 0.88rem;
            border-left: 3px solid transparent;
            transition: all 0.2s;
        }
        .sidebar ul li a:hover,
        .sidebar ul li a.active {
            background: #111;
            border-left: 3px solid #c9a84c;
            color: #c9a84c;
        }
        .sidebar ul li a .badge {
            margin-left: auto;
            background: #c9a84c;
            color: #000;
            font-size: 0.7rem;
            font-weight: bold;
            padding: 2px 7px;
            border-radius: 10px;
        }

        /* FOOTER SIDEBAR */
        .sidebar-footer {
            margin-top: auto;
            padding: 15px 20px;
            background: #0a0a0a;
            display: flex;
            align-items: center;
            gap: 12px;
            border-top: 1px solid #c9a84c;
        }
        .sidebar-footer .avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #c9a84c;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: #000;
            font-size: 1rem;
        }
        .sidebar-footer .user-info { flex: 1; }
        .sidebar-footer .user-name { color: #fff; font-size: 0.85rem; font-weight: bold; }
        .sidebar-footer .user-role { color: #888; font-size: 0.72rem; }
        .sidebar-footer .logout-btn {
            color: #888;
            font-size: 1.1rem;
            cursor: pointer;
            background: none;
            border: none;
            padding: 0;
        }
        .sidebar-footer .logout-btn:hover { color: #c9a84c; }

        /* CONTENIDO */
        .main-content {
            margin-left: 250px;
            flex: 1;
            padding: 25px;
        }

        /* TOPBAR */
        .topbar {
            background: #fff;
            padding: 15px 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            border-radius: 4px;
            border-bottom: 2px solid #c9a84c;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        }
        .topbar h1 { font-size: 1.3rem; color: #333; font-weight: 700; }
        .topbar small { color: #999; font-size: 0.8rem; display: block; }
        .topbar .date { color: #666; font-size: 0.85rem; }

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
            border-radius: 4px;
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
            border-radius: 4px;
        }
        .btn-secondary {
            background: #666;
            color: #fff;
            padding: 6px 14px;
            font-weight: bold;
            text-decoration: none;
            font-size: 0.85rem;
            border-radius: 4px;
        }

        /* TABLA */
        table { width:100%; border-collapse:collapse; background:#fff; }
        table th {
            background: #000;
            color: #c9a84c;
            padding: 12px 15px;
            text-align: left;
            font-size: 0.78rem;
            text-transform: uppercase;
            letter-spacing: 1px;
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
            border-radius: 4px;
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
            border-radius: 4px;
        }
    </style>
</head>
<body>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <div class="logo">
            <img src="{{ asset('img/LOGO1.png') }}" alt="Mi Hogar">
            <div class="logo-sub">Admin Panel</div>
        </div>

        <!-- PRINCIPAL -->
        <div class="menu-group">
            <div class="menu-label">Principal</div>
            <ul>
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="{{ request()->is('admin') ? 'active' : '' }}">
                        <span>📊</span> Dashboard
                    </a>
                </li>
            </ul>
        </div>

        <!-- CONTENIDO -->
        <div class="menu-group">
            <div class="menu-label">Contenido</div>
            <ul>
                <li>
                    <a href="{{ route('admin.proyectos.index') }}" class="{{ request()->is('admin/proyectos*') ? 'active' : '' }}">
                        <span>🏗️</span> Proyectos
                        <span class="badge">{{ \App\Models\Proyecto::count() }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.asesores.index') }}" class="{{ request()->is('admin/asesores*') ? 'active' : '' }}">
                        <span>👥</span> Asesores
                    </a>
                </li>
            </ul>
        </div>

        <!-- SISTEMA -->
        <div class="menu-group">
            <div class="menu-label">Sistema</div>
            <ul>
                <li>
                    <a href="{{ url('/') }}">
                        <span>🌐</span> Ver sitio web
                    </a>
                </li>
            </ul>
        </div>

        <!-- FOOTER -->
        <div class="sidebar-footer">
            <div class="avatar">{{ strtoupper(substr(auth()->user()->nombre, 0, 1)) }}</div>
            <div class="user-info">
                <div class="user-name">{{ auth()->user()->nombre }}</div>
                <div class="user-role">Administrador</div>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-btn" title="Cerrar sesión">🚪</button>
            </form>
        </div>
    </div>

    <!-- CONTENIDO PRINCIPAL -->
    <div class="main-content">
        <div class="topbar">
            <div>
                <h1>@yield('titulo', 'Dashboard')</h1>
                <small>Panel de administración</small>
            </div>
            <span class="date">{{ now()->format('d M Y') }}</span>
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