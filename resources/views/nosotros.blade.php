@extends('layouts.app-public')

@section('content')
    <!-- HERO -->
    <div
        style="background:var(--color-dark-2); padding:80px 20px; text-align:center; border-bottom:2px solid var(--color-gold); position:relative; overflow:hidden;">
        <div
            style="position:absolute; top:0; left:0; width:100%; height:100%; background:url('{{ asset('img/LOGO1.png') }}') center/contain no-repeat; opacity:0.03;">
        </div>
        <p class="text-gold" style="font-size:0.9rem; letter-spacing:4px; text-transform:uppercase; margin-bottom:10px;">
            Conoce más sobre</p>
        <h1
            style="color:var(--color-white); font-size:2.5rem; font-weight:900; text-transform:uppercase; letter-spacing:4px; margin-bottom:15px;">
            Inmobiliaria Mi Hogar
        </h1>
        <div class="bg-gold" style="width:80px; height:3px; margin:0 auto;"></div>
    </div>

    <!-- QUIÉNES SOMOS -->
    <div
        style="max-width:1100px; margin:60px auto; padding:0 20px; display:flex; gap:50px; align-items:center; flex-wrap:wrap;">
        <div style="flex:1; min-width:280px;">
            <img src="{{ asset('img/LOGO1.png') }}" alt="Mi Hogar"
                style="width:100%; max-width:400px; border:3px solid var(--color-gold); padding:20px; background:var(--color-dark-2);">
        </div>
        <div style="flex:2; min-width:280px;">
            <p class="text-gold" style="font-size:0.9rem; letter-spacing:3px; text-transform:uppercase; margin-bottom:8px;">
                ¿Quiénes somos?</p>
            <h2 style="color:var(--color-white); font-size:1.8rem; margin-bottom:20px; font-weight:700;">Tu aliado
                inmobiliario en Apurímac</h2>
            <p style="color:var(--color-gray); line-height:1.9; margin-bottom:15px; font-size:0.95rem;">
                Somos <strong class="text-gold">Inmobiliaria Mi Hogar</strong>, una empresa comprometida con hacer realidad
                el sueño de tener una vivienda propia. Nacimos con la visión de transformar el mercado inmobiliario de
                Andahuaylas, ofreciendo proyectos de calidad a precios accesibles.
            </p>
            <p style="color:var(--color-gray); line-height:1.9; font-size:0.95rem;">
                Contamos con un equipo de profesionales altamente capacitados que te acompañarán en cada paso del proceso de
                compra, desde la primera consulta hasta la entrega de tu nuevo hogar.
            </p>
        </div>
    </div>

    <!-- MISIÓN Y VISIÓN -->
    <div style="background:var(--color-dark); padding:60px 20px; border-top:1px solid #222; border-bottom:1px solid #222;">
        <div style="max-width:1100px; margin:0 auto;">
            <div style="text-align:center; margin-bottom:40px;">
                <p class="text-gold" style="font-size:0.9rem; letter-spacing:4px; text-transform:uppercase;">Nuestra</p>
                <h2
                    style="color:var(--color-white); font-size:2rem; font-weight:900; text-transform:uppercase; letter-spacing:3px; margin:8px 0;">
                    Misión y Visión</h2>
                <div class="bg-gold" style="width:60px; height:3px; margin:0 auto;"></div>
            </div>

            <div style="display:flex; gap:30px; flex-wrap:wrap; justify-content:center;">

                <!-- MISIÓN -->
                <div class="border-gold"
                    style="flex:1; min-width:280px; background:var(--color-dark-2); padding:35px 30px; position:relative;">
                    <div class="bg-gold"
                        style="position:absolute; top:-20px; left:30px; color:#000; padding:8px 20px; font-weight:900; font-size:0.85rem; text-transform:uppercase; letter-spacing:2px;">
                        🎯 Misión
                    </div>
                    <p style="color:var(--color-gray-light); line-height:1.9; margin-top:15px; font-size:0.95rem;">
                        Brindar soluciones inmobiliarias integrales y accesibles a las familias de Andahuaylas y Apurímac,
                        ofreciendo proyectos de vivienda de calidad, con transparencia, honestidad y compromiso,
                        contribuyendo al desarrollo de nuestra región.
                    </p>
                </div>

                <!-- VISIÓN -->
                <div class="border-gold"
                    style="flex:1; min-width:280px; background:var(--color-dark-2); padding:35px 30px; position:relative;">
                    <div class="bg-gold"
                        style="position:absolute; top:-20px; left:30px; color:#000; padding:8px 20px; font-weight:900; font-size:0.85rem; text-transform:uppercase; letter-spacing:2px;">
                        🔭 Visión
                    </div>
                    <p style="color:var(--color-gray-light); line-height:1.9; margin-top:15px; font-size:0.95rem;">
                        Ser la inmobiliaria líder en la región de Apurímac para el año 2030, reconocida por la calidad de
                        nuestros proyectos, la satisfacción de nuestros clientes y nuestro aporte al desarrollo urbano
                        sostenible de Andahuaylas.
                    </p>
                </div>

            </div>
        </div>
    </div>

    <!-- VALORES -->
    <div style="padding:60px 20px; background:var(--color-black);">
        <div style="max-width:1100px; margin:0 auto;">
            <div style="text-align:center; margin-bottom:40px;">
                <p class="text-gold" style="font-size:0.9rem; letter-spacing:4px; text-transform:uppercase;">Lo que nos
                    define</p>
                <h2
                    style="color:var(--color-white); font-size:2rem; font-weight:900; text-transform:uppercase; letter-spacing:3px; margin:8px 0;">
                    Nuestros Valores</h2>
                <div class="bg-gold" style="width:60px; height:3px; margin:0 auto;"></div>
            </div>

            <div style="display:flex; flex-wrap:wrap; gap:20px; justify-content:center;">

                <div class="proyecto-card" style="padding:30px 25px; width:200px; text-align:center;">
                    <div style="font-size:2.5rem; margin-bottom:15px;">🤝</div>
                    <h3 class="text-gold" style="margin-bottom:10px; font-size:1rem;">Confianza</h3>
                    <p style="color:#888; font-size:0.85rem; line-height:1.6;">Construimos relaciones basadas en la
                        honestidad y transparencia.</p>
                </div>

                <div class="proyecto-card" style="padding:30px 25px; width:200px; text-align:center;">
                    <div style="font-size:2.5rem; margin-bottom:15px;">⭐</div>
                    <h3 class="text-gold" style="margin-bottom:10px; font-size:1rem;">Calidad</h3>
                    <p style="color:#888; font-size:0.85rem; line-height:1.6;">Ofrecemos proyectos con los más altos
                        estándares de construcción.</p>
                </div>

                <div class="proyecto-card" style="padding:30px 25px; width:200px; text-align:center;">
                    <div style="font-size:2.5rem; margin-bottom:15px;">💡</div>
                    <h3 class="text-gold" style="margin-bottom:10px; font-size:1rem;">Innovación</h3>
                    <p style="color:#888; font-size:0.85rem; line-height:1.6;">Buscamos nuevas soluciones para mejorar la
                        experiencia de compra.</p>
                </div>

                <div class="proyecto-card" style="padding:30px 25px; width:200px; text-align:center;">
                    <div style="font-size:2.5rem; margin-bottom:15px;">❤️</div>
                    <h3 class="text-gold" style="margin-bottom:10px; font-size:1rem;">Compromiso</h3>
                    <p style="color:#888; font-size:0.85rem; line-height:1.6;">Nos comprometemos con cada cliente para hacer
                        realidad su sueño.</p>
                </div>

                <div class="proyecto-card" style="padding:30px 25px; width:200px; text-align:center;">
                    <div style="font-size:2.5rem; margin-bottom:15px;">🏆</div>
                    <h3 class="text-gold" style="margin-bottom:10px; font-size:1rem;">Excelencia</h3>
                    <p style="color:#888; font-size:0.85rem; line-height:1.6;">Superamos las expectativas en cada proyecto
                        que desarrollamos.</p>
                </div>

            </div>
        </div>
    </div>

    <!-- CONTACTO -->
    <div style="background:var(--color-dark-2); padding:60px 20px; border-top:2px solid var(--color-gold);">
        <div style="max-width:1100px; margin:0 auto; text-align:center;">
            <h2 class="text-gold"
                style="font-size:1.8rem; margin-bottom:15px; text-transform:uppercase; letter-spacing:3px;">Contáctanos</h2>
            <p style="color:var(--color-gray); margin-bottom:30px;">Estamos aquí para ayudarte. No dudes en comunicarte con
                nosotros.</p>

            <div style="display:flex; flex-wrap:wrap; gap:20px; justify-content:center;">

                <div class="border-gold"
                    style="background:var(--color-black); padding:25px 35px; text-align:center; min-width:180px;">
                    <div style="font-size:2rem; margin-bottom:10px;">📍</div>
                    <h4 class="text-gold" style="margin-bottom:5px;">Dirección</h4>
                    <p style="color:var(--color-gray-light); font-size:0.9rem;">AV. ANDAHUAYLAS 485</p>
                </div>

                <div class="border-gold"
                    style="background:var(--color-black); padding:25px 35px; text-align:center; min-width:180px;">
                    <div style="font-size:2rem; margin-bottom:10px;">📞</div>
                    <h4 class="text-gold" style="margin-bottom:5px;">Teléfono</h4>
                    <p style="color:var(--color-gray-light); font-size:0.9rem;">Cel. 932 400 015</p>
                </div>

                <div class="border-gold"
                    style="background:var(--color-black); padding:25px 35px; text-align:center; min-width:180px;">
                    <div style="font-size:2rem; margin-bottom:10px;">📧</div>
                    <h4 class="text-gold" style="margin-bottom:5px;">Correo</h4>
                    <p style="color:var(--color-gray-light); font-size:0.9rem;">inmobiliariamihogarperu@gmail.com</p>
                </div>

                <div class="border-gold"
                    style="background:var(--color-black); padding:25px 35px; text-align:center; min-width:180px;">
                    <div style="margin-bottom:10px; display:flex; justify-content:center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="#25D366"
                            viewBox="0 0 16 16">
                            <path
                                d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                        </svg>
                    </div>
                    <h4 class="text-gold" style="margin-bottom:5px;">WhatsApp</h4>
                    <a href="https://wa.me/51932400015" target="_blank"
                        style="color:#25D366; font-size:0.9rem; text-decoration:none; font-weight:bold;">
                        Escríbenos aquí
                    </a>
                </div>

            </div>
        </div>
    </div>
@endsection
