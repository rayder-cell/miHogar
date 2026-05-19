@extends('layouts.admin')
@section('titulo', 'Dashboard')

@section('content')

<style>
    .stat-card {
        background: #fff;
        border-radius: 16px;
        padding: 22px 25px;
        flex: 1;
        min-width: 160px;
        display: flex;
        align-items: center;
        gap: 15px;
        box-shadow: 0 2px 12px rgba(0,0,0,0.07);
        border-left: 4px solid transparent;
        transition: transform 0.2s, box-shadow 0.2s;
    }
    .stat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(0,0,0,0.12);
    }
    .stat-icon {
        border-radius: 12px;
        padding: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.6rem;
        min-width: 52px;
        min-height: 52px;
    }
    .stat-number {
        font-size: 2rem;
        font-weight: 900;
        color: #1a1a1a;
        line-height: 1;
    }
    .stat-label {
        color: #888;
        font-size: 0.82rem;
        margin-top: 4px;
    }
    .card {
        background: #fff;
        border-radius: 16px;
        padding: 25px;
        box-shadow: 0 2px 12px rgba(0,0,0,0.07);
    }
    .card-title {
        font-size: 1rem;
        font-weight: 700;
        color: #1a1a1a;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .badge-distrito {
        background: #fef9e7;
        color: #b8860b;
        padding: 3px 10px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        border: 1px solid #f0d060;
    }
    .btn-nuevo {
        background: linear-gradient(135deg, #c9a84c, #e8c96a);
        color: #000;
        padding: 8px 18px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 0.82rem;
        font-weight: 700;
        letter-spacing: 0.5px;
        transition: opacity 0.2s;
    }
    .btn-nuevo:hover { opacity: 0.85; }
    .quick-card {
        flex: 1;
        min-width: 140px;
        background: #fff;
        border-radius: 16px;
        padding: 28px 20px;
        text-align: center;
        text-decoration: none;
        box-shadow: 0 2px 12px rgba(0,0,0,0.07);
        transition: transform 0.2s, box-shadow 0.2s;
        border-bottom: 3px solid transparent;
    }
    .quick-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 24px rgba(0,0,0,0.13);
        border-bottom-color: #c9a84c;
    }
    .quick-icon {
        width: 56px;
        height: 56px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.6rem;
        margin: 0 auto 12px;
    }
    .quick-label {
        color: #333;
        font-weight: 700;
        font-size: 0.88rem;
    }
    .quick-sublabel {
        color: #aaa;
        font-size: 0.75rem;
        margin-top: 4px;
    }
    table { width: 100%; border-collapse: collapse; }
    thead th {
        text-align: left;
        padding: 10px 8px;
        font-size: 0.72rem;
        color: #aaa;
        text-transform: uppercase;
        font-weight: 700;
        letter-spacing: 0.5px;
        border-bottom: 2px solid #f5f5f5;
    }
    tbody tr { border-bottom: 1px solid #f9f9f9; transition: background 0.15s; }
    tbody tr:hover { background: #fdfaf3; }
    tbody td { padding: 13px 8px; }
</style>

<!-- ENCABEZADO -->
<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:25px; flex-wrap:wrap; gap:10px;">
    <div>
        <h1 style="font-size:1.5rem; font-weight:900; color:#1a1a1a; margin:0;">Dashboard</h1>
        <p style="color:#aaa; font-size:0.85rem; margin:4px 0 0;">Panel de administración</p>
    </div>
    <div style="background:#fff; border-radius:10px; padding:8px 16px; box-shadow:0 2px 8px rgba(0,0,0,0.06); color:#666; font-size:0.85rem;">
        📅 {{ now()->format('d M Y') }}
    </div>
</div>

<!-- ESTADÍSTICAS -->
<div style="display:flex; gap:16px; flex-wrap:wrap; margin-bottom:24px;">

    <div class="stat-card" style="border-left-color:#c9a84c;">
        <div class="stat-icon" style="background:#fef9e7;">🏗️</div>
        <div>
            <div class="stat-number">{{ $totalProyectos }}</div>
            <div class="stat-label">Proyectos totales</div>
        </div>
    </div>

    <div class="stat-card" style="border-left-color:#22c55e;">
        <div class="stat-icon" style="background:#f0fdf4;">✅</div>
        <div>
            <div class="stat-number">{{ $totalProyectos }}</div>
            <div class="stat-label">Disponibles</div>
        </div>
    </div>

    <div class="stat-card" style="border-left-color:#3b82f6;">
        <div class="stat-icon" style="background:#eff6ff;">👥</div>
        <div>
            <div class="stat-number">{{ $totalAsesores }}</div>
            <div class="stat-label">Asesores activos</div>
        </div>
    </div>

    <div class="stat-card" style="border-left-color:#a855f7;">
        <div class="stat-icon" style="background:#faf5ff;">📋</div>
        <div>
            <div class="stat-number">0</div>
            <div class="stat-label">Contactos</div>
        </div>
    </div>

</div>

<!-- TABLAS -->
<div style="display:flex; gap:20px; flex-wrap:wrap; margin-bottom:24px;">

    <!-- ÚLTIMOS PROYECTOS -->
    <div class="card" style="flex:2; min-width:300px;">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
            <div class="card-title">
                <span style="background:#fef9e7; padding:6px 8px; border-radius:8px;">🏠</span>
                Últimos proyectos
            </div>
            <a href="{{ route('admin.proyectos.create') }}" class="btn-nuevo">+ Nuevo</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Proyecto</th>
                    <th>Distrito</th>
                    <th>Precio</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($ultimosProyectos as $proyecto)
                <tr>
                    <td style="font-size:0.88rem; color:#333; font-weight:600;">{{ $proyecto->nombre_proyecto }}</td>
                    <td><span class="badge-distrito">{{ $proyecto->distrito }}</span></td>
                    <td style="font-size:0.85rem; color:#666;">
                        {{ $proyecto->precio ? 'S/. '.number_format($proyecto->precio, 0, '.', ',') : '—' }}
                    </td>
                    <td>
                        <a href="{{ route('admin.proyectos.edit', $proyecto->id_proyecto) }}"
                           style="color:#c9a84c; font-size:0.82rem; text-decoration:none; font-weight:700; background:#fef9e7; padding:4px 10px; border-radius:6px;">
                            Editar →
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" style="padding:30px; text-align:center; color:#ccc; font-size:0.85rem;">
                        No hay proyectos registrados.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- ÚLTIMOS CONTACTOS -->
    <div class="card" style="flex:1; min-width:250px;">
        <div class="card-title">
            <span style="background:#faf5ff; padding:6px 8px; border-radius:8px;">📩</span>
            Últimos contactos
        </div>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="2" style="padding:40px; text-align:center; color:#ccc; font-size:0.85rem;">
                        Sin contactos aún
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>

<!-- ACCESOS RÁPIDOS -->
<div style="margin-bottom:8px;">
    <p style="color:#aaa; font-size:0.78rem; font-weight:700; text-transform:uppercase; letter-spacing:1px; margin-bottom:14px;">Accesos rápidos</p>
    <div style="display:flex; gap:16px; flex-wrap:wrap;">

        <a href="{{ route('admin.proyectos.create') }}" class="quick-card">
            <div class="quick-icon" style="background:#fef9e7;">🏗️</div>
            <div class="quick-label">Nuevo Proyecto</div>
            <div class="quick-sublabel">Agregar al catálogo</div>
        </a>

        <a href="{{ route('admin.asesores.create') }}" class="quick-card">
            <div class="quick-icon" style="background:#eff6ff;">👥</div>
            <div class="quick-label">Nuevo Asesor</div>
            <div class="quick-sublabel">Registrar asesor</div>
        </a>

        <a href="{{ url('/') }}" target="_blank" class="quick-card">
            <div class="quick-icon" style="background:#f0fdf4;">🌐</div>
            <div class="quick-label">Ver Sitio Web</div>
            <div class="quick-sublabel">Vista pública</div>
        </a>

        <a href="{{ route('admin.proyectos.index') }}" class="quick-card">
            <div class="quick-icon" style="background:#faf5ff;">⚙️</div>
            <div class="quick-label">Gestionar</div>
            <div class="quick-sublabel">Todos los proyectos</div>
        </a>

    </div>
</div>

@endsection