<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inmobiliaria Mi Hogar | Terrenos y Casas en Andahuaylas</title>
    <meta name="description" content="Encuentra el hogar de tus sueños en Andahuaylas, Apurímac con Inmobiliaria Mi Hogar.">
    <meta name="google-site-verification" content="vh_cpn_wDt5ohlM4p3vrSAd2WJ451l59Mo6tf_cvRZY" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Arial', sans-serif; background: #000; color: #fff; }

        nav {
            display: flex;
            align-items: center;
            background: var(--color-black);
            padding: 10px 40px;
            border-bottom: 2px solid var(--color-gold);
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
            color: var(--color-gold);
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        nav ul a:hover { color: var(--color-white); }

        .menu-item-proyectos { position: relative; }

        .dropdown-proyectos {
            display: none;
            position: absolute;
            top: 100%;
            right: -450px;
            left: auto;
            background: #fff;
            box-shadow: 0 8px 30px rgba(0,0,0,0.2);
            border-top: 3px solid var(--color-gold);
            width: 700px;
            z-index: 9999;
            border-radius: 0 0 10px 10px;
        }

        /* FOOTER LINKS */
        footer h4 { color: var(--color-gold); }
        footer .footer-link { color: var(--color-gray); text-decoration: none; font-size: 0.85rem; }
        footer .footer-link:hover { color: var(--color-gold); }
        footer .copyright-link { color: var(--color-gold); text-decoration: none; }
    </style>
</head>

<!-- ===== CHAT FLOTANTE ===== -->
<div id="chat-flotante" style="position:fixed; bottom:20px; right:20px; z-index:9999;">

    <!-- BOTÓN -->
    <button onclick="toggleChat()"
        style="background:#c9a84c; color:#000; border:none; padding:14px 20px;
               border-radius:50px; font-weight:900; font-size:0.9rem; cursor:pointer;
               box-shadow:0 4px 15px rgba(0,0,0,0.3); display:flex; align-items:center; gap:8px;
               transition:all 0.3s;"
        onmouseover="this.style.background='#b8962a'"
        onmouseout="this.style.background='#c9a84c'">
        💬 <span id="btn-texto">Déjanos un mensaje</span>
    </button>

    <!-- FORMULARIO DESPLEGABLE -->
    <div id="chat-form"
        style="display:none; position:absolute; bottom:60px; right:0;
               width:320px; background:#fff; border-radius:12px;
               box-shadow:0 8px 30px rgba(0,0,0,0.2); overflow:hidden;
               border:2px solid #c9a84c;">

        <!-- HEADER -->
        <div style="background:#c9a84c; padding:15px 20px; display:flex; justify-content:space-between; align-items:center;">
            <div>
                <h4 style="color:#000; margin:0; font-size:1rem; font-weight:900;">💬 Déjanos un mensaje</h4>
                <p style="color:#000; margin:0; font-size:0.75rem; opacity:0.7;">Te responderemos pronto</p>
            </div>
            <button onclick="toggleChat()"
                style="background:none; border:none; font-size:1.2rem; cursor:pointer; color:#000;">✕</button>
        </div>

        <!-- IMAGEN -->
        <div style="height:100px; overflow:hidden;">
            <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?w=400&q=80"
                 alt="Contacto" style="width:100%; height:100%; object-fit:cover;">
        </div>

        <!-- CUERPO -->
        <div style="padding:20px;">
            <p style="color:#555; font-size:0.82rem; margin-bottom:15px; line-height:1.5;">
                Gracias por contactarte con nosotros. Para agendar tu visita, por favor ingresa la siguiente información:
            </p>

            <div style="display:flex; flex-direction:column; gap:10px;">
                <input id="chat-nombre" type="text" placeholder="Nombre y Apellidos *"
                    style="width:100%; padding:10px 14px; border:1px solid #ddd; border-radius:8px;
                           font-size:0.85rem; outline:none; box-sizing:border-box;"
                    onfocus="this.style.borderColor='#c9a84c'"
                    onblur="this.style.borderColor='#ddd'">

                <input id="chat-correo" type="email" placeholder="Correo electrónico *"
                    style="width:100%; padding:10px 14px; border:1px solid #ddd; border-radius:8px;
                           font-size:0.85rem; outline:none; box-sizing:border-box;"
                    onfocus="this.style.borderColor='#c9a84c'"
                    onblur="this.style.borderColor='#ddd'">

                <select id="chat-proyecto"
                    style="width:100%; padding:10px 14px; border:1px solid #ddd; border-radius:8px;
                           font-size:0.85rem; outline:none; box-sizing:border-box; background:#fff; color:#555;"
                    onfocus="this.style.borderColor='#c9a84c'"
                    onblur="this.style.borderColor='#ddd'">
                    <option value="">Proyecto de interés</option>
                    @php $proyectosChat = App\Models\Proyecto::all(); @endphp
                    @foreach($proyectosChat as $p)
                        <option value="{{ $p->nombre_proyecto }}">{{ $p->nombre_proyecto }}</option>
                    @endforeach
                </select>

                <input id="chat-asunto" type="text" placeholder="Asunto"
                    style="width:100%; padding:10px 14px; border:1px solid #ddd; border-radius:8px;
                           font-size:0.85rem; outline:none; box-sizing:border-box;"
                    onfocus="this.style.borderColor='#c9a84c'"
                    onblur="this.style.borderColor='#ddd'">

                <textarea id="chat-mensaje" placeholder="Mensaje" rows="3"
                    style="width:100%; padding:10px 14px; border:1px solid #ddd; border-radius:8px;
                           font-size:0.85rem; outline:none; box-sizing:border-box; resize:none;"
                    onfocus="this.style.borderColor='#c9a84c'"
                    onblur="this.style.borderColor='#ddd'"></textarea>

                <p id="chat-error" style="color:red; font-size:0.78rem; display:none;"></p>
                <p id="chat-exito" style="color:green; font-size:0.78rem; display:none;"></p>

                <button onclick="enviarChat()"
                    style="background:#c9a84c; color:#000; border:none; padding:12px;
                           border-radius:8px; font-weight:900; font-size:0.9rem; cursor:pointer;
                           text-transform:uppercase; letter-spacing:1px; width:100%;
                           transition:background 0.3s;"
                    onmouseover="this.style.background='#b8962a'"
                    onmouseout="this.style.background='#c9a84c'">
                    Enviar
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleChat() {
        const form = document.getElementById('chat-form');
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    }

    function enviarChat() {
        const nombre  = document.getElementById('chat-nombre').value.trim();
        const correo  = document.getElementById('chat-correo').value.trim();
        const proyecto = document.getElementById('chat-proyecto').value;
        const asunto  = document.getElementById('chat-asunto').value.trim();
        const mensaje = document.getElementById('chat-mensaje').value.trim();
        const error   = document.getElementById('chat-error');
        const exito   = document.getElementById('chat-exito');

        if (!nombre || !correo) {
            error.textContent = 'Por favor completa nombre y correo.';
            error.style.display = 'block';
            return;
        }

        error.style.display = 'none';

        fetch('{{ route('contacto.enviar') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                nombre: nombre,
                apellidos: '',
                dni: '',
                telefono: '',
                correo: correo,
                proyecto: proyecto || asunto || 'Consulta general',
                mensaje: mensaje
            })
        })
        .then(r => r.json())
        .then(data => {
            if (data.success) {
                exito.textContent = '✅ Mensaje enviado. Te contactaremos pronto.';
                exito.style.display = 'block';
                error.style.display = 'none';
                setTimeout(() => {
                    toggleChat();
                    exito.style.display = 'none';
                    document.getElementById('chat-nombre').value = '';
                    document.getElementById('chat-correo').value = '';
                    document.getElementById('chat-proyecto').value = '';
                    document.getElementById('chat-asunto').value = '';
                    document.getElementById('chat-mensaje').value = '';
                }, 2500);
            } else {
                error.textContent = data.message || 'Error al enviar.';
                error.style.display = 'block';
            }
        })
        .catch(() => {
            error.textContent = 'Error de conexión.';
            error.style.display = 'block';
        });
    }
</script>

<body>

    <!-- NAVBAR -->
    <nav>
        <div class="logo">
            <img src="{{ asset('img/LOGO1.png') }}" alt="Mi Hogar" style="height:55px;">
        </div>

        <div style="display:flex; align-items:center; gap:35px; margin-left:auto;">
            <ul>
                <li><a href="#"><i class="fas fa-search"></i></a></li>
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
                                   onmouseover="this.style.background='#f5f0e8'; this.style.borderLeftColor='var(--color-gold)';"
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
                                       style="background:#000; color:var(--color-gold); padding:6px 14px; text-decoration:none; font-size:0.8rem; font-weight:bold; border-radius:20px; white-space:nowrap;">
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
                                                <img src="{{ $p->fotos }}" style="width:100%; height:100%; object-fit:cover;">
                                                @else
                                                <div style="width:100%; height:100%; background:#e8e0cc; display:flex; align-items:center; justify-content:center;">
                                                    <span style="font-size:2rem;">🏠</span>
                                                </div>
                                                @endif
                                                <div class="proyecto-badge" style="position:absolute; top:6px; left:6px;">
                                                    {{ strtoupper($p->distrito) }}
                                                </div>
                                            </div>
                                            <div style="padding:10px; background:#fff;">
                                                <p style="color:#333; font-size:0.82rem; font-weight:bold; margin-bottom:4px; text-transform:uppercase;">{{ $p->nombre_proyecto }}</p>
                                                @if($p->precio)
                                                <p class="proyecto-precio" style="font-size:0.82rem;">S/. {{ number_format($p->precio, 0, '.', ',') }}</p>
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
                <li><a href="{{ route('nosotros') }}">Nosotros</a></li>
            </ul>

            <!-- LOGIN -->
            <a href="{{ route('login') }}" class="btn-login">LOGIN</a>
        </div>
    </nav>

    <!-- CONTENIDO -->
    <main>
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer style="background:var(--color-dark-2); color:var(--color-white); padding:50px 40px 0;">
        <div style="max-width:1100px; margin:0 auto; display:flex; flex-wrap:wrap; gap:40px; justify-content:space-between; padding-bottom:40px; border-bottom:1px solid #333;">

            <div style="min-width:200px;">
                <img src="{{ asset('img/LOGO1.png') }}" alt="Mi Hogar" style="height:50px; margin-bottom:15px;">
                <p style="font-size:0.85rem; color:var(--color-gray); line-height:1.8;">
                    Razón Social: Inmobiliaria Mi Hogar S.A.C.<br>
                    RUC: 20XXXXXXXXX
                </p>
                <div style="display:flex; gap:12px; margin-top:15px;">
                    <a href="#" class="footer-social">f</a>
                    <a href="#" class="footer-social">in</a>
                    <a href="#" class="footer-social">yt</a>
                    <a href="#" class="footer-social">tk</a>
                </div>
            </div>

            <div style="min-width:160px;">
                <h4 style="margin-bottom:15px;">Contacto</h4>
                <p style="color:var(--color-gray); font-size:0.85rem; line-height:2;">
                    📞 912 345 678<br>
                    📍 Andahuaylas, Apurímac<br>
                    ✉️ info@mihogar.pe
                </p>
            </div>

            <div style="min-width:160px;">
                <h4 style="margin-bottom:15px;">Legales</h4>
                <ul style="list-style:none; padding:0; margin:0;">
                    <li style="margin-bottom:8px;"><a href="#" class="footer-link">Condiciones de Uso</a></li>
                    <li style="margin-bottom:8px;"><a href="#" class="footer-link">Políticas de Privacidad</a></li>
                    <li style="margin-bottom:8px;"><a href="#" class="footer-link">Financiamiento</a></li>
                    <li style="margin-bottom:8px;"><a href="#" class="footer-link">Libro de Reclamaciones</a></li>
                </ul>
            </div>

            <div style="min-width:160px;">
                <h4 style="margin-bottom:15px;">Mi Hogar</h4>
                <ul style="list-style:none; padding:0; margin:0;">
                    <li style="margin-bottom:8px;"><a href="{{ route('proyectos.index') }}" class="footer-link">Nuestros Proyectos</a></li>
                    <li style="margin-bottom:8px;"><a href="{{ route('asesores.index') }}" class="footer-link">Asesores de Venta</a></li>
                    <li style="margin-bottom:8px;"><a href="{{ route('nosotros') }}" class="footer-link">Nosotros</a></li>
                </ul>
            </div>
        </div>

        <div style="padding:15px 0; text-align:center;">
            <p style="color:#555; font-size:0.82rem; margin:0;">
                Copyright © 2026 Inmobiliaria Mi Hogar &nbsp;|&nbsp; Todos los derechos reservados &nbsp;|&nbsp;
                <a href="#" class="copyright-link">Términos y condiciones</a> &nbsp;|&nbsp;
                <a href="#" class="copyright-link">Políticas de Privacidad</a>
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