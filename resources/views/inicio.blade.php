@extends('layouts.app-public')

@section('content')
    <style>
        html,
        body {
            overflow-x: hidden;
            max-width: 100vw;
        }

        /* ===== HERO ===== */
        .hero-section {
            position: relative;
            width: 100%;
            height: 0px;
            padding-bottom: 56%;
            overflow: hidden;
            background: #000;
        }

        .slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            transition: opacity 1s ease;
            background-color: #000;
        }

        .slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center center;
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 0;
        }

        .hero-titulo {
            font-size: clamp(1.6rem, 4vw, 3rem);
            letter-spacing: clamp(2px, 1vw, 6px);
            color: var(--color-white);
            font-weight: 900;
            text-transform: uppercase;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.9);
            margin-bottom: 15px;
        }

        .hero-subtitulo {
            font-size: clamp(0.85rem, 2vw, 1rem);
            color: var(--color-gray-light);
            margin-bottom: 25px;
            max-width: min(500px, 90%);
        }

        .hero-info-slide {
            position: absolute;
            bottom: 60px;
            left: 20px;
            max-width: min(280px, calc(100vw - 40px));
            z-index: 10;
        }

        .btn-flecha {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(0, 0, 0, 0.5);
            border: 2px solid var(--color-gold);
            color: var(--color-gold);
            width: 44px;
            height: 44px;
            border-radius: 50%;
            font-size: 1.8rem;
            cursor: pointer;
            z-index: 10;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
        }

        .btn-flecha:hover {
            background: var(--color-gold);
            color: #000;
        }

        .btn-flecha-izq {
            left: 15px;
        }

        .btn-flecha-der {
            right: 15px;
        }

        .slider-puntos {
            position: absolute;
            bottom: 15px;
            width: 100%;
            display: flex;
            justify-content: center;
            gap: 8px;
            z-index: 10;
        }

        .slider-punto {
            display: inline-block;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            cursor: pointer;
            border: 2px solid var(--color-gold);
            transition: background 0.3s;
        }

        /* ===== MÓVIL ===== */
        @media (max-width: 768px) {

            /* Hero más alto para que se vea el texto */
            .hero-section {
                height: 0 !important;
                padding-bottom: 75% !important;
            }

            .slide img {
                object-fit: cover;
                object-position: center top;
            }

            /* Ocultar info de proyecto en móvil */
            .hero-info-slide {
                display: none !important;
            }

            /* Texto hero más legible */
            .hero-titulo {
                font-size: clamp(1rem, 5vw, 1.6rem);
                letter-spacing: 2px;
                margin-bottom: 8px;
            }

            .hero-subtitulo {
                font-size: clamp(0.7rem, 3.5vw, 0.9rem);
                margin-bottom: 15px;
                display: block !important;
                text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.8);
            }

            /* "Bienvenido a" con fondo para legibilidad */
            .bienvenido-txt {
                color: #000 !important;
                background: rgba(255, 255, 255, 0.75);
                padding: 2px 10px;
                border-radius: 4px;
                text-shadow: none !important;
            }

            .btn-flecha {
                width: 28px;
                height: 28px;
                font-size: 1rem;
            }

            .btn-flecha-izq {
                left: 6px;
            }

            .btn-flecha-der {
                right: 6px;
            }
        }

        @media (max-width: 480px) {
            .hero-section {
                padding-bottom: 82% !important;
            }
        }

        /* ===== CONTACTO ===== */
        .contacto-wrapper {
            max-width: 1100px;
            margin: 0 auto;
            display: flex;
            align-items: flex-start;
            gap: 40px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .contacto-texto {
            flex: 1;
            min-width: 260px;
            max-width: 420px;
        }

        .contacto-form {
            border-radius: 12px;
            padding: 30px;
            width: min(400px, 100%);
            flex-shrink: 0;
            box-sizing: border-box;
        }

        @media (max-width: 600px) {
            .contacto-form {
                padding: 22px 18px;
            }

            .redes-sociales {
                gap: 8px !important;
            }

            .redes-sociales a {
                padding: 7px 10px !important;
                font-size: 0.78rem !important;
            }
        }

        .nombre-row {
            display: flex;
            gap: 10px;
        }

        @media (max-width: 480px) {
            .nombre-row {
                flex-direction: column;
            }

            .nombre-row input {
                width: 100% !important;
            }
        }

        /* ===== TESTIMONIOS ===== */
        .t-card {
            flex-shrink: 0;
            box-sizing: border-box;
            padding: 0 10px;
        }

        .t-card-inner {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            height: 100%;
        }

        .t-foto {
            background: #ddd;
            width: 100%;
            height: 90%;
            display: block;
        }

        .t-foto img {
            width: 100%;
            height: 100%;
            display: block;
        }

        /* ===== MODAL ===== */
        .modal-inner {
            background: var(--color-dark-3);
            border-radius: 16px;
            padding: 30px 25px;
            width: min(380px, calc(100vw - 30px));
            text-align: center;
            margin: 15px;
        }

        .codigo-inputs {
            display: flex;
            gap: 10px;
            justify-content: center;
            margin-bottom: 20px;
        }

        .codigo-input {
            width: clamp(44px, 13vw, 60px) !important;
            height: clamp(44px, 13vw, 60px) !important;
            font-size: clamp(1.1rem, 4vw, 1.5rem) !important;
        }

        /* ===== FOOTER MOBILE ===== */
        @media (max-width: 768px) {
            footer>div:first-child {
                flex-direction: column !important;
                gap: 25px !important;
            }

            footer {
                padding: 30px 20px 0 !important;
            }
        }

        /* ===== CHAT FLOTANTE ===== */
        @media (max-width: 480px) {
            #chat-flotante {
                bottom: 15px !important;
                right: 15px !important;
            }

            #btn-texto {
                display: none;
            }
        }

        #acepto:checked {
            background: #000 !important;
            border-color: #000 !important;
        }

        #acepto:checked::after {
            content: '✓';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: var(--color-gold);
            font-size: 13px;
            font-weight: 900;
            line-height: 1;
        }
    </style>

    <!-- ===== HERO ===== -->
    <section class="hero-section">

        @foreach ($proyectos as $index => $proyecto)
            <div class="slide" style="opacity: {{ $index === 0 ? '1' : '0' }};">
                <div style="position:absolute; inset:0; background:rgba(0,0,0,0.35); z-index:1;"></div>
                @if ($proyecto->foto_slider)
                    <img src="{{ $proyecto->foto_slider }}" alt="{{ $proyecto->nombre_proyecto }}">
                @elseif ($proyecto->fotos)
                    <img src="{{ $proyecto->fotos }}" alt="{{ $proyecto->nombre_proyecto }}">
                @else
                    <div style="width:100%; height:100%; background:#1a1a1a;"></div>
                @endif
            </div>
        @endforeach

        <!-- TEXTO CENTRAL -->
        <div
            style="position:absolute; top:0; left:0; width:100%; height:100%;
            display:flex; flex-direction:column; align-items:center; justify-content:center;
            z-index:5; text-align:center; padding:10px 15px 60px;">
            <p class="text-gold bienvenido-txt"
                style="font-size:clamp(0.7rem, 2vw, 0.9rem); letter-spacing:4px; text-transform:uppercase; margin-bottom:6px;">
                Bienvenido a
            </p>
            <h1 class="hero-titulo">Inmobiliaria Mi Hogar</h1>
            <p class="hero-subtitulo">
                Encuentra el hogar de tus sueños en Andahuaylas, Apurímac
            </p>
            <a href="{{ route('proyectos.index') }}" class="btn-gold"
                style="font-size:clamp(0.65rem, 2vw, 1rem); padding:clamp(6px, 1.5vw, 14px) clamp(12px, 3vw, 28px);">
                Ver Proyectos
            </a>
        </div>

        <!-- FLECHAS -->
        @if ($proyectos->count() > 1)
            <button onclick="cambiarSlide(-1)" class="btn-flecha btn-flecha-izq">&#8249;</button>
            <button onclick="cambiarSlide(1)" class="btn-flecha btn-flecha-der">&#8250;</button>
        @endif

        <!-- PUNTOS -->
        <div class="slider-puntos">
            @foreach ($proyectos as $index => $p)
                <span class="slider-punto" onclick="irASlide({{ $index }})"
                    style="background: {{ $index === 0 ? 'var(--color-gold)' : 'rgba(255,255,255,0.5)' }};"></span>
            @endforeach
        </div>

        <!-- INFO PROYECTO ESQUINA (solo desktop) -->
        <div class="hero-info-slide">
            @foreach ($proyectos as $index => $proyecto)
                <div class="info-slide" style="display:{{ $index === 0 ? 'block' : 'none' }};">
                    <div class="border-left-gold" style="background:rgba(0,0,0,0.8); padding:10px 14px;">
                        <h2
                            style="color:var(--color-white); font-size:clamp(0.78rem, 2vw, 0.95rem); margin-bottom:4px; line-height:1.3;">
                            {{ $proyecto->nombre_proyecto }}
                        </h2>
                        <p style="color:var(--color-gray-light); font-size:0.75rem; margin-bottom:3px;">
                            <i class="fas fa-map-marker-alt" style="color:var(--color-gold); font-size:0.85rem;"></i>
                            {{ $proyecto->distrito }} - {{ $proyecto->direccion }}
                        </p>
                        @if ($proyecto->precio)
                            <p class="text-gold" style="font-weight:bold; font-size:0.82rem; margin-bottom:6px;">
                                💰 S/. {{ number_format($proyecto->precio, 0, '.', ',') }}
                            </p>
                        @endif
                        <a href="{{ route('proyectos.show', $proyecto->id_proyecto) }}" class="btn-gold"
                            style="padding:5px 12px; font-size:0.75rem; display:inline-block;">
                            Ver más →
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

    </section>

    <!-- ===== FORMULARIO DE CONTACTO ===== -->
    <section style="background:var(--color-dark); padding:60px 20px;">
        <div style="max-width:1100px; margin:0 auto;">

            <!-- FILA SUPERIOR: TEXTO + FORMULARIO -->
            <div
                style="display:flex; gap:80px; align-items:flex-start; flex-wrap:wrap; justify-content:center; margin-bottom:50px;">

                <!-- TEXTO IZQUIERDA -->
                <div style="flex:1; min-width:260px; max-width:420px;">
                    <p class="text-gold"
                        style="font-size:0.9rem; letter-spacing:4px; text-transform:uppercase; margin-bottom:10px;">
                        Contáctanos</p>
                    <h2
                        style="color:var(--color-white); font-size:clamp(1.4rem, 5vw, 2.2rem); font-weight:900; line-height:1.3; margin-bottom:20px;">
                        Dueño de una vida mejor.<br>
                        <span class="text-gold">Descubre lo que</span><br>
                        tenemos para ti.
                    </h2>
                    <p style="color:var(--color-gray); font-size:0.95rem; line-height:2;">
                        <i class="fas fa-map-marker-alt" style="color:var(--color-gold);"></i> Andahuaylas, Apurímac<br>
                        <i class="fas fa-phone" style="color:red;"></i> 932 400 015<br>
                        <i class="fas fa-envelope" style="color:var(--color-gold);"></i> inmobiliariamihogarperu@gmail.com
                    </p>
                    <div class="redes-sociales" style="display:flex; gap:10px; margin-top:20px; flex-wrap:wrap;">
                        <a href="https://www.facebook.com/share/1AkTFM81Dk/" target="_blank"
                            style="display:flex; align-items:center; gap:6px; background:#1877F2; color:#fff; padding:8px 14px; border-radius:6px; text-decoration:none; font-weight:bold; font-size:0.82rem;">
                            <svg width="16" height="16" fill="white" viewBox="0 0 24 24">
                                <path
                                    d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                            </svg>
                            Facebook
                        </a>
                        <a href="https://www.instagram.com/inmobiliaria.mi.hogar?igsh=cW5vajI2M2tocTIx" target="_blank"
                            style="display:flex; align-items:center; gap:6px; background:linear-gradient(45deg,#f09433,#e6683c,#dc2743,#cc2366,#bc1888); color:#fff; padding:8px 14px; border-radius:6px; text-decoration:none; font-weight:bold; font-size:0.82rem;">
                            <svg width="16" height="16" fill="white" viewBox="0 0 24 24">
                                <path
                                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z" />
                            </svg>
                            Instagram
                        </a>
                        <a href="https://www.youtube.com/@InmobiliariaMiHogarPeru" target="_blank"
                            style="display:flex; align-items:center; gap:6px; background:#FF0000; color:#fff; padding:8px 14px; border-radius:6px; text-decoration:none; font-weight:bold; font-size:0.82rem;">
                            <svg width="16" height="16" fill="white" viewBox="0 0 24 24">
                                <path
                                    d="M23.495 6.205a3.007 3.007 0 00-2.088-2.088c-1.87-.501-9.396-.501-9.396-.501s-7.507-.01-9.396.501A3.007 3.007 0 00.527 6.205a31.247 31.247 0 00-.522 5.805 31.247 31.247 0 00.522 5.783 3.007 3.007 0 002.088 2.088c1.868.502 9.396.502 9.396.502s7.506 0 9.396-.502a3.007 3.007 0 002.088-2.088 31.247 31.247 0 00.5-5.783 31.247 31.247 0 00-.5-5.805zM9.609 15.601V8.408l6.264 3.602z" />
                            </svg>
                            YouTube
                        </a>
                        <a href="https://wa.me/51932400015" target="_blank"
                            style="display:flex; align-items:center; gap:6px; background:#25D366; color:#fff; padding:8px 14px; border-radius:6px; text-decoration:none; font-weight:bold; font-size:0.82rem;">
                            <svg width="16" height="16" fill="white" viewBox="0 0 24 24">
                                <path
                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                            </svg>
                            WhatsApp
                        </a>
                        <a href="https://www.tiktok.com/@inmobiliaria.mihogar" target="_blank"
                            style="display:flex; align-items:center; gap:6px; background:#000; color:#fff; padding:8px 14px; border-radius:6px; text-decoration:none; font-weight:bold; font-size:0.82rem; border:1px solid #333;">
                            <svg width="16" height="16" fill="white" viewBox="0 0 24 24">
                                <path
                                    d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z" />
                            </svg>
                            TikTok
                        </a>
                    </div>
                </div>

                <!-- FORMULARIO DERECHA -->
                <div id="form-paso1" class="bg-gold contacto-form" style="flex-shrink:0; width:min(400px, 100%);">
                    <div style="display:flex; align-items:center; gap:10px; margin-bottom:20px;">
                        <div
                            style="width:28px; height:28px; background:#000; color:var(--color-gold); border-radius:50%; display:flex; align-items:center; justify-content:center; font-weight:bold;">
                            1</div>
                        <div style="flex:1; height:2px; background:#000; opacity:0.3;"></div>
                        <div
                            style="width:28px; height:28px; background:#fff; color:#000; border-radius:50%; display:flex; align-items:center; justify-content:center; font-weight:bold; border:2px solid #000;">
                            2</div>
                    </div>
                    <h3 style="color:#000; font-weight:900; font-size:1.1rem; margin-bottom:20px; text-align:center;">Quiero
                        recibir información</h3>
                    <div style="display:flex; flex-direction:column; gap:12px;">
                        <div class="nombre-row">
                            <input id="nombre" type="text" placeholder="Nombre*"
                                style="width:50%; padding:10px 14px; border:none; border-radius:8px; font-size:0.9rem; outline:none; box-sizing:border-box;">
                            <input id="apellidos" type="text" placeholder="Apellidos*"
                                style="width:50%; padding:10px 14px; border:none; border-radius:8px; font-size:0.9rem; outline:none; box-sizing:border-box;">
                        </div>
                        <input id="dni" type="text" placeholder="DNI*"
                            style="width:100%; padding:10px 14px; border:none; border-radius:8px; font-size:0.9rem; outline:none; box-sizing:border-box;">
                        <input id="telefono" type="tel" placeholder="Teléfono*"
                            style="width:100%; padding:10px 14px; border:none; border-radius:8px; font-size:0.9rem; outline:none; box-sizing:border-box;">
                        <input id="correo" type="email" placeholder="Correo electrónico*"
                            style="width:100%; padding:10px 14px; border:none; border-radius:8px; font-size:0.9rem; outline:none; box-sizing:border-box;">
                        <select id="proyecto"
                            style="width:100%; padding:10px 14px; border:none; border-radius:8px; font-size:0.9rem; outline:none; box-sizing:border-box;">
                            <option value="">Proyecto de interés</option>
                            @foreach ($proyectos as $p)
                                <option value="{{ $p->nombre_proyecto }}">{{ $p->nombre_proyecto }}</option>
                            @endforeach
                        </select>
                        <label
                            style="display:flex; align-items:center; gap:8px; font-size:0.78rem; color:#000; cursor:pointer;">
                            <input type="checkbox" id="acepto"
                                style="cursor:pointer; width:18px; height:18px; flex-shrink:0; appearance:none; -webkit-appearance:none; background:#fff; border:2px solid #000; border-radius:3px; position:relative;">
                            Acepto el tratamiento de mis datos personales.
                        </label>
                        <button onclick="enviarFormulario()"
                            style="background:#000; color:var(--color-gold); padding:14px; border:none; border-radius:8px; font-weight:900; font-size:1rem; cursor:pointer; text-transform:uppercase; letter-spacing:1px; width:100%;">
                            Solicitar información
                        </button>
                        <p id="msg-error" style="font-size:0.8rem; display:none; text-align:center;"></p>
                    </div>
                </div>

            </div>

            <!-- VIDEO GRANDE ABAJO -->
            <div
                style="width:100%; max-width:900px; margin:0 auto; border-radius:12px; overflow:hidden; box-shadow:0 8px 30px rgba(0,0,0,0.4);">
                <div style="position:relative; width:100%; padding-bottom:56.25%; height:0;">
                    <iframe src="https://www.youtube.com/embed/NsiD4-48oc0?rel=0&modestbranding=1"
                        title="Inmobiliaria Mi Hogar" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen style="position:absolute; top:0; left:0; width:100%; height:100%; border:none;">
                    </iframe>
                </div>
            </div>

        </div>
    </section>

    <!-- ===== TESTIMONIOS ===== -->
    <section style="background:#f0f0f0; padding:60px 0 40px;">
        <h2
            style="text-align:center; color:#000; font-size:clamp(1.4rem, 5vw, 2rem); font-weight:900; margin-bottom:40px; padding:0 20px;">
            Nuestros clientes nos respaldan
        </h2>

        <div style="position:relative; overflow:hidden;">
            <div id="slider-testimonios" style="display:flex; will-change:transform;">
                @forelse($testimonios as $t)
                    <div class="t-card">
                        <div class="t-card-inner">
                            <div class="t-foto">
                                @if ($t->foto)
                                    <img src="{{ $t->foto }}" alt="{{ $t->nombre }}">
                                @else
                                    <div
                                        style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:4rem;">
                                        👤</div>
                                @endif
                            </div>
                            <div style="padding:18px;">
                                <p
                                    style="color:var(--color-gold); font-weight:900; font-size:0.95rem; margin-bottom:8px; line-height:1.4;">
                                    "{{ $t->titulo }}"
                                </p>
                                <p style="color:#555; font-size:0.83rem; line-height:1.7; margin-bottom:12px;">
                                    {{ $t->comentario }}
                                </p>
                                <p style="color:#000; font-weight:bold; font-size:0.85rem; text-align:right; margin:0;">
                                    {{ $t->nombre }}<br>
                                    <span
                                        style="color:#888; font-weight:normal; font-size:0.78rem;">{{ $t->ubicacion }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                @empty
                    <p style="color:#888; text-align:center; width:100%; padding:40px;">No hay testimonios disponibles.</p>
                @endforelse
            </div>

            <button onclick="moverT(-1)"
                style="position:absolute; top:120px; left:10px; background:rgba(0,0,0,0.6);
                border:none; color:#fff; width:44px; height:44px; border-radius:50%; font-size:1.6rem;
                cursor:pointer; display:flex; align-items:center; justify-content:center; z-index:5;">&#8249;</button>

            <button onclick="moverT(1)"
                style="position:absolute; top:120px; right:10px; background:rgba(0,0,0,0.6);
                border:none; color:#fff; width:44px; height:44px; border-radius:50%; font-size:1.6rem;
                cursor:pointer; display:flex; align-items:center; justify-content:center; z-index:5;">&#8250;</button>
        </div>

        <div id="puntos-t" style="display:flex; justify-content:center; gap:8px; margin-top:20px;"></div>
    </section>

    <script>
        // ===== SLIDER HERO =====
        let actual = 0;
        const slides = document.querySelectorAll('.slide');
        const puntos = document.querySelectorAll('.slider-punto');
        const infos = document.querySelectorAll('.info-slide');

        function mostrarSlide(n) {
            if (!slides.length) return;
            slides.forEach(s => s && (s.style.opacity = '0'));
            puntos.forEach(p => p && (p.style.background = 'rgba(255,255,255,0.5)'));
            infos.forEach(i => i && (i.style.display = 'none'));
            actual = (n + slides.length) % slides.length;
            if (slides[actual]) slides[actual].style.opacity = '1';
            if (puntos[actual]) puntos[actual].style.background = 'var(--color-gold)';
            if (infos[actual]) infos[actual].style.display = 'block';
        }

        function cambiarSlide(dir) {
            mostrarSlide(actual + dir);
        }

        function irASlide(n) {
            mostrarSlide(n);
        }

        if (slides.length > 0) {
            mostrarSlide(0);
            setInterval(() => cambiarSlide(1), 5000);
        }

        // ===== FORMULARIO =====
        function enviarFormulario() {
            const nombre = document.getElementById('nombre').value.trim();
            const apellidos = document.getElementById('apellidos').value.trim();
            const dni = document.getElementById('dni').value.trim();
            const telefono = document.getElementById('telefono').value.trim();
            const correo = document.getElementById('correo').value.trim();
            const proyecto = document.getElementById('proyecto').value;
            const acepto = document.getElementById('acepto').checked;
            const error = document.getElementById('msg-error');

            if (!nombre || !apellidos || !dni || !telefono || !correo || !proyecto) {
                error.textContent = 'Por favor completa todos los campos.';
                error.style.display = 'block';
                return;
            }
            if (!acepto) {
                error.textContent = 'Debes aceptar el tratamiento de datos.';
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
                        nombre,
                        apellidos,
                        dni,
                        telefono,
                        correo,
                        proyecto
                    })
                })
                .then(r => r.json())
                .then(data => {
                    if (data.success) {
                        error.style.color = 'green';
                        error.textContent = '✅ ¡Mensaje enviado! Te contactaremos pronto.';
                        error.style.display = 'block';
                        // Limpiar campos
                        ['nombre', 'apellidos', 'dni', 'telefono', 'correo'].forEach(id =>
                            document.getElementById(id).value = ''
                        );
                        document.getElementById('proyecto').value = '';
                        document.getElementById('acepto').checked = false;
                    } else {
                        error.style.color = 'red';
                        error.textContent = data.message || 'Error al enviar.';
                        error.style.display = 'block';
                    }
                })
                .catch(() => {
                    error.textContent = 'Error de conexión.';
                    error.style.display = 'block';
                });
        }

        function moverFoco(actual, siguienteId) {
            if (actual.value && siguienteId) document.getElementById(siguienteId).focus();
        }

        function verificarCodigo() {
            const msg = document.getElementById('msg-verificacion');
            const exito = document.getElementById('msg-exito');
            const horario = document.getElementById('horario').value;
            if (!horario) {
                msg.textContent = '⚠️ Por favor elige un horario.';
                msg.style.display = 'block';
                return;
            }

            fetch('{{ route('contacto.verificar') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        codigo1: document.getElementById('c1').value,
                        codigo2: document.getElementById('c2').value,
                        codigo3: document.getElementById('c3').value,
                        codigo4: document.getElementById('c4').value,
                        horario
                    })
                })
                .then(r => r.json())
                .then(data => {
                    if (data.success) {
                        msg.style.display = 'none';
                        exito.textContent = '✅ ¡Verificación exitosa! Nos contactaremos contigo pronto.';
                        exito.style.display = 'block';
                        setTimeout(() => cerrarModal(), 2500);
                    } else {
                        exito.style.display = 'none';
                        msg.textContent = '❌ Código incorrecto.';
                        msg.style.display = 'block';
                    }
                });
        }

        function cerrarModal() {
            document.getElementById('modal-verificacion').style.display = 'none';
            ['c1', 'c2', 'c3', 'c4'].forEach(id => document.getElementById(id).value = '');
            document.getElementById('msg-verificacion').style.display = 'none';
            document.getElementById('msg-exito').style.display = 'none';
            document.getElementById('horario').value = '';
        }

        function reenviarCodigo() {
            cerrarModal();
            setTimeout(() => enviarFormulario(), 300);
        }

        // ===== SLIDER TESTIMONIOS =====
        (function() {
            const track = document.getElementById('slider-testimonios');
            if (!track) return;

            function setup() {
                const original = Array.from(track.querySelectorAll('.t-card'));
                const total = original.length;
                if (!total) return;

                original.forEach(c => track.appendChild(c.cloneNode(true)));
                original.forEach(c => track.insertBefore(c.cloneNode(true), track.firstChild));

                let idx = total;
                let autoT;
                let bloqueado = false;

                function vis() {
                    return window.innerWidth < 600 ? 1 : window.innerWidth < 900 ? 2 : 3;
                }

                function cardW() {
                    return track.parentElement.clientWidth / vis();
                }

                function setSizes() {
                    const cw = cardW();
                    Array.from(track.querySelectorAll('.t-card')).forEach(c => c.style.width = cw + 'px');
                }

                function jumpTo(n) {
                    idx = n;
                    track.style.transition = 'none';
                    track.style.transform = `translateX(-${n * cardW()}px)`;
                    track.getBoundingClientRect();
                }

                function slideTo(n) {
                    if (bloqueado) return;
                    bloqueado = true;
                    idx = n;
                    track.style.transition = 'transform 0.55s ease';
                    track.style.transform = `translateX(-${n * cardW()}px)`;
                    setTimeout(() => {
                        if (idx >= total * 2) jumpTo(total);
                        else if (idx < total) jumpTo(total * 2 - vis());
                        bloqueado = false;
                    }, 580);
                }

                const pEl = document.getElementById('puntos-t');

                function buildDots() {
                    pEl.innerHTML = '';
                    const grupos = Math.ceil(total / vis());
                    for (let i = 0; i < grupos; i++) {
                        const d = document.createElement('span');
                        d.style.cssText = `display:inline-block;width:11px;height:11px;border-radius:50%;
                            cursor:pointer;transition:background .3s;margin:0 4px;
                            background:${i === 0 ? 'var(--color-gold)' : '#bbb'};`;
                        d.onclick = () => {
                            clearInterval(autoT);
                            slideTo(total + i * vis());
                            updateDots();
                            startAuto();
                        };
                        pEl.appendChild(d);
                    }
                }

                function updateDots() {
                    const dots = pEl.querySelectorAll('span');
                    const pos = ((idx - total) % total + total) % total;
                    const g = Math.floor(pos / vis());
                    dots.forEach((d, i) => d.style.background = i === g ? 'var(--color-gold)' : '#bbb');
                }

                window.moverT = function(dir) {
                    clearInterval(autoT);
                    slideTo(idx + dir * vis());
                    updateDots();
                    startAuto();
                };

                function startAuto() {
                    clearInterval(autoT);
                    autoT = setInterval(() => {
                        slideTo(idx + vis());
                        updateDots();
                    }, 6000);
                }

                function init() {
                    setSizes();
                    buildDots();
                    jumpTo(total);
                    startAuto();
                }

                window.addEventListener('resize', () => {
                    clearInterval(autoT);
                    setSizes();
                    buildDots();
                    jumpTo(total);
                    startAuto();
                });

                init();
            }

            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', setup);
            } else {
                setup();
            }
        })();
    </script>
@endsection
