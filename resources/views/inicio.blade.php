@extends('layouts.app-public')

@section('content')

<!-- ===== HERO (sin cambios) ===== -->
<section style="position:relative; min-height:90vh; overflow:hidden; background:#000;">

    @foreach($proyectos as $index => $proyecto)
    <div class="slide" style="
        position:absolute; top:0; left:0;
        width:100%; height:100%;
        background: {{ $proyecto->fotos ? 'url('.asset($proyecto->fotos).') center/cover no-repeat' : '#1a1a1a' }};
        opacity: {{ $index === 0 ? '1' : '0' }};
        transition: opacity 1s ease;">
        <div style="position:absolute;inset:0;background:rgba(0,0,0,0.45);"></div>
    </div>
    @endforeach

    <div style="position:absolute; top:0; left:0; width:100%; height:100%; display:flex; flex-direction:column; align-items:center; justify-content:center; z-index:5; text-align:center; padding:20px;">
        <p style="color:#c9a84c; font-size:1rem; letter-spacing:4px; text-transform:uppercase; margin-bottom:10px;">Bienvenido a</p>
        <h1 style="color:#fff; font-size:3.5rem; font-weight:900; text-transform:uppercase; letter-spacing:6px; text-shadow:2px 2px 10px rgba(0,0,0,0.8); margin-bottom:15px;">
            Inmobiliaria Mi Hogar
        </h1>
        <p style="color:#ddd; font-size:1.1rem; margin-bottom:30px; max-width:600px;">
            Encuentra el hogar de tus sueños en Andahuaylas, Apurímac
        </p>
        <a href="{{ route('proyectos.index') }}"
           style="background:#c9a84c; color:#000; padding:14px 35px; font-weight:bold; text-decoration:none; font-size:1rem; text-transform:uppercase; letter-spacing:2px;"
           onmouseover="this.style.background='#b8962a'"
           onmouseout="this.style.background='#c9a84c'">
            Ver Proyectos
        </a>
    </div>

    @if($proyectos->count() > 1)
    <button onclick="cambiarSlide(-1)" style="position:absolute;left:15px;top:50%;transform:translateY(-50%);background:rgba(0,0,0,0.5);border:2px solid #c9a84c;color:#c9a84c;font-size:2rem;cursor:pointer;width:50px;height:50px;border-radius:50%;z-index:10;">&#8249;</button>
    <button onclick="cambiarSlide(1)"  style="position:absolute;right:15px;top:50%;transform:translateY(-50%);background:rgba(0,0,0,0.5);border:2px solid #c9a84c;color:#c9a84c;font-size:2rem;cursor:pointer;width:50px;height:50px;border-radius:50%;z-index:10;">&#8250;</button>
    @endif

    <div style="position:absolute;bottom:20px;width:100%;display:flex;justify-content:center;gap:10px;z-index:10;">
        @foreach($proyectos as $index => $p)
        <span class="punto" onclick="irASlide({{ $index }})"
              style="width:12px;height:12px;border-radius:50%;background:{{ $index===0?'#c9a84c':'rgba(255,255,255,0.5)' }};cursor:pointer;border:2px solid #c9a84c;"></span>
        @endforeach
    </div>

    <!-- INFO PROYECTO ESQUINA -->
    <div style="position:absolute; bottom:60px; left:30px; z-index:10;">
        @foreach($proyectos as $index => $proyecto)
        <div class="info-slide" style="display:{{ $index === 0 ? 'block' : 'none' }};">
            <div style="background:rgba(0,0,0,0.75); border-left:4px solid #c9a84c; padding:15px 20px; max-width:280px;">
                <h2 style="color:#fff; font-size:1rem; margin-bottom:6px;">{{ $proyecto->nombre_proyecto }}</h2>
                <p style="color:#ddd; font-size:0.82rem; margin-bottom:4px;">📍 {{ $proyecto->distrito }} - {{ $proyecto->direccion }}</p>
                @if($proyecto->precio)
                <p style="color:#c9a84c; font-weight:bold; font-size:0.95rem; margin-bottom:8px;">💰 S/. {{ number_format($proyecto->precio, 0, '.', ',') }}</p>
                @endif
                <a href="{{ route('proyectos.show', $proyecto->id_proyecto) }}"
                   style="display:inline-block; background:#c9a84c; color:#000; padding:6px 14px; font-weight:bold; text-decoration:none; font-size:0.82rem;">
                    Ver más →
                </a>
            </div>
        </div>
        @endforeach
    </div>
</section>

<!-- ===== FORMULARIO DE CONTACTO ===== -->
<section style="background:#0a0a0a; padding:70px 20px;">
    <div style="max-width:1100px; margin:0 auto; display:flex; align-items:center; gap:60px; flex-wrap:wrap; justify-content:center;">

        <!-- TEXTO IZQUIERDA -->
        <div style="flex:1; min-width:280px;">
            <p style="color:#c9a84c; font-size:0.9rem; letter-spacing:4px; text-transform:uppercase; margin-bottom:10px;">Contáctanos</p>
            <h2 style="color:#fff; font-size:2.2rem; font-weight:900; line-height:1.3; margin-bottom:20px;">
                Dueño de una vida mejor.<br>
                <span style="color:#c9a84c;">Descubre lo que</span><br>
                tenemos para ti.
            </h2>
            <p style="color:#aaa; font-size:0.95rem; line-height:1.8;">
                📍 Andahuaylas, Apurímac<br>
                📞 912 345 678<br>
                ✉️ info@mihogar.pe
            </p>
        </div>

        <!-- FORMULARIO DERECHA -->
        <div style="background:#c9a84c; border-radius:12px; padding:35px; width:360px; flex-shrink:0;">
            <div style="display:flex; align-items:center; gap:10px; margin-bottom:20px;">
                <div style="width:28px; height:28px; background:#000; color:#c9a84c; border-radius:50%; display:flex; align-items:center; justify-content:center; font-weight:bold; font-size:0.85rem;">1</div>
                <div style="flex:1; height:2px; background:#000; opacity:0.3;"></div>
                <div style="width:28px; height:28px; background:#fff; color:#000; border-radius:50%; display:flex; align-items:center; justify-content:center; font-weight:bold; font-size:0.85rem; border:2px solid #000;">2</div>
            </div>
            <h3 style="color:#000; font-weight:900; font-size:1.1rem; margin-bottom:20px; text-align:center;">Quiero recibir información</h3>
            <div style="display:flex; flex-direction:column; gap:12px;">
                <div style="display:flex; gap:10px;">
                    <input type="text" placeholder="Nombre*" style="flex:1; padding:10px 14px; border:none; border-radius:8px; font-size:0.9rem; outline:none;">
                    <input type="text" placeholder="Apellidos*" style="flex:1; padding:10px 14px; border:none; border-radius:8px; font-size:0.9rem; outline:none;">
                </div>
                <input type="text" placeholder="DNI*" style="width:100%; padding:10px 14px; border:none; border-radius:8px; font-size:0.9rem; outline:none; box-sizing:border-box;">
                <input type="tel" placeholder="Teléfono*" style="width:100%; padding:10px 14px; border:none; border-radius:8px; font-size:0.9rem; outline:none; box-sizing:border-box;">
                <input type="email" placeholder="Correo electrónico*" style="width:100%; padding:10px 14px; border:none; border-radius:8px; font-size:0.9rem; outline:none; box-sizing:border-box;">
                <select style="width:100%; padding:10px 14px; border:none; border-radius:8px; font-size:0.9rem; outline:none; box-sizing:border-box;">
                    <option value="">Proyecto de interés</option>
                    @foreach($proyectos as $p)
                    <option value="{{ $p->id_proyecto }}">{{ $p->nombre_proyecto }}</option>
                    @endforeach
                </select>
                <label style="display:flex; align-items:flex-start; gap:8px; font-size:0.78rem; color:#000; cursor:pointer;">
                    <input type="checkbox" style="margin-top:2px;">
                    Acepto el tratamiento de mis datos personales.
                </label>
                <button style="background:#000; color:#c9a84c; padding:14px; border:none; border-radius:8px; font-weight:900; font-size:1rem; cursor:pointer; text-transform:uppercase; letter-spacing:1px; width:100%;"
                    onmouseover="this.style.background='#222'"
                    onmouseout="this.style.background='#000'">
                    Solicitar información
                </button>
            </div>
        </div>
    </div>
</section>

<!-- ===== TESTIMONIOS ===== -->
<section style="background:#fff; padding:70px 20px;">
    <div style="max-width:1100px; margin:0 auto;">
        <h2 style="text-align:center; color:#000; font-size:2rem; font-weight:900; margin-bottom:50px;">
            Nuestros clientes nos respaldan
        </h2>
        <div style="display:flex; gap:25px; justify-content:center; flex-wrap:wrap;">

            <div style="width:300px; background:#fff; border-radius:12px; overflow:hidden; box-shadow:0 4px 20px rgba(0,0,0,0.1);">
                <div style="height:220px; background:#e8e0cc; display:flex; align-items:center; justify-content:center;">
                    <span style="font-size:5rem;">👨</span>
                </div>
                <div style="padding:20px;">
                    <p style="color:#c9a84c; font-weight:bold; font-size:0.95rem; margin-bottom:8px;">"Un hogar pensando en el futuro"</p>
                    <p style="color:#555; font-size:0.82rem; line-height:1.6; margin-bottom:15px;">Compré con Mi Hogar pensando en el futuro de mis hijos. Me dieron facilidades y logré cumplir el sueño de la casa propia.</p>
                    <p style="color:#000; font-weight:bold; font-size:0.85rem; text-align:right;">Carlos Quispe<br><span style="color:#888; font-weight:normal;">Andahuaylas</span></p>
                </div>
            </div>

            <div style="width:300px; background:#fff; border-radius:12px; overflow:hidden; box-shadow:0 4px 20px rgba(0,0,0,0.1);">
                <div style="height:220px; background:#e8e0cc; display:flex; align-items:center; justify-content:center;">
                    <span style="font-size:5rem;">👩</span>
                </div>
                <div style="padding:20px;">
                    <p style="color:#c9a84c; font-weight:bold; font-size:0.95rem; margin-bottom:8px;">"Nuestro mejor legado familiar"</p>
                    <p style="color:#555; font-size:0.82rem; line-height:1.6; margin-bottom:15px;">Con Mi Hogar logramos un terreno para darles a nuestros hijos un lugar tranquilo. Fue nuestra mejor decisión en familia.</p>
                    <p style="color:#000; font-weight:bold; font-size:0.85rem; text-align:right;">María Flores<br><span style="color:#888; font-weight:normal;">Apurímac</span></p>
                </div>
            </div>

            <div style="width:300px; background:#fff; border-radius:12px; overflow:hidden; box-shadow:0 4px 20px rgba(0,0,0,0.1);">
                <div style="height:220px; background:#e8e0cc; display:flex; align-items:center; justify-content:center;">
                    <span style="font-size:5rem;">👩</span>
                </div>
                <div style="padding:20px;">
                    <p style="color:#c9a84c; font-weight:bold; font-size:0.95rem; margin-bottom:8px;">"Mi casa propia, un sueño cumplido"</p>
                    <p style="color:#555; font-size:0.82rem; line-height:1.6; margin-bottom:15px;">Cumplí mi sueño de tener casa propia. De un cuarto alquilado a un hogar con patio y espacio para mi familia.</p>
                    <p style="color:#000; font-weight:bold; font-size:0.85rem; text-align:right;">Rosa Huamán<br><span style="color:#888; font-weight:normal;">Andahuaylas</span></p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- SCRIPT SLIDER -->
<script>
    let actual = 0;
    const slides = document.querySelectorAll('.slide');
    const puntos = document.querySelectorAll('.punto');
    const infos  = document.querySelectorAll('.info-slide');

    function mostrarSlide(n) {
        if (!slides.length) return;
        slides.forEach(s => s.style.opacity = '0');
        puntos.forEach(p => p.style.background = 'rgba(255,255,255,0.5)');
        infos.forEach(i => i.style.display = 'none');
        actual = (n + slides.length) % slides.length;
        slides[actual].style.opacity = '1';
        puntos[actual].style.background = '#c9a84c';
        if (infos[actual]) infos[actual].style.display = 'block';
    }
    function cambiarSlide(dir) { mostrarSlide(actual + dir); }
    function irASlide(n) { mostrarSlide(n); }
    if (slides.length > 0) {
        mostrarSlide(0);
        setInterval(() => cambiarSlide(1), 5000);
    }
</script>

@endsection