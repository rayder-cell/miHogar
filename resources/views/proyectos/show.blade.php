@extends('layouts.app-public')

@section('content')
<div style="max-width:1100px; margin:40px auto; padding:0 20px;">

    <!-- NOMBRE DEL PROYECTO -->
    <h1 style="color:#c9a84c; font-size:2rem; font-weight:900; text-transform:uppercase; letter-spacing:3px; margin-bottom:5px;">
        {{ $proyecto->nombre_proyecto }}
    </h1>
    <p style="color:#aaa; margin-bottom:30px;">📍 {{ $proyecto->distrito }} — {{ $proyecto->direccion }}</p>

    <!-- IMAGEN PRINCIPAL -->
    @if($proyecto->fotos)
    <div style="width:100%; height:450px; overflow:hidden; margin-bottom:30px; border:2px solid #c9a84c;">
        <img src="{{ asset($proyecto->fotos) }}" alt="{{ $proyecto->nombre_proyecto }}"
             style="width:100%; height:100%; object-fit:cover;">
    </div>
    @endif

    <!-- DESCRIPCIÓN -->
    <div style="background:#111; border-left:4px solid #c9a84c; padding:25px 30px; margin-bottom:30px;">
        <h2 style="color:#c9a84c; margin-bottom:15px;">Descripción</h2>
        <p style="color:#ddd; line-height:1.8;">{{ $proyecto->descripcion }}</p>
    </div>

    <!-- VIDEO -->
    @if($proyecto->videos)
    <div style="margin-bottom:30px;">
        <h2 style="color:#c9a84c; margin-bottom:15px;">Video del Proyecto</h2>
        <div style="position:relative; padding-bottom:56.25%; height:0; overflow:hidden;">
            <iframe src="{{ $proyecto->videos }}"
                    style="position:absolute; top:0; left:0; width:100%; height:100%; border:2px solid #c9a84c;"
                    allowfullscreen></iframe>
        </div>
    </div>
    @endif

    <!-- MAPA -->
    @if($proyecto->mapa)
    <div style="margin-bottom:30px;">
        <h2 style="color:#c9a84c; margin-bottom:15px;">📍 Ubicación</h2>
        <div style="border:2px solid #c9a84c; overflow:hidden;">
            <iframe src="{{ $proyecto->mapa }}"
                    width="100%"
                    height="400"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy">
            </iframe>
        </div>
    </div>
    @endif

    <!-- ASESORES -->
    <div style="margin-bottom:40px;">
        <h2 style="color:#c9a84c; margin-bottom:20px;">Asesores de Venta</h2>
        <div style="display:flex; gap:20px; flex-wrap:wrap;">
            @forelse($proyecto->asesores as $asesor)
            <div style="background:#111; border:1px solid #c9a84c; padding:20px; text-align:center; width:180px;">
                @if($asesor->foto)
                <img src="{{ asset($asesor->foto) }}" alt="{{ $asesor->nombre }}"
                     style="width:80px; height:80px; border-radius:50%; object-fit:cover; border:2px solid #c9a84c; margin-bottom:10px;">
                @else
                <div style="width:80px; height:80px; border-radius:50%; background:#333; margin:0 auto 10px; display:flex; align-items:center; justify-content:center; border:2px solid #c9a84c;">
                    <span style="font-size:2rem;">👤</span>
                </div>
                @endif
                <p style="color:#fff; font-weight:bold; margin-bottom:5px;">{{ $asesor->nombre }}</p>
                <p style="color:#c9a84c; font-size:0.85rem;">📞 {{ $asesor->contacto }}</p>
            </div>
            @empty
            <p style="color:#aaa;">No hay asesores asignados.</p>
            @endforelse
        </div>
    </div>

    <!-- BOTÓN VOLVER -->
    <a href="{{ url('/') }}"
       style="display:inline-block; background:#c9a84c; color:#000; padding:10px 25px; font-weight:bold; text-decoration:none; margin-bottom:40px;">
        ← Volver a Proyectos
    </a>

</div>
@endsection