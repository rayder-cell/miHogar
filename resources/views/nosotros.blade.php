@extends('layouts.app-public')

@section('content')

<!-- HERO -->
<div style="background:#111; padding:60px 20px; text-align:center; border-bottom:2px solid #c9a84c;">
    <h1 style="color:#c9a84c; font-size:2.5rem; font-weight:900; text-transform:uppercase; letter-spacing:4px;">
        Nosotros
    </h1>
    <p style="color:#aaa; margin-top:10px; font-size:1.1rem;">
        Conoce más sobre Inmobiliaria Mi Hogar
    </p>
    <div style="width:80px; height:3px; background:#c9a84c; margin:15px auto 0;"></div>
</div>

<!-- QUIÉNES SOMOS -->
<div style="max-width:1100px; margin:60px auto; padding:0 20px; display:flex; gap:40px; align-items:center; flex-wrap:wrap;">

    <!-- IMAGEN -->
    <div style="flex:1; min-width:280px;">
        <img src="{{ asset('img/LOGO1.png') }}"
             alt="Nosotros"
             style="width:100%; border:3px solid #c9a84c;"
             onerror="this.style.display='none'">
        <div style="background:#111; border:3px solid #c9a84c; padding:40px; text-align:center; display:none;" id="placeholder">
            <span style="font-size:5rem;">🏠</span>
        </div>
    </div>

    <!-- TEXTO -->
    <div style="flex:2; min-width:280px;">
        <h2 style="color:#c9a84c; font-size:1.8rem; margin-bottom:20px;">¿Quiénes somos?</h2>
        <p style="color:#ddd; line-height:1.9; margin-bottom:15px;">
            Somos <strong style="color:#c9a84c;">Inmobiliaria Mi Hogar</strong>, una empresa comprometida con hacer realidad el sueño de tener una vivienda propia. Trabajamos con transparencia, calidad y dedicación para ofrecer los mejores proyectos inmobiliarios en Andahuaylas, Apurímac.
        </p>
        <p style="color:#ddd; line-height:1.9;">
            Contamos con un equipo de profesionales altamente capacitados que te acompañarán en cada paso del proceso de compra, desde la primera consulta hasta la entrega de tu nuevo hogar.
        </p>
    </div>

</div>

<!-- VALORES -->
<div style="background:#111; padding:60px 20px; border-top:2px solid #c9a84c; border-bottom:2px solid #c9a84c;">
    <div style="max-width:1100px; margin:0 auto;">
        <h2 style="color:#c9a84c; text-align:center; font-size:1.8rem; margin-bottom:40px; text-transform:uppercase; letter-spacing:3px;">
            Nuestros Valores
        </h2>
        <div style="display:flex; flex-wrap:wrap; gap:25px; justify-content:center;">

            <div style="background:#000; border:1px solid #c9a84c; padding:30px; text-align:center; width:220px;">
                <div style="font-size:2.5rem; margin-bottom:15px;">🤝</div>
                <h3 style="color:#c9a84c; margin-bottom:10px;">Confianza</h3>
                <p style="color:#aaa; font-size:0.9rem; line-height:1.6;">Construimos relaciones duraderas basadas en la honestidad y transparencia.</p>
            </div>

            <div style="background:#000; border:1px solid #c9a84c; padding:30px; text-align:center; width:220px;">
                <div style="font-size:2.5rem; margin-bottom:15px;">⭐</div>
                <h3 style="color:#c9a84c; margin-bottom:10px;">Calidad</h3>
                <p style="color:#aaa; font-size:0.9rem; line-height:1.6;">Ofrecemos proyectos con los más altos estándares de construcción y diseño.</p>
            </div>

            <div style="background:#000; border:1px solid #c9a84c; padding:30px; text-align:center; width:220px;">
                <div style="font-size:2.5rem; margin-bottom:15px;">💡</div>
                <h3 style="color:#c9a84c; margin-bottom:10px;">Innovación</h3>
                <p style="color:#aaa; font-size:0.9rem; line-height:1.6;">Buscamos siempre nuevas soluciones para mejorar la experiencia de nuestros clientes.</p>
            </div>

            <div style="background:#000; border:1px solid #c9a84c; padding:30px; text-align:center; width:220px;">
                <div style="font-size:2.5rem; margin-bottom:15px;">❤️</div>
                <h3 style="color:#c9a84c; margin-bottom:10px;">Compromiso</h3>
                <p style="color:#aaa; font-size:0.9rem; line-height:1.6;">Nos comprometemos con cada cliente para hacer realidad su sueño de vivienda.</p>
            </div>

        </div>
    </div>
</div>

<!-- CONTACTO -->
<div style="max-width:1100px; margin:60px auto; padding:0 20px; text-align:center;">
    <h2 style="color:#c9a84c; font-size:1.8rem; margin-bottom:15px; text-transform:uppercase; letter-spacing:3px;">
        Contáctanos
    </h2>
    <p style="color:#aaa; margin-bottom:30px;">Estamos aquí para ayudarte. No dudes en comunicarte con nosotros.</p>

    <div style="display:flex; flex-wrap:wrap; gap:20px; justify-content:center;">

        <div style="background:#111; border:1px solid #c9a84c; padding:25px 35px; text-align:center;">
            <div style="font-size:2rem; margin-bottom:10px;">📍</div>
            <h4 style="color:#c9a84c; margin-bottom:5px;">Dirección</h4>
            <p style="color:#ddd; font-size:0.9rem;">Andahuaylas, Apurímac, Perú</p>
        </div>

        <div style="background:#111; border:1px solid #c9a84c; padding:25px 35px; text-align:center;">
            <div style="font-size:2rem; margin-bottom:10px;">📞</div>
            <h4 style="color:#c9a84c; margin-bottom:5px;">Teléfono</h4>
            <p style="color:#ddd; font-size:0.9rem;">Cel. 912345678</p>
        </div>

        <div style="background:#111; border:1px solid #c9a84c; padding:25px 35px; text-align:center;">
            <div style="font-size:2rem; margin-bottom:10px;">📧</div>
            <h4 style="color:#c9a84c; margin-bottom:5px;">Correo</h4>
            <p style="color:#ddd; font-size:0.9rem;">contacto@mihogar.com</p>
        </div>

        <div style="background:#111; border:1px solid #c9a84c; padding:25px 35px; text-align:center;">
            <div style="font-size:2rem; margin-bottom:10px;">💬</div>
            <h4 style="color:#c9a84c; margin-bottom:5px;">WhatsApp</h4>
            <a href="https://wa.me/51912345678" target="_blank"
               style="color:#25D366; font-size:0.9rem; text-decoration:none;">
                Escríbenos aquí
            </a>
        </div>

    </div>
</div>

@endsection