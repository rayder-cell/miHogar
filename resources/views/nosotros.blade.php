@extends('layouts.app-public')

@section('content')

<!-- HERO -->
<div style="background:#111; padding:80px 20px; text-align:center; border-bottom:2px solid #c9a84c; position:relative; overflow:hidden;">
    <div style="position:absolute; top:0; left:0; width:100%; height:100%; background:url('{{ asset('img/LOGO1.png') }}') center/contain no-repeat; opacity:0.03;"></div>
    <p style="color:#c9a84c; font-size:0.9rem; letter-spacing:4px; text-transform:uppercase; margin-bottom:10px;">Conoce más sobre</p>
    <h1 style="color:#fff; font-size:2.5rem; font-weight:900; text-transform:uppercase; letter-spacing:4px; margin-bottom:15px;">
        Inmobiliaria Mi Hogar
    </h1>
    <div style="width:80px; height:3px; background:#c9a84c; margin:0 auto;"></div>
</div>

<!-- QUIÉNES SOMOS -->
<div style="max-width:1100px; margin:60px auto; padding:0 20px; display:flex; gap:50px; align-items:center; flex-wrap:wrap;">
    <div style="flex:1; min-width:280px;">
        <img src="{{ asset('img/LOGO1.png') }}" alt="Mi Hogar"
             style="width:100%; max-width:400px; border:3px solid #c9a84c; padding:20px; background:#111;">
    </div>
    <div style="flex:2; min-width:280px;">
        <p style="color:#c9a84c; font-size:0.9rem; letter-spacing:3px; text-transform:uppercase; margin-bottom:8px;">¿Quiénes somos?</p>
        <h2 style="color:#fff; font-size:1.8rem; margin-bottom:20px; font-weight:700;">Tu aliado inmobiliario en Apurímac</h2>
        <p style="color:#aaa; line-height:1.9; margin-bottom:15px; font-size:0.95rem;">
            Somos <strong style="color:#c9a84c;">Inmobiliaria Mi Hogar</strong>, una empresa comprometida con hacer realidad el sueño de tener una vivienda propia. Nacimos con la visión de transformar el mercado inmobiliario de Andahuaylas, ofreciendo proyectos de calidad a precios accesibles.
        </p>
        <p style="color:#aaa; line-height:1.9; font-size:0.95rem;">
            Contamos con un equipo de profesionales altamente capacitados que te acompañarán en cada paso del proceso de compra, desde la primera consulta hasta la entrega de tu nuevo hogar.
        </p>
    </div>
</div>

<!-- MISIÓN Y VISIÓN -->
<div style="background:#0a0a0a; padding:60px 20px; border-top:1px solid #222; border-bottom:1px solid #222;">
    <div style="max-width:1100px; margin:0 auto;">
        <div style="text-align:center; margin-bottom:40px;">
            <p style="color:#c9a84c; font-size:0.9rem; letter-spacing:4px; text-transform:uppercase;">Nuestra</p>
            <h2 style="color:#fff; font-size:2rem; font-weight:900; text-transform:uppercase; letter-spacing:3px; margin:8px 0;">Misión y Visión</h2>
            <div style="width:60px; height:3px; background:#c9a84c; margin:0 auto;"></div>
        </div>

        <div style="display:flex; gap:30px; flex-wrap:wrap; justify-content:center;">

            <!-- MISIÓN -->
            <div style="flex:1; min-width:280px; background:#111; border:1px solid #c9a84c; padding:35px 30px; position:relative;">
                <div style="position:absolute; top:-20px; left:30px; background:#c9a84c; color:#000; padding:8px 20px; font-weight:900; font-size:0.85rem; text-transform:uppercase; letter-spacing:2px;">
                    🎯 Misión
                </div>
                <p style="color:#ddd; line-height:1.9; margin-top:15px; font-size:0.95rem;">
                    Brindar soluciones inmobiliarias integrales y accesibles a las familias de Andahuaylas y Apurímac, ofreciendo proyectos de vivienda de calidad, con transparencia, honestidad y compromiso, contribuyendo al desarrollo de nuestra región.
                </p>
            </div>

            <!-- VISIÓN -->
            <div style="flex:1; min-width:280px; background:#111; border:1px solid #c9a84c; padding:35px 30px; position:relative;">
                <div style="position:absolute; top:-20px; left:30px; background:#c9a84c; color:#000; padding:8px 20px; font-weight:900; font-size:0.85rem; text-transform:uppercase; letter-spacing:2px;">
                    🔭 Visión
                </div>
                <p style="color:#ddd; line-height:1.9; margin-top:15px; font-size:0.95rem;">
                    Ser la inmobiliaria líder en la región de Apurímac para el año 2030, reconocida por la calidad de nuestros proyectos, la satisfacción de nuestros clientes y nuestro aporte al desarrollo urbano sostenible de Andahuaylas.
                </p>
            </div>

        </div>
    </div>
</div>

<!-- VALORES -->
<div style="padding:60px 20px; background:#000;">
    <div style="max-width:1100px; margin:0 auto;">
        <div style="text-align:center; margin-bottom:40px;">
            <p style="color:#c9a84c; font-size:0.9rem; letter-spacing:4px; text-transform:uppercase;">Lo que nos define</p>
            <h2 style="color:#fff; font-size:2rem; font-weight:900; text-transform:uppercase; letter-spacing:3px; margin:8px 0;">Nuestros Valores</h2>
            <div style="width:60px; height:3px; background:#c9a84c; margin:0 auto;"></div>
        </div>

        <div style="display:flex; flex-wrap:wrap; gap:20px; justify-content:center;">
            <div style="background:#111; border:1px solid #222; padding:30px 25px; width:200px; text-align:center; transition:border-color 0.3s;"
                 onmouseover="this.style.borderColor='#c9a84c'"
                 onmouseout="this.style.borderColor='#222'">
                <div style="font-size:2.5rem; margin-bottom:15px;">🤝</div>
                <h3 style="color:#c9a84c; margin-bottom:10px; font-size:1rem;">Confianza</h3>
                <p style="color:#888; font-size:0.85rem; line-height:1.6;">Construimos relaciones basadas en la honestidad y transparencia.</p>
            </div>

            <div style="background:#111; border:1px solid #222; padding:30px 25px; width:200px; text-align:center; transition:border-color 0.3s;"
                 onmouseover="this.style.borderColor='#c9a84c'"
                 onmouseout="this.style.borderColor='#222'">
                <div style="font-size:2.5rem; margin-bottom:15px;">⭐</div>
                <h3 style="color:#c9a84c; margin-bottom:10px; font-size:1rem;">Calidad</h3>
                <p style="color:#888; font-size:0.85rem; line-height:1.6;">Ofrecemos proyectos con los más altos estándares de construcción.</p>
            </div>

            <div style="background:#111; border:1px solid #222; padding:30px 25px; width:200px; text-align:center; transition:border-color 0.3s;"
                 onmouseover="this.style.borderColor='#c9a84c'"
                 onmouseout="this.style.borderColor='#222'">
                <div style="font-size:2.5rem; margin-bottom:15px;">💡</div>
                <h3 style="color:#c9a84c; margin-bottom:10px; font-size:1rem;">Innovación</h3>
                <p style="color:#888; font-size:0.85rem; line-height:1.6;">Buscamos nuevas soluciones para mejorar la experiencia de compra.</p>
            </div>

            <div style="background:#111; border:1px solid #222; padding:30px 25px; width:200px; text-align:center; transition:border-color 0.3s;"
                 onmouseover="this.style.borderColor='#c9a84c'"
                 onmouseout="this.style.borderColor='#222'">
                <div style="font-size:2.5rem; margin-bottom:15px;">❤️</div>
                <h3 style="color:#c9a84c; margin-bottom:10px; font-size:1rem;">Compromiso</h3>
                <p style="color:#888; font-size:0.85rem; line-height:1.6;">Nos comprometemos con cada cliente para hacer realidad su sueño.</p>
            </div>

            <div style="background:#111; border:1px solid #222; padding:30px 25px; width:200px; text-align:center; transition:border-color 0.3s;"
                 onmouseover="this.style.borderColor='#c9a84c'"
                 onmouseout="this.style.borderColor='#222'">
                <div style="font-size:2.5rem; margin-bottom:15px;">🏆</div>
                <h3 style="color:#c9a84c; margin-bottom:10px; font-size:1rem;">Excelencia</h3>
                <p style="color:#888; font-size:0.85rem; line-height:1.6;">Superamos las expectativas en cada proyecto que desarrollamos.</p>
            </div>
        </div>
    </div>
</div>

<!-- CONTACTO -->
<div style="background:#111; padding:60px 20px; border-top:2px solid #c9a84c;">
    <div style="max-width:1100px; margin:0 auto; text-align:center;">
        <h2 style="color:#c9a84c; font-size:1.8rem; margin-bottom:15px; text-transform:uppercase; letter-spacing:3px;">Contáctanos</h2>
        <p style="color:#aaa; margin-bottom:30px;">Estamos aquí para ayudarte. No dudes en comunicarte con nosotros.</p>

        <div style="display:flex; flex-wrap:wrap; gap:20px; justify-content:center;">
            <div style="background:#000; border:1px solid #c9a84c; padding:25px 35px; text-align:center; min-width:180px;">
                <div style="font-size:2rem; margin-bottom:10px;">📍</div>
                <h4 style="color:#c9a84c; margin-bottom:5px;">Dirección</h4>
                <p style="color:#ddd; font-size:0.9rem;">Andahuaylas, Apurímac, Perú</p>
            </div>
            <div style="background:#000; border:1px solid #c9a84c; padding:25px 35px; text-align:center; min-width:180px;">
                <div style="font-size:2rem; margin-bottom:10px;">📞</div>
                <h4 style="color:#c9a84c; margin-bottom:5px;">Teléfono</h4>
                <p style="color:#ddd; font-size:0.9rem;">Cel. 912345678</p>
            </div>
            <div style="background:#000; border:1px solid #c9a84c; padding:25px 35px; text-align:center; min-width:180px;">
                <div style="font-size:2rem; margin-bottom:10px;">📧</div>
                <h4 style="color:#c9a84c; margin-bottom:5px;">Correo</h4>
                <p style="color:#ddd; font-size:0.9rem;">info@mihogar.pe</p>
            </div>
            <div style="background:#000; border:1px solid #c9a84c; padding:25px 35px; text-align:center; min-width:180px;">
                <div style="font-size:2rem; margin-bottom:10px;">💬</div>
                <h4 style="color:#c9a84c; margin-bottom:5px;">WhatsApp</h4>
                <a href="https://wa.me/51912345678" target="_blank"
                   style="color:#25D366; font-size:0.9rem; text-decoration:none; font-weight:bold;">
                    Escríbenos aquí
                </a>
            </div>
        </div>
    </div>
</div>
<main>
    @yield('content')
</main>

@endsection