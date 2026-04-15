@extends('layouts.app-public')

@section('content')

<style>
    /* ===== RESPONSIVE GLOBAL (aplica a todo el sitio) ===== */
    html, body {
        overflow-x: hidden;
        max-width: 100vw;
    }

    img { max-width: 100%; height: auto; }

    /* NAVBAR */
    @media (max-width: 768px) {
        nav {
            padding: 10px 15px !important;
            flex-wrap: wrap !important;
            gap: 8px !important;
        }
        nav > div {
            margin-left: 0 !important;
            width: 100%;
            justify-content: space-between !important;
        }
        nav ul {
            gap: 10px !important;
            flex-wrap: wrap !important;
        }
        nav ul a { font-size: 11px !important; }
        .logo img { height: 38px !important; }
        .btn-login { font-size: 11px !important; padding: 6px 12px !important; }

        /* Dropdown proyectos en móvil */
        .dropdown-proyectos {
            width: calc(100vw - 20px) !important;
            right: 0 !important;
            left: auto !important;
            position: fixed !important;
            top: 65px !important;
        }
        .dropdown-proyectos > div {
            flex-direction: column !important;
        }
        .dropdown-proyectos > div > div:first-child {
            width: 100% !important;
            border-right: none !important;
            border-bottom: 1px solid #eee;
            max-height: 130px !important;
        }
    }

    /* FOOTER */
    @media (max-width: 768px) {
        footer > div:first-child {
            flex-direction: column !important;
            gap: 25px !important;
        }
        footer {
            padding: 30px 20px 0 !important;
        }
    }

    /* CHAT FLOTANTE en móvil */
    @media (max-width: 480px) {
        #chat-flotante {
            bottom: 15px !important;
            right: 15px !important;
        }
        #btn-texto { display: none; }
    }
</style>

<div style="max-width:1200px; margin:50px auto; padding:0 20px;">

    <h1 class="text-gold" style="font-size:clamp(1.4rem, 5vw, 2rem); font-weight:900;
        text-transform:uppercase; letter-spacing:3px; margin-bottom:30px;">
        Nuestros Proyectos
    </h1>

    <!-- FILTRO POR DISTRITO -->
    <div style="display:flex; gap:8px; flex-wrap:wrap; margin-bottom:25px;">
        <a href="{{ route('proyectos.index') }}"
           style="padding:8px 16px;
                  background:{{ !request('distrito') ? 'var(--color-gold)' : '#222' }};
                  color:{{ !request('distrito') ? '#000' : 'var(--color-gold)' }};
                  text-decoration:none; font-weight:bold;
                  font-size:clamp(0.75rem, 3vw, 0.85rem);
                  border-radius:4px; white-space:nowrap;">
            Todos
        </a>
        @php $distritos = App\Models\Proyecto::select('distrito')->distinct()->orderBy('distrito')->get(); @endphp
        @foreach($distritos as $d)
        <a href="{{ route('proyectos.index') }}?distrito={{ $d->distrito }}"
           style="padding:8px 16px;
                  background:{{ request('distrito') == $d->distrito ? 'var(--color-gold)' : '#222' }};
                  color:{{ request('distrito') == $d->distrito ? '#000' : 'var(--color-gold)' }};
                  text-decoration:none; font-weight:bold;
                  font-size:clamp(0.75rem, 3vw, 0.85rem);
                  border-radius:4px; white-space:nowrap;">
            {{ $d->distrito }}
        </a>
        @endforeach
    </div>

    <!-- TARJETAS CON GRID RESPONSIVO -->
    <div style="display:grid;
                grid-template-columns:repeat(auto-fill, minmax(min(280px, 100%), 1fr));
                gap:20px;">
        @forelse($proyectos as $proyecto)
        <div class="proyecto-card"
             onmouseover="this.style.transform='translateY(-6px)'; this.style.borderColor='var(--color-gold)';"
             onmouseout="this.style.transform='translateY(0)'; this.style.borderColor='#222';">

            <div style="height:200px; overflow:hidden; position:relative;">
                @if($proyecto->fotos)
                <img src="{{ $proyecto->fotos }}" alt="{{ $proyecto->nombre_proyecto }}"
                     style="width:100%; height:100%; object-fit:cover;">
                @else
                <div style="width:100%; height:100%; background:#222;
                            display:flex; align-items:center; justify-content:center;">
                    <span style="font-size:3rem;">🏠</span>
                </div>
                @endif
                <div class="proyecto-badge" style="position:absolute; top:10px; left:10px;">
                    {{ strtoupper($proyecto->distrito) }}
                </div>
            </div>

            <div style="padding:18px;">
                <h3 style="color:var(--color-white); font-size:0.92rem; font-weight:bold;
                           text-transform:uppercase; margin-bottom:8px;">
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
                   style="display:block; text-align:center; padding:10px;
                          font-size:0.85rem; border-radius:4px;
                          width:100%; box-sizing:border-box;">
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