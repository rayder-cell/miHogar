@extends('layouts.app-public')
@section('titulo', 'Buscar Proyectos')

@section('content')
<style>
    .buscar-hero {
        background: var(--color-dark);
        padding: 40px 20px 30px;
        border-bottom: 2px solid var(--color-gold);
    }
    .buscar-form {
        max-width: 900px;
        margin: 0 auto;
    }
    .buscar-form h1 {
        color: var(--color-gold);
        font-size: clamp(1.4rem, 4vw, 2rem);
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 20px;
        text-align: center;
    }
    .buscar-inputs {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }
    .buscar-inputs input,
    .buscar-inputs select {
        padding: 12px 16px;
        border: 2px solid #333;
        border-radius: 8px;
        font-size: 0.9rem;
        background: #111 !important;
        color: #fff !important;
        outline: none;
        transition: border-color 0.2s;
    }
    .buscar-inputs input::placeholder { color: #888 !important; }
    .buscar-inputs input:focus,
    .buscar-inputs select:focus { border-color: var(--color-gold); }
    .buscar-inputs input[name="q"] { flex: 2; min-width: 200px; }
    .buscar-inputs select { flex: 1; min-width: 150px; }
    .buscar-inputs input[name="precio_min"],
    .buscar-inputs input[name="precio_max"] { flex: 1; min-width: 130px; }
    .btn-buscar {
        background: var(--color-gold);
        color: #000;
        border: none;
        padding: 12px 28px;
        border-radius: 8px;
        font-weight: 900;
        font-size: 0.95rem;
        cursor: pointer;
        text-transform: uppercase;
        letter-spacing: 1px;
        white-space: nowrap;
    }
    .btn-buscar:hover { background: #b8962a; }

    /* RESULTADOS */
    .buscar-resultados {
        max-width: 1100px;
        margin: 30px auto;
        padding: 0 20px;
    }
    .resultados-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        flex-wrap: wrap;
        gap: 10px;
    }
    .resultados-header p {
        color: #888;
        font-size: 0.9rem;
    }
    .resultados-header span {
        color: var(--color-gold);
        font-weight: bold;
    }
    .proyectos-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 25px;
    }
    .proyecto-card {
        background: #111;
        border-radius: 10px;
        overflow: hidden;
        border: 1px solid #222;
        transition: transform 0.2s, border-color 0.2s;
        text-decoration: none;
    }
    .proyecto-card:hover {
        transform: translateY(-4px);
        border-color: var(--color-gold);
    }
    .proyecto-card-img {
        height: 180px;
        overflow: hidden;
        position: relative;
    }
    .proyecto-card-img img {
        width: 100%; height: 100%;
        object-fit: cover;
    }
    .proyecto-card-img .sin-foto {
        width: 100%; height: 100%;
        background: #1a1a1a;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
    }
    .proyecto-card-badge {
        position: absolute;
        top: 8px; left: 8px;
        background: var(--color-gold);
        color: #000;
        font-size: 0.7rem;
        font-weight: 900;
        padding: 3px 10px;
        border-radius: 20px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    .proyecto-card-body { padding: 15px; }
    .proyecto-card-body h3 {
        color: #fff;
        font-size: 0.95rem;
        font-weight: 900;
        text-transform: uppercase;
        margin-bottom: 6px;
        line-height: 1.3;
    }
    .proyecto-card-body .direccion {
        color: #888;
        font-size: 0.8rem;
        margin-bottom: 8px;
    }
    .proyecto-card-body .precio {
        color: var(--color-gold);
        font-weight: bold;
        font-size: 1rem;
    }
    .sin-resultados {
        text-align: center;
        padding: 60px 20px;
        color: #555;
    }
    .sin-resultados p { font-size: 1.1rem; margin-bottom: 15px; }

    @media (max-width: 600px) {
        .buscar-inputs { flex-direction: column; }
        .buscar-inputs input,
        .buscar-inputs select,
        .btn-buscar { width: 100%; }
    }
</style>

<!-- BUSCADOR -->
<div class="buscar-hero">
    <div class="buscar-form">
        <h1>🔍 Buscar Terrenos</h1>
        <form method="GET" action="{{ route('buscar') }}">
            <div class="buscar-inputs">
                <input type="text" name="q"
                    placeholder="Nombre del proyecto o dirección..."
                    value="{{ request('q') }}">

                <select name="distrito">
                    <option value="">Todos los distritos</option>
                    @foreach($distritos as $d)
                        <option value="{{ $d }}" {{ request('distrito') == $d ? 'selected' : '' }}>
                            {{ strtoupper($d) }}
                        </option>
                    @endforeach
                </select>

                <input type="number" name="precio_min"
                    placeholder="Precio mín. S/."
                    value="{{ request('precio_min') }}">

                <input type="number" name="precio_max"
                    placeholder="Precio máx. S/."
                    value="{{ request('precio_max') }}">

                <button type="submit" class="btn-buscar">Buscar</button>
            </div>
        </form>
    </div>
</div>

<!-- RESULTADOS -->
<div class="buscar-resultados">
    <div class="resultados-header">
        <p>
            Se encontraron <span>{{ $proyectos->count() }}</span>
            {{ $proyectos->count() == 1 ? 'terreno' : 'terrenos' }}
            @if(request('q')) para "<span>{{ request('q') }}</span>"@endif
            @if(request('distrito')) en <span>{{ strtoupper(request('distrito')) }}</span>@endif
        </p>
        @if(request()->anyFilled(['q','distrito','precio_min','precio_max']))
            <a href="{{ route('buscar') }}" style="color:#888; font-size:0.85rem; text-decoration:none;">
                ✕ Limpiar filtros
            </a>
        @endif
    </div>

    @if($proyectos->count() > 0)
        <div class="proyectos-grid">
            @foreach($proyectos as $p)
                <a href="{{ route('proyectos.show', $p->id_proyecto) }}" class="proyecto-card">
                    <div class="proyecto-card-img">
                        @if($p->fotos)
                            <img src="{{ $p->fotos }}" alt="{{ $p->nombre_proyecto }}">
                        @else
                            <div class="sin-foto">🏠</div>
                        @endif
                        <span class="proyecto-card-badge">{{ $p->distrito }}</span>
                    </div>
                    <div class="proyecto-card-body">
                        <h3>{{ $p->nombre_proyecto }}</h3>
                        <p class="direccion">📍 {{ $p->direccion }}</p>
                        @if($p->precio)
                            <p class="precio">S/. {{ number_format($p->precio, 0, '.', ',') }}</p>
                        @else
                            <p style="color:#555; font-size:0.85rem;">Precio a consultar</p>
                        @endif
                    </div>
                </a>
            @endforeach
        </div>
    @else
        <div class="sin-resultados">
            <p style="font-size:3rem;">🔍</p>
            <p>No se encontraron terrenos con esos criterios.</p>
            <a href="{{ route('buscar') }}" class="btn-gold">Ver todos los proyectos</a>
        </div>
    @endif
</div>
@endsection