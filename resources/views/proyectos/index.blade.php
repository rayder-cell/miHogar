@extends('layouts.app-public')

@section('content')
<div style="max-width:1200px; margin:50px auto; padding:0 30px;">

    <h1 class="text-gold" style="font-size:2rem; font-weight:900; text-transform:uppercase; letter-spacing:3px; margin-bottom:40px;">
        Nuestros Proyectos
    </h1>

    <!-- FILTRO POR DISTRITO -->
    <div style="display:flex; gap:10px; flex-wrap:wrap; margin-bottom:30px;">
        <a href="{{ route('proyectos.index') }}"
           style="padding:8px 18px; background:{{ !request('distrito') ? 'var(--color-gold)' : '#222' }}; color:{{ !request('distrito') ? '#000' : 'var(--color-gold)' }}; text-decoration:none; font-weight:bold; font-size:0.85rem; border-radius:4px;">
            Todos
        </a>
        @php $distritos = App\Models\Proyecto::select('distrito')->distinct()->orderBy('distrito')->get(); @endphp
        @foreach($distritos as $d)
        <a href="{{ route('proyectos.index') }}?distrito={{ $d->distrito }}"
           style="padding:8px 18px; background:{{ request('distrito') == $d->distrito ? 'var(--color-gold)' : '#222' }}; color:{{ request('distrito') == $d->distrito ? '#000' : 'var(--color-gold)' }}; text-decoration:none; font-weight:bold; font-size:0.85rem; border-radius:4px;">
            {{ $d->distrito }}
        </a>
        @endforeach
    </div>

    <!-- TARJETAS -->
    <div style="display:flex; flex-wrap:wrap; gap:25px;">
        @forelse($proyectos as $proyecto)
        <div class="proyecto-card" style="width:280px;"
             onmouseover="this.style.transform='translateY(-6px)'; this.style.borderColor='var(--color-gold)';"
             onmouseout="this.style.transform='translateY(0)'; this.style.borderColor='#222';">

            <div style="height:200px; overflow:hidden; position:relative;">
                @if($proyecto->fotos)
                <img src="{{ $proyecto->fotos }}" alt="{{ $proyecto->nombre_proyecto }}"
                     style="width:100%; height:100%; object-fit:cover;">
                @else
                <div style="width:100%; height:100%; background:#222; display:flex; align-items:center; justify-content:center;">
                    <span style="font-size:3rem;">🏠</span>
                </div>
                @endif
                <div class="proyecto-badge" style="position:absolute; top:10px; left:10px;">
                    {{ strtoupper($proyecto->distrito) }}
                </div>
            </div>

            <div style="padding:20px;">
                <h3 style="color:var(--color-white); font-size:0.95rem; font-weight:bold; text-transform:uppercase; margin-bottom:8px;">
                    {{ $proyecto->nombre_proyecto }}
                </h3>
                <p style="color:var(--color-gray); font-size:0.82rem; margin-bottom:8px;">
                    📍 {{ $proyecto->direccion }}
                </p>
                @if($proyecto->precio)
                <p class="proyecto-precio" style="font-size:1rem; margin-bottom:15px;">
                    S/. {{ number_format($proyecto->precio, 0, '.', ',') }}
                </p>
                @endif
                <a href="{{ route('proyectos.show', $proyecto->id_proyecto) }}" class="btn-gold"
                   style="display:block; text-align:center; padding:9px; font-size:0.85rem; border-radius:4px;">
                    Ver Proyecto
                </a>
            </div>
        </div>
        @empty
        <p style="color:var(--color-gray);">No hay proyectos disponibles.</p>
        @endforelse
    </div>
</div>
@endsection