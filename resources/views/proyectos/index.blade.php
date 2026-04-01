@extends('layouts.app-public')
@section('content')

<div style="max-width:1200px; margin:0 auto; padding:40px 20px;">

    <h2 style="color:#c9a84c; font-size:1.8rem; margin-bottom:30px; text-transform:uppercase; letter-spacing:2px;">
        Nuestros Proyectos
    </h2>

    {{-- FILTRO ACTIVO --}}
    @if(request('distrito'))
    <div style="margin-bottom:20px; display:flex; align-items:center; gap:10px;">
        <span style="color:#aaa; font-size:0.9rem;">Filtrando por distrito:</span>
        <span style="background:#c9a84c; color:#000; padding:4px 12px; border-radius:20px; font-weight:bold; font-size:0.85rem; text-transform:uppercase;">
            {{ request('distrito') }}
        </span>
        <a href="{{ route('proyectos.index') }}" style="color:#aaa; font-size:0.85rem; text-decoration:underline;">
            Ver todos ✕
        </a>
    </div>
    @endif

    {{-- GRID DE PROYECTOS --}}
    <div style="display:flex; flex-wrap:wrap; gap:25px;">
        @forelse($proyectos as $proyecto)
        <a href="{{ route('proyectos.show', $proyecto->id_proyecto) }}" style="text-decoration:none; width:260px;">
            <div style="border-radius:10px; overflow:hidden; box-shadow:0 4px 15px rgba(0,0,0,0.4); background:#111; transition:transform 0.2s;"
                 onmouseover="this.style.transform='translateY(-5px)'"
                 onmouseout="this.style.transform='translateY(0)'">

                {{-- IMAGEN --}}
                <div style="height:180px; overflow:hidden; position:relative;">
                    @if($proyecto->fotos)
                    <img src="{{ asset($proyecto->fotos) }}" style="width:100%; height:100%; object-fit:cover;">
                    @else
                    <div style="width:100%; height:100%; background:#222; display:flex; align-items:center; justify-content:center;">
                        <span style="font-size:3rem;">🏠</span>
                    </div>
                    @endif
                    <div style="position:absolute; top:8px; left:8px; background:#c9a84c; color:#000; padding:3px 10px; font-size:0.7rem; font-weight:bold; border-radius:4px;">
                        {{ strtoupper($proyecto->distrito) }}
                    </div>
                </div>

                {{-- INFO --}}
                <div style="padding:15px;">
                    <p style="color:#fff; font-weight:bold; font-size:0.95rem; text-transform:uppercase; margin-bottom:6px;">
                        {{ $proyecto->nombre_proyecto }}
                    </p>
                    @if($proyecto->direccion)
                    <p style="color:#888; font-size:0.82rem; margin-bottom:8px;">
                        📍 {{ $proyecto->direccion }}
                    </p>
                    @endif
                    @if($proyecto->precio)
                    <p style="color:#c9a84c; font-weight:bold; font-size:1rem;">
                        S/. {{ number_format($proyecto->precio, 0, '.', ',') }}
                    </p>
                    @endif
                </div>
            </div>
        </a>
        @empty
        <p style="color:#aaa; font-size:1rem;">No hay proyectos disponibles.</p>
        @endforelse
    </div>

</div>

@endsection