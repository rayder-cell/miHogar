<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inmobiliaria Mi Hogar</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Arial', sans-serif; background: #000; color: #fff; }

        nav {
            display: flex;
            align-items: center;
            background: #000;
            padding: 10px 40px;
            border-bottom: 2px solid #c9a84c;
            position: relative;
            z-index: 1000;
        }
        nav ul {
            display: flex;
            align-items: center;
            gap: 35px;
            list-style: none;
            margin: 0;
            padding: 0;
        }
        nav ul a {
            color: #c9a84c;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        nav ul a:hover { color: #fff; }

        .menu-item-proyectos { position: relative; }

        .dropdown-proyectos {
            display: none;
            position: absolute;
            top: 100%;
            right: -450px;
            left: auto;
            background: #fff;
            box-shadow: 0 8px 30px rgba(0,0,0,0.2);
            border-top: 3px solid #c9a84c;
            width: 700px;
            z-index: 9999;
            border-radius: 0 0 10px 10px;
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav>
        <!-- LOGO -->
        <div class="logo">
            <img src="{{ asset('img/LOGO1.png') }}" alt="Mi Hogar" style="height:55px;">
        </div>

        <!-- MENÚ + LOGIN a la derecha -->
        <div style="display:flex; align-items:center; gap:35px; margin-left:auto;">
            <ul>
                <!-- 🔍 LUPA -->
                <li><a href="#"><i class="fas fa-search"></i></a></li>

                <!-- INICIO -->
                <li><a href="{{ url('/') }}">Inicio</a></li>

                <!-- DROPDOWN PROYECTOS -->
                <li class="menu-item-proyectos">
                    <a href="#" id="btn-proyectos">Nuestros Proyectos ▾</a>

                    <div class="dropdown-proyectos" id="dropdown-proyectos">
                        <div style="display:flex; width:100%;">

                            <!-- DISTRITOS -->
                            <div style="width:200px; border-right:1px solid #eee; padding:15px 0; overflow-y:auto; max-height:420px;">
                                <p style="color:#888; font-size:0.75rem; font-weight:bold; letter-spacing:2px; text-transform:uppercase; padding:0 20px 10px;">
                                    Selecciona tu distrito
                                </p>
                                @php
                                    $distritos = App\Models\Proyecto::select('distrito')->distinct()->orderBy('distrito')->get();
                                @endphp
                                @foreach($distritos as $d)
                                <a href="{{ route('proyectos.index') }}?distrito={{ $d->distrito }}"
                                   style="display:block; padding:10px 20px; color:#333; text-decoration:none; font-size:0.9rem; border-left:3px solid transparent; text-transform:uppercase; font-weight:bold;"
                                   onmouseover="this.style.background='#f5f0e8'; this.style.borderLeftColor='#c9a84c';"
                                   onmouseout="this.style.background='transparent'; this.style.borderLeftColor='transparent';">
                                    {{ $d->distrito }}
                                </a>
                                @endforeach
                            </div>

                            <!-- PROYECTOS DESTACADOS -->
                            <div style="flex:1; padding:20px;">
                                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:15px;">
                                    <p style="color:#888; font-size:0.75rem; font-weight:bold; letter-spacing:2px; text-transform:uppercase;">
                                        Proyectos más buscados
                                    </p>
                                    <a href="{{ route('proyectos.index') }}"
                                       style="background:#000; color:#c9a84c; padding:6px 14px; text-decoration:none; font-size:0.8rem; font-weight:bold; border-radius:20px; white-space:nowrap;">
                                        Ver todos →
                                    </a>
                                </div>
                                <div style="display:flex; gap:15px; flex-wrap:wrap;">
                                    @php $proyectosNav = App\Models\Proyecto::take(4)->get(); @endphp
                                    @foreach($proyectosNav as $p)
                                    <a href="{{ route('proyectos.show', $p->id_proyecto) }}" style="text-decoration:none; width:190px;">
                                        <div style="border-radius:8px; overflow:hidden; box-shadow:0 2px 10px rgba(0,0,0,0.1); transition:transform 0.2s;"
                                             onmouseover="this.style.transform='translateY(-4px)'"
                                             onmouseout="this.style.transform='translateY(0)'">
                                            <div style="height:130px; overflow:hidden; position:relative;">
                                                @if($p->fotos)
                                                <img src="{{ asset($p->fotos) }}" style="width:100%; height:100%; object-fit:cover;">
                                                @else
                                                <div style="width:100%; height:100%; background:#e8e0cc; display:flex; align-items:center; justify-content:center;">
                                                    <span style="font-size:2rem;">🏠</span>
                                                </div>
                                                @endif
                                                <div style="position:absolute; top:6px; left:6px; background:#c9a84c; color:#000; padding:2px 8px; font-size:0.7rem; font-weight:bold; border-radius:3px;">
                                                    {{ strtoupper($p->distrito) }}
                                                </div>
                                            </div>
                                            <div style="padding:10px; background:#fff;">
                                                <p style="color:#333; font-size:0.82rem; font-weight:bold; margin-bottom:4px; text-transform:uppercase;">{{ $p->nombre_proyecto }}</p>
                                                @if($p->precio)
                                                <p style="color:#c9a84c; font-size:0.82rem; font-weight:bold;">S/. {{ number_format($p->precio, 0, '.', ',') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </a>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                </li>

                <li><a href="{{ route('asesores.index') }}">Asesores de Venta</a></li>
                <li><a href="#">Nosotros</a></li>
            </ul>

            <!-- LOGIN -->
            <a href="{{ route('login') }}"
               style="color:#000; background:#c9a84c; padding:8px 18px; border-radius:4px; font-weight:bold; font-size:14px; text-decoration:none; text-transform:uppercase; white-space:nowrap;">
                LOGIN
            </a>
        </div>
    </nav>

    <!-- CONTENIDO -->
    <main>
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer style="background:#111; color:#fff; padding:50px 40px 0;">
        <div style="max-width:1100px; margin:0 auto; display:flex; flex-wrap:wrap; gap:40px; justify-content:space-between; padding-bottom:40px; border-bottom:1px solid #333;">

            <div style="min-width:200px;">
                <img src="{{ asset('img/LOGO1.png') }}" alt="Mi Hogar" style="height:50px; margin-bottom:15px;">
                <p style="font-size:0.85rem; color:#aaa; line-height:1.8;">
                    Razón Social: Inmobiliaria Mi Hogar S.A.C.<br>
                    RUC: 20XXXXXXXXX
                </p>
                <div style="display:flex; gap:12px; margin-top:15px;">
                    <a href="#" style="background:#c9a84c; color:#000; width:36px; height:36px; border-radius:6px; display:flex; align-items:center; justify-content:center; font-weight:bold; text-decoration:none;">f</a>
                    <a href="#" style="background:#c9a84c; color:#000; width:36px; height:36px; border-radius:6px; display:flex; align-items:center; justify-content:center; font-weight:bold; text-decoration:none;">in</a>
                    <a href="#" style="background:#c9a84c; color:#000; width:36px; height:36px; border-radius:6px; display:flex; align-items:center; justify-content:center; font-weight:bold; text-decoration:none;">yt</a>
                    <a href="#" style="background:#c9a84c; color:#000; width:36px; height:36px; border-radius:6px; display:flex; align-items:center; justify-content:center; font-weight:bold; text-decoration:none;">tk</a>
                </div>
            </div>

            <div style="min-width:160px;">
                <h4 style="color:#c9a84c; font-weight:bold; margin-bottom:15px;">Contacto</h4>
                <p style="color:#aaa; font-size:0.85rem; line-height:2;">
                    📞 912 345 678<br>
                    📍 Andahuaylas, Apurímac<br>
                    ✉️ info@mihogar.pe
                </p>
            </div>

            <div style="min-width:160px;">
                <h4 style="color:#c9a84c; font-weight:bold; margin-bottom:15px;">Legales</h4>
                <ul style="list-style:none; padding:0; margin:0;">
                    <li style="margin-bottom:8px;"><a href="#" style="color:#aaa; text-decoration:none; font-size:0.85rem;">Condiciones de Uso</a></li>
                    <li style="margin-bottom:8px;"><a href="#" style="color:#aaa; text-decoration:none; font-size:0.85rem;">Políticas de Privacidad</a></li>
                    <li style="margin-bottom:8px;"><a href="#" style="color:#aaa; text-decoration:none; font-size:0.85rem;">Financiamiento</a></li>
                    <li style="margin-bottom:8px;"><a href="#" style="color:#aaa; text-decoration:none; font-size:0.85rem;">Libro de Reclamaciones</a></li>
                </ul>
            </div>

            <div style="min-width:160px;">
                <h4 style="color:#c9a84c; font-weight:bold; margin-bottom:15px;">Mi Hogar</h4>
                <ul style="list-style:none; padding:0; margin:0;">
                    <li style="margin-bottom:8px;"><a href="{{ route('proyectos.index') }}" style="color:#aaa; text-decoration:none; font-size:0.85rem;">Nuestros Proyectos</a></li>
                    <li style="margin-bottom:8px;"><a href="{{ route('asesores.index') }}" style="color:#aaa; text-decoration:none; font-size:0.85rem;">Asesores de Venta</a></li>
                    <li style="margin-bottom:8px;"><a href="#" style="color:#aaa; text-decoration:none; font-size:0.85rem;">Nosotros</a></li>
                </ul>
            </div>
        </div>

        <div style="padding:15px 0; text-align:center;">
            <p style="color:#555; font-size:0.82rem; margin:0;">
                Copyright © 2026 Inmobiliaria Mi Hogar &nbsp;|&nbsp; Todos los derechos reservados &nbsp;|&nbsp;
                <a href="#" style="color:#c9a84c;">Términos y condiciones</a> &nbsp;|&nbsp;
                <a href="#" style="color:#c9a84c;">Políticas de Privacidad</a>
            </p>
        </div>
    </footer>

    <script>
        const btnProyectos = document.getElementById('btn-proyectos');
        const dropdown = document.getElementById('dropdown-proyectos');

        btnProyectos.addEventListener('click', function(e) {
            e.preventDefault();
            dropdown.style.display = dropdown.style.display === 'flex' ? 'none' : 'flex';
        });

        document.addEventListener('click', function(e) {
            if (!btnProyectos.contains(e.target) && !dropdown.contains(e.target)) {
                dropdown.style.display = 'none';
            }
        });
    </script>

</body>
</html>