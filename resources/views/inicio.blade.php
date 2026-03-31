@extends('layouts.app-public')

@section('content')
<section style="position:relative; height:85vh; overflow:hidden;">

    <!-- TÍTULO -->
    <div style="position:absolute; top:30px; width:100%; text-align:center; z-index:10;">
        <h1 style="font-size:2.5rem; font-weight:900; color:#fff; text-transform:uppercase; letter-spacing:4px; text-shadow:2px 2px 8px #000;">
            Nuestros Proyectos
        </h1>
    </div>

    <!-- SLIDER -->
    <div style="height:100%; position:relative;">

        @if($proyectos->count() > 0)
            @foreach($proyectos as $index => $proyecto)
            <div class="slide"
                 style="
                    position:absolute; top:0; left:0;
                    width:100%; height:100%;
                    background: {{ $proyecto->fotos ? 'url('.asset($proyecto->fotos).') center/cover no-repeat' : '#1a1a1a' }};
                    opacity: {{ $index === 0 ? '1' : '0' }};
                    transition: opacity 0.8s ease;
                    display:flex; align-items:flex-end; padding:40px;
                 ">
                <!-- Info del proyecto -->
                <div style="background:rgba(0,0,0,0.6); padding:20px 30px; border-left:4px solid #c9a84c; max-width:400px;">
                    <h2 style="color:#c9a84c; font-size:1.4rem; margin-bottom:8px;">
                        {{ $proyecto->nombre_proyecto }}
                    </h2>
                    <p style="color:#fff; font-size:0.9rem;">📍 {{ $proyecto->distrito }} - {{ $proyecto->direccion }}</p>
                    <a href="{{ route('proyectos.show', $proyecto->id_proyecto) }}"
                       style="display:inline-block; margin-top:12px; background:#c9a84c; color:#000; padding:8px 20px; font-weight:bold; text-decoration:none;">
                        Ver más →
                    </a>
                </div>
            </div>
            @endforeach
        @else
            <div style="height:100%; background:#1a1a1a; display:flex; align-items:center; justify-content:center;">
                <p style="color:#c9a84c; font-size:1.2rem;">No hay proyectos disponibles aún.</p>
            </div>
        @endif

    </div>

    <!-- FLECHAS -->
    @if($proyectos->count() > 1)
    <button onclick="cambiarSlide(-1)"
        style="position:absolute;left:15px;top:50%;transform:translateY(-50%);background:rgba(0,0,0,0.5);border:2px solid #c9a84c;color:#c9a84c;font-size:2.5rem;cursor:pointer;width:50px;height:50px;border-radius:50%;">
        &#8249;
    </button>
    <button onclick="cambiarSlide(1)"
        style="position:absolute;right:15px;top:50%;transform:translateY(-50%);background:rgba(0,0,0,0.5);border:2px solid #c9a84c;color:#c9a84c;font-size:2.5rem;cursor:pointer;width:50px;height:50px;border-radius:50%;">
        &#8250;
    </button>
    @endif

    <!-- PUNTOS INDICADORES -->
    <div style="position:absolute; bottom:20px; width:100%; display:flex; justify-content:center; gap:10px; z-index:10;">
        @foreach($proyectos as $index => $proyecto)
        <span class="punto"
              onclick="irASlide({{ $index }})"
              style="width:12px; height:12px; border-radius:50%; background:{{ $index === 0 ? '#c9a84c' : '#fff' }}; cursor:pointer; border:2px solid #c9a84c;">
        </span>
        @endforeach
    </div>

</section>

<script>
    let actual = 0;
    const slides = document.querySelectorAll('.slide');
    const puntos = document.querySelectorAll('.punto');

    function mostrarSlide(n) {
        slides.forEach(s => s.style.opacity = '0');
        puntos.forEach(p => p.style.background = '#fff');

        actual = (n + slides.length) % slides.length;
        slides[actual].style.opacity = '1';
        puntos[actual].style.background = '#c9a84c';
    }

    function cambiarSlide(dir) {
        mostrarSlide(actual + dir);
    }

    function irASlide(n) {
        mostrarSlide(n);
    }

    // Auto-slide cada 5 segundos
    setInterval(() => cambiarSlide(1), 5000);
</script>
@endsection