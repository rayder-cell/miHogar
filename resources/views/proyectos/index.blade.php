@extends('layouts.app-public')

@section('content')
<div style="max-width:1200px; margin:50px auto; padding:0 30px;">

    <h1 style="color:#c9a84c; font-size:2rem; font-weight:900; text-transform:uppercase; letter-spacing:3px; margin-bottom:40px;">
        Nuestros Proyectos
    </h1>

    <!-- FILTRO POR DISTRITO -->
    <div style="display:flex; gap:10px; flex-wrap:wrap; margin-bottom:30px;">
        <a href="{{ route('proyectos.index') }}"
           style="padding:8px 18px; background:{{ !request('distrito') ? '#c9a84c' : '#222' }}; color:{{ !request('distrito') ? '#000' : '#c9a84c' }}; text-decoration:none; font-weight:bold; font-size:0.85rem; border-radius:4px;">
            Todos
        </a>
        @php $distritos = App\Models\Proyecto::select('distrito')->distinct()->orderBy('distrito')->get(); @endphp
        @foreach($distritos as $d)
        <a href="{{ route('proyectos.index') }}?distrito={{ $d->distrito }}"
           style="padding:8px 18px; background:{{ request('distrito') == $d->distrito ? '#c9a84c' : '#222' }}; color:{{ request('distrito') == $d->distrito ? '#000' : '#c9a84c' }}; text-decoration:none; font-weight:bold; font-size:0.85rem; border-radius:4px;">
            {{ $d->distrito }}
        </a>
        @endforeach
    </div>

    <!-- TARJETAS -->
    <div style="display:flex; flex-wrap:wrap; gap:25px;">
        @forelse($proyectos as $proyecto)
        <div style="width:280px; background:#111; border:1px solid #222; border-radius:8px; overflow:hidden; transition:transform 0.3s;"
             onmouseover="this.style.transform='translateY(-6px)'; this.style.borderColor='#c9a84c';"
             onmouseout="this.style.transform='translateY(0)'; this.style.borderColor='#222';">

            <div style="height:200px; overflow:hidden; position:relative;">
                @if($proyecto->fotos)
                <img src="{{ asset($proyecto->fotos) }}" alt="{{ $proyecto->nombre_proyecto }}"
                     style="width:100%; height:100%; object-fit:cover;">
                @else
                <div style="width:100%; height:100%; background:#222; display:flex; align-items:center; justify-content:center;">
                    <span style="font-size:3rem;">🏠</span>
                </div>
                @endif
                <div style="position:absolute; top:10px; left:10px; background:#c9a84c; color:#000; padding:3px 10px; font-size:0.75rem; font-weight:bold; border-radius:3px;">
                    {{ strtoupper($proyecto->distrito) }}
                </div>
            </div>

            <div style="padding:20px;">
                <h3 style="color:#fff; font-size:0.95rem; font-weight:bold; text-transform:uppercase; margin-bottom:8px;">
                    {{ $proyecto->nombre_proyecto }}
                </h3>
                <p style="color:#aaa; font-size:0.82rem; margin-bottom:8px;">
                    📍 {{ $proyecto->direccion }}
                </p>
                @if($proyecto->precio)
                <p style="color:#c9a84c; font-weight:bold; font-size:1rem; margin-bottom:15px;">
                    S/. {{ number_format($proyecto->precio, 0, '.', ',') }}
                </p>
                @endif
                <a href="{{ route('proyectos.show', $proyecto->id_proyecto) }}"
                   style="display:block; text-align:center; background:#c9a84c; color:#000; padding:9px; font-weight:bold; text-decoration:none; font-size:0.85rem; text-transform:uppercase; border-radius:4px;">
                    Ver Proyecto
                </a>
            </div>
        </div>
        @empty
        <p style="color:#aaa;">No hay proyectos disponibles.</p>
        @endforelse
    </div>
</div>
@endsection