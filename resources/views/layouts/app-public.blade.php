<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inmobiliaria Mi Hogar | Terrenos y Casas en Andahuaylas</title>
    <meta name="description"
        content="Encuentra el hogar de tus sueños en Andahuaylas, Apurímac con Inmobiliaria Mi Hogar.">
    <meta name="google-site-verification" content="vh_cpn_wDt5ohlM4p3vrSAd2WJ451l59Mo6tf_cvRZY" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: #000;
            color: #fff;
        }

        /* ===== NAVBAR ===== */
        nav {
            display: flex;
            align-items: center;
            background: var(--color-black);
            padding: 10px 20px;
            border-bottom: 2px solid var(--color-gold);
            position: relative;
            z-index: 1000;
        }

        .nav-logo {
            display: flex;
            align-items: center;
            flex-shrink: 0;
        }

        .nav-toggle {
            display: none;
            background: none;
            border: none;
            color: var(--color-gold);
            font-size: 2rem;
            cursor: pointer;
            padding: 5px 10px;
            margin-left: auto;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 25px;
            margin-left: auto;
        }

        nav ul {
            display: flex;
            align-items: center;
            gap: 25px;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        nav ul a {
            color: var(--color-gold);
            text-decoration: none;
            font-weight: bold;
            font-size: 13px;
            letter-spacing: 1px;
            text-transform: uppercase;
            white-space: nowrap;
        }

        nav ul a:hover {
            color: var(--color-white);
        }

        /* ===== DROPDOWN ===== */
        .menu-item-proyectos {
            position: relative;
        }

        .dropdown-proyectos {
            display: none;
            position: fixed;
            top: auto;
            left: 50%;
            transform: translateX(-50%);
            background: #fff;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.3);
            border-top: 3px solid var(--color-gold);
            width: min(750px, 95vw);
            z-index: 9999;
            border-radius: 0 0 10px 10px;
            max-height: 80vh;
            overflow-y: auto;
        }

        /* ===== FOOTER ===== */
        footer h4 {
            color: var(--color-gold);
        }

        footer .footer-link {
            color: var(--color-gray);
            text-decoration: none;
            font-size: 0.85rem;
        }

        footer .footer-link:hover {
            color: var(--color-gold);
        }

        footer .copyright-link {
            color: var(--color-gold);
            text-decoration: none;
        }

        /* ===== INPUTS ===== */
        input,
        textarea,
        select {
            color: #333 !important;
            background: #fff !important;
        }

        input::placeholder,
        textarea::placeholder {
            color: #999 !important;
        }

        /* ===== MOBILE ===== */
        @media (max-width: 768px) {
            .nav-logo img {
                height: 55px !important;
            }

            .nav-toggle {
                display: block;
            }

            .nav-links {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                flex-direction: column;
                align-items: flex-start;
                gap: 0;
                margin-left: 0;
                background: #111;
                border-top: 1px solid var(--color-gold);
                border-bottom: 2px solid var(--color-gold);
                padding: 10px 0;
                z-index: 999;
            }

            .nav-links.activo {
                display: flex;
            }

            nav ul {
                flex-direction: column;
                align-items: flex-start;
                gap: 0;
                width: 100%;
            }

            nav ul li {
                width: 100%;
            }

            nav ul a {
                display: block;
                padding: 12px 20px;
                border-bottom: 1px solid #1a1a1a;
                font-size: 13px;
            }

            .btn-login {
                margin: 12px 20px;
                display: inline-block;
            }

            .dropdown-proyectos {
                position: static;
                width: 100%;
                transform: none;
                left: auto;
                max-height: 400px;
                border-radius: 0;
            }
        }
    </style>
</head>

<body>

    <!-- ===== CHAT FLOTANTE ===== -->
    <div id="chat-flotante"
        style="position:fixed; bottom:20px; right:20px; z-index:9999; display:flex; flex-direction:column; gap:15px; align-items:flex-end;">

        <!-- WHATSAPP -->
        <a href="https://wa.me/51932400015?text=Hola,%20me%20interesa%20información%20sobre%20sus%20proyectos"
            target="_blank"
            style="background:#25D366; color:#fff; border:none; padding:14px 20px; border-radius:50px; font-weight:900; font-size:0.9rem; cursor:pointer; box-shadow:0 4px 15px rgba(0,0,0,0.3); display:flex; align-items:center; gap:8px; text-decoration:none;"
            onmouseover="this.style.background='#1da851'" onmouseout="this.style.background='#25D366'">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" viewBox="0 0 16 16">
                <path
                    d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
            </svg>
            Contáctanos
        </a>

        <!-- CHAT -->
        <button onclick="toggleChat()"
            style="background:var(--color-gold); color:#000; border:none; padding:14px 20px; border-radius:50px; font-weight:900; font-size:0.9rem; cursor:pointer; box-shadow:0 4px 15px rgba(0,0,0,0.3); display:flex; align-items:center; gap:8px;">
            💬 <span id="btn-texto">Déjanos un mensaje</span>
        </button>

        <!-- FORMULARIO CHAT -->
        <div id="chat-form"
            style="display:none; position:fixed; bottom:80px; right:20px;
                   width:min(320px, calc(100vw - 40px));
                   max-height:calc(100vh - 120px);
                   background:#fff; border-radius:12px;
                   box-shadow:0 8px 30px rgba(0,0,0,0.2); overflow-y:auto;
                   border:2px solid var(--color-gold); z-index:9998;">
            <div
                style="background:var(--color-gold); padding:15px 20px; display:flex; justify-content:space-between; align-items:center; position:sticky; top:0; z-index:1;">
                <div>
                    <h4 style="color:#000; margin:0; font-size:1rem; font-weight:900;">💬 Déjanos un mensaje</h4>
                    <p style="color:#000; margin:0; font-size:0.75rem; opacity:0.7;">Te responderemos pronto</p>
                </div>
                <button onclick="toggleChat()"
                    style="background:none; border:none; font-size:1.2rem; cursor:pointer; color:#000;">✕</button>
            </div>
            <div style="height:90px; overflow:hidden;">
                <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?w=400&q=80" alt="Contacto"
                    style="width:100%; height:100%; object-fit:cover;">
            </div>
            <div style="padding:20px;">
                <p style="color:#555; font-size:0.82rem; margin-bottom:15px; line-height:1.5;">
                    Gracias por contactarte con nosotros. Para agendar tu visita, ingresa la siguiente información:
                </p>
                <div style="display:flex; flex-direction:column; gap:10px;">
                    <input id="chat-nombre" type="text" placeholder="Nombre y Apellidos *"
                        style="width:100%; padding:10px 14px; border:1px solid #ddd; border-radius:8px; font-size:0.85rem;">
                    <input id="chat-correo" type="email" placeholder="Correo electrónico *"
                        style="width:100%; padding:10px 14px; border:1px solid #ddd; border-radius:8px; font-size:0.85rem;">
                    <select id="chat-proyecto"
                        style="width:100%; padding:10px 14px; border:1px solid #ddd; border-radius:8px; font-size:0.85rem;">
                        <option value="">Proyecto de interés</option>
                        @php $proyectosChat = App\Models\Proyecto::all(); @endphp
                        @foreach ($proyectosChat as $p)
                            <option value="{{ $p->nombre_proyecto }}">{{ $p->nombre_proyecto }}</option>
                        @endforeach
                    </select>
                    <input id="chat-asunto" type="text" placeholder="Asunto"
                        style="width:100%; padding:10px 14px; border:1px solid #ddd; border-radius:8px; font-size:0.85rem;">
                    <textarea id="chat-mensaje" placeholder="Mensaje" rows="3"
                        style="width:100%; padding:10px 14px; border:1px solid #ddd; border-radius:8px; font-size:0.85rem; resize:none;"></textarea>
                    <p id="chat-error" style="color:red; font-size:0.78rem; display:none;"></p>
                    <p id="chat-exito" style="color:green; font-size:0.78rem; display:none;"></p>
                    <button onclick="enviarChat()"
                        style="background:var(--color-gold); color:#000; border:none; padding:12px; border-radius:8px; font-weight:900; font-size:0.9rem; cursor:pointer; text-transform:uppercase; letter-spacing:1px; width:100%;">
                        Enviar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- ===== NAVBAR ===== -->
    <nav>
        <div class="nav-logo">
            <img src="{{ asset('img/LOGO1.png') }}" alt="Mi Hogar" style="height:100px;">
        </div>

        <button class="nav-toggle" id="nav-toggle" aria-label="Abrir menú">☰</button>

        <div class="nav-links" id="nav-links">
            <ul>
                <li><a href="#"><i class="fas fa-search"></i></a></li>
                <li><a href="{{ url('/') }}">Inicio</a></li>

                <!-- DROPDOWN PROYECTOS -->
                <li class="menu-item-proyectos">
                    <a href="#" id="btn-proyectos">Nuestros Proyectos ▾</a>
                    <div class="dropdown-proyectos" id="dropdown-proyectos">
                        <div style="display:flex; width:100%;">
                            <!-- DISTRITOS -->
                            <div
                                style="width:200px; border-right:1px solid #eee; padding:15px 0; overflow-y:auto; max-height:400px; flex-shrink:0;">
                                <p
                                    style="color:#888; font-size:0.75rem; font-weight:bold; letter-spacing:2px; text-transform:uppercase; padding:0 20px 10px;">
                                    Selecciona tu distrito
                                </p>
                                @php
                                    $distritos = App\Models\Proyecto::selectRaw(
                                        'LOWER(distrito) as distrito_lower, MIN(distrito) as distrito',
                                    )
                                        ->groupBy('distrito_lower')
                                        ->orderBy('distrito_lower')
                                        ->get();
                                @endphp
                                @foreach ($distritos as $d)
                                    <a href="{{ route('proyectos.index') }}?distrito={{ $d->distrito }}"
                                        style="display:block; padding:10px 20px; color:#333; text-decoration:none; font-size:0.9rem; border-left:3px solid transparent; text-transform:uppercase; font-weight:bold;"
                                        onmouseover="this.style.background='#f5f0e8'; this.style.borderLeftColor='var(--color-gold)';"
                                        onmouseout="this.style.background='transparent'; this.style.borderLeftColor='transparent';">
                                        {{ $d->distrito }}
                                    </a>
                                @endforeach
                            </div>
                            <!-- PROYECTOS -->
                            <div style="flex:1; padding:20px; min-width:0;">
                                <div
                                    style="display:flex; justify-content:space-between; align-items:center; margin-bottom:15px;">
                                    <p
                                        style="color:#888; font-size:0.75rem; font-weight:bold; letter-spacing:2px; text-transform:uppercase;">
                                        Proyectos más buscados
                                    </p>
                                    <a href="{{ route('proyectos.index') }}"
                                        style="background:#000; color:var(--color-gold); padding:6px 14px; text-decoration:none; font-size:0.8rem; font-weight:bold; border-radius:20px; white-space:nowrap;">
                                        Ver todos →
                                    </a>
                                </div>
                                <div style="display:flex; gap:15px; flex-wrap:wrap;">
                                    @php $proyectosNav = App\Models\Proyecto::take(4)->get(); @endphp
                                    @foreach ($proyectosNav as $p)
                                        <a href="{{ route('proyectos.show', $p->id_proyecto) }}"
                                            style="text-decoration:none; width:150px; flex-shrink:0;">
                                            <div
                                                style="border-radius:8px; overflow:hidden; box-shadow:0 2px 10px rgba(0,0,0,0.1);">
                                                <div style="height:110px; overflow:hidden; position:relative;">
                                                    @if ($p->fotos)
                                                        <img src="{{ $p->fotos }}"
                                                            style="width:100%; height:100%; object-fit:cover;">
                                                    @else
                                                        <div
                                                            style="width:100%; height:100%; background:#e8e0cc; display:flex; align-items:center; justify-content:center;">
                                                            <span style="font-size:2rem;">🏠</span>
                                                        </div>
                                                    @endif
                                                    <div class="proyecto-badge"
                                                        style="position:absolute; top:6px; left:6px;">
                                                        {{ strtoupper($p->distrito) }}
                                                    </div>
                                                </div>
                                                <div style="padding:8px; background:#fff;">
                                                    <p
                                                        style="color:#333; font-size:0.78rem; font-weight:bold; margin-bottom:4px; text-transform:uppercase; line-height:1.3;">
                                                        {{ $p->nombre_proyecto }}</p>
                                                    @if ($p->precio)
                                                        <p class="proyecto-precio" style="font-size:0.78rem;">S/.
                                                            {{ number_format($p->precio, 0, '.', ',') }}</p>
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

            <a href="{{ route('login') }}" class="btn-login">LOGIN</a>
        </div>
    </nav>

    <!-- CONTENIDO -->
    <main>
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer style="background:var(--color-dark-2); color:var(--color-white); padding:50px 40px 0;">
        <div
            style="max-width:1100px; margin:0 auto; display:flex; flex-wrap:wrap; gap:40px; justify-content:space-between; padding-bottom:40px; border-bottom:1px solid #333;">
            <div style="min-width:200px;">
                <img src="{{ asset('img/LOGO1.png') }}" alt="Mi Hogar" style="height:85px; margin-bottom:15px;">
                <p style="font-size:0.85rem; color:var(--color-gray); line-height:1.8;">
                    Razón Social: Inmobiliaria Mi Hogar S.A.C.<br>RUC: 20XXXXXXXXX
                </p>
                <div style="display:flex; gap:10px; margin-top:15px; flex-wrap:wrap;">
                    <!-- FACEBOOK -->
                    <a href="#" target="_blank"
                        style="display:flex; align-items:center; gap:6px; background:#1877F2; color:#fff; padding:8px 14px; border-radius:6px; text-decoration:none; font-weight:bold; font-size:0.82rem; white-space:nowrap;"
                        onmouseover="this.style.opacity='0.85'" onmouseout="this.style.opacity='1'">
                        <svg width="16" height="16" fill="white" viewBox="0 0 24 24">
                            <path
                                d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                        </svg>
                        Facebook
                    </a>

                    <!-- INSTAGRAM -->
                    <a href="#" target="_blank"
                        style="display:flex; align-items:center; gap:6px; background:linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888); color:#fff; padding:8px 14px; border-radius:6px; text-decoration:none; font-weight:bold; font-size:0.82rem; white-space:nowrap;"
                        onmouseover="this.style.opacity='0.85'" onmouseout="this.style.opacity='1'">
                        <svg width="16" height="16" fill="white" viewBox="0 0 24 24">
                            <path
                                d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z" />
                        </svg>
                        Instagram
                    </a>

                    <!-- YOUTUBE -->
                    <a href="#" target="_blank"
                        style="display:flex; align-items:center; gap:6px; background:#FF0000; color:#fff; padding:8px 14px; border-radius:6px; text-decoration:none; font-weight:bold; font-size:0.82rem; white-space:nowrap;"
                        onmouseover="this.style.opacity='0.85'" onmouseout="this.style.opacity='1'">
                        <svg width="16" height="16" fill="white" viewBox="0 0 24 24">
                            <path
                                d="M23.495 6.205a3.007 3.007 0 00-2.088-2.088c-1.87-.501-9.396-.501-9.396-.501s-7.507-.01-9.396.501A3.007 3.007 0 00.527 6.205a31.247 31.247 0 00-.522 5.805 31.247 31.247 0 00.522 5.783 3.007 3.007 0 002.088 2.088c1.868.502 9.396.502 9.396.502s7.506 0 9.396-.502a3.007 3.007 0 002.088-2.088 31.247 31.247 0 00.5-5.783 31.247 31.247 0 00-.5-5.805zM9.609 15.601V8.408l6.264 3.602z" />
                        </svg>
                        YouTube
                    </a>

                    <!-- TIKTOK -->
                    <a href="#" target="_blank"
                        style="display:flex; align-items:center; gap:6px; background:#000; color:#fff; padding:8px 14px; border-radius:6px; text-decoration:none; font-weight:bold; font-size:0.82rem; white-space:nowrap; border:1px solid #333;"
                        onmouseover="this.style.opacity='0.85'" onmouseout="this.style.opacity='1'">
                        <svg width="16" height="16" fill="white" viewBox="0 0 24 24">
                            <path
                                d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z" />
                        </svg>
                        TikTok
                    </a>
                </div>
            </div>
            <div style="min-width:160px;">
                <h4 style="margin-bottom:15px;">Contacto</h4>
                <p style="color:var(--color-gray); font-size:0.85rem; line-height:2;">
                    📞 912 345 678<br>📍 Andahuaylas, Apurímac<br>✉️ info@mihogar.pe
                </p>
            </div>
            <div style="min-width:160px;">
                <h4 style="margin-bottom:15px;">Legales</h4>
                <ul style="list-style:none; padding:0; margin:0;">
                    <li style="margin-bottom:8px;"><a href="#" class="footer-link">Condiciones de Uso</a></li>
                    <li style="margin-bottom:8px;"><a href="#" class="footer-link">Políticas de Privacidad</a>
                    </li>
                    <li style="margin-bottom:8px;"><a href="#" class="footer-link">Financiamiento</a></li>
                    <li style="margin-bottom:8px;"><a href="#" class="footer-link">Libro de Reclamaciones</a>
                    </li>
                </ul>
            </div>
            <div style="min-width:160px;">
                <h4 style="margin-bottom:15px;">Mi Hogar</h4>
                <ul style="list-style:none; padding:0; margin:0;">
                    <li style="margin-bottom:8px;"><a href="{{ route('proyectos.index') }}"
                            class="footer-link">Nuestros Proyectos</a></li>
                    <li style="margin-bottom:8px;"><a href="{{ route('asesores.index') }}"
                            class="footer-link">Asesores de Venta</a></li>
                    <li style="margin-bottom:8px;"><a href="{{ route('nosotros') }}"
                            class="footer-link">Nosotros</a></li>
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

    <!-- SCRIPTS -->
    <script>
        // Hamburguesa
        document.getElementById('nav-toggle').addEventListener('click', function() {
            document.getElementById('nav-links').classList.toggle('activo');
            this.textContent = document.getElementById('nav-links').classList.contains('activo') ? '✕' : '☰';
        });

        // Dropdown proyectos
        const btnProyectos = document.getElementById('btn-proyectos');
        const dropdown = document.getElementById('dropdown-proyectos');

        btnProyectos.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            if (dropdown.style.display === 'flex') {
                dropdown.style.display = 'none';
            } else {
                // Posicionar dropdown debajo del navbar
                const nav = document.querySelector('nav');
                const navBottom = nav.getBoundingClientRect().bottom;
                dropdown.style.top = navBottom + 'px';
                dropdown.style.display = 'flex';
            }
        });

        document.addEventListener('click', function(e) {
            if (!btnProyectos.contains(e.target) && !dropdown.contains(e.target)) {
                dropdown.style.display = 'none';
            }
        });

        // Chat
        function toggleChat() {
            const form = document.getElementById('chat-form');
            form.style.display = form.style.display === 'none' ? 'block' : 'none';
        }

        function enviarChat() {
            const nombre = document.getElementById('chat-nombre').value.trim();
            const correo = document.getElementById('chat-correo').value.trim();
            const proyecto = document.getElementById('chat-proyecto').value;
            const asunto = document.getElementById('chat-asunto').value.trim();
            const mensaje = document.getElementById('chat-mensaje').value.trim();
            const error = document.getElementById('chat-error');
            const exito = document.getElementById('chat-exito');

            if (!nombre || !correo) {
                error.textContent = 'Por favor completa nombre y correo.';
                error.style.display = 'block';
                return;
            }
            error.style.display = 'none';

            fetch('{{ route('contacto.chat') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        nombre,
                        correo,
                        proyecto,
                        asunto,
                        mensaje
                    })
                })
                .then(r => r.json())
                .then(data => {
                    if (data.success) {
                        exito.textContent = '✅ Mensaje enviado. Te contactaremos pronto.';
                        exito.style.display = 'block';
                        setTimeout(() => {
                            toggleChat();
                            exito.style.display = 'none';
                            ['chat-nombre', 'chat-correo', 'chat-proyecto', 'chat-asunto', 'chat-mensaje']
                            .forEach(id => document.getElementById(id).value = '');
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

</body>

</html>
