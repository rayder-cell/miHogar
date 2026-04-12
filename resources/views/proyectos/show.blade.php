@extends('layouts.app-public')

@section('content')
    <div style="max-width:1100px; margin:40px auto; padding:0 20px;">

        <!-- NOMBRE DEL PROYECTO -->
        <h1 class="text-gold"
            style="font-size:2rem; font-weight:900; text-transform:uppercase; letter-spacing:3px; margin-bottom:5px;">
            {{ $proyecto->nombre_proyecto }}
        </h1>
        <p style="color:var(--color-gray); margin-bottom:30px;">📍 {{ $proyecto->distrito }} — {{ $proyecto->direccion }}</p>

        <!-- IMAGEN PRINCIPAL -->
        @if ($proyecto->fotos)
            <div style="width:100%; margin-bottom:30px; border:2px solid #c9a84c;">
                <img src="{{ $proyecto->fotos }}" alt="{{ $proyecto->nombre_proyecto }}"
                    style="width:100%; height:auto; display:block;">
            </div>
        @endif

        <!-- DESCRIPCIÓN -->
        <div class="border-left-gold" style="background:var(--color-dark-2); padding:25px 30px; margin-bottom:30px;">
            <h2 class="text-gold" style="margin-bottom:15px;">Descripción</h2>
            <p style="color:var(--color-gray-light); line-height:1.8;">{{ $proyecto->descripcion }}</p>
        </div>

        <!-- VIDEO -->
        @if ($proyecto->videos)
            <div style="margin-bottom:30px;">
                <h2 class="text-gold" style="margin-bottom:15px;">Video del Proyecto</h2>
                <div style="position:relative; padding-bottom:56.25%; height:0; overflow:hidden;">
                    <iframe src="{{ $proyecto->videos }}" class="border-gold"
                        style="position:absolute; top:0; left:0; width:100%; height:100%;" allowfullscreen></iframe>
                </div>
            </div>
        @endif

        <!-- MAPA -->
        @if ($proyecto->mapa)
            <div style="margin-bottom:30px;">
                <h2 class="text-gold" style="margin-bottom:15px;">📍 Ubicación</h2>
                <a href="{{ $proyecto->mapa }}" target="_blank" class="btn-gold" style="border-radius:6px;">
                    🌍 Ver ubicación en Google Earth
                </a>
            </div>
        @endif

        <!-- BOTÓN VOLVER -->
        <a href="{{ url('/') }}" class="btn-gold" style="margin-bottom:40px;">
            ← Volver a Proyectos
        </a>

    </div>
@endsection
