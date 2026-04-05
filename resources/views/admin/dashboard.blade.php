@extends('layouts.admin')
@section('titulo', 'Dashboard')

@section('content')

<!-- ESTADÍSTICAS -->
<div style="display:flex; gap:20px; flex-wrap:wrap; margin-bottom:25px;">

    <div style="background:#fff; border-radius:12px; padding:20px 25px; flex:1; min-width:160px; display:flex; align-items:center; gap:15px; box-shadow:0 2px 8px rgba(0,0,0,0.06);">
        <div style="background:#fff3e0; border-radius:10px; padding:12px;">
            <span style="font-size:1.8rem;">🏗️</span>
        </div>
        <div>
            <div style="font-size:2rem; font-weight:900; color:#333;">{{ $totalProyectos }}</div>
            <div style="color:#888; font-size:0.85rem;">Proyectos totales</div>
        </div>
    </div>

    <div style="background:#fff; border-radius:12px; padding:20px 25px; flex:1; min-width:160px; display:flex; align-items:center; gap:15px; box-shadow:0 2px 8px rgba(0,0,0,0.06);">
        <div style="background:#e8f5e9; border-radius:10px; padding:12px;">
            <span style="font-size:1.8rem;">✅</span>
        </div>
        <div>
            <div style="font-size:2rem; font-weight:900; color:#333;">{{ $totalProyectos }}</div>
            <div style="color:#888; font-size:0.85rem;">Disponibles</div>
        </div>
    </div>

    <div style="background:#fff; border-radius:12px; padding:20px 25px; flex:1; min-width:160px; display:flex; align-items:center; gap:15px; box-shadow:0 2px 8px rgba(0,0,0,0.06);">
        <div style="background:#e3f2fd; border-radius:10px; padding:12px;">
            <span style="font-size:1.8rem;">👥</span>
        </div>
        <div>
            <div style="font-size:2rem; font-weight:900; color:#333;">{{ $totalAsesores }}</div>
            <div style="color:#888; font-size:0.85rem;">Asesores activos</div>
        </div>
    </div>

    <div style="background:#fff; border-radius:12px; padding:20px 25px; flex:1; min-width:160px; display:flex; align-items:center; gap:15px; box-shadow:0 2px 8px rgba(0,0,0,0.06);">
        <div style="background:#f3e5f5; border-radius:10px; padding:12px;">
            <span style="font-size:1.8rem;">📋</span>
        </div>
        <div>
            <div style="font-size:2rem; font-weight:900; color:#333;">0</div>
            <div style="color:#888; font-size:0.85rem;">Contactos</div>
        </div>
    </div>

</div>

<!-- CONTENIDO PRINCIPAL -->
<div style="display:flex; gap:20px; flex-wrap:wrap; margin-bottom:25px;">

    <!-- ÚLTIMOS PROYECTOS -->
    <div style="flex:2; min-width:300px; background:#fff; border-radius:12px; padding:25px; box-shadow:0 2px 8px rgba(0,0,0,0.06);">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
            <h2 style="font-size:1rem; font-weight:700; color:#333;">🏠 Últimos proyectos</h2>
            <a href="{{ route('admin.proyectos.create') }}"
               style="background:#1a56db; color:#fff; padding:7px 16px; border-radius:6px; text-decoration:none; font-size:0.85rem; font-weight:bold;">
                + Nuevo
            </a>
        </div>

        <table style="width:100%; border-collapse:collapse;">
            <thead>
                <tr style="border-bottom:1px solid #f0f0f0;">
                    <th style="text-align:left; padding:10px 8px; font-size:0.75rem; color:#999; text-transform:uppercase; font-weight:600;">Proyecto</th>
                    <th style="text-align:left; padding:10px 8px; font-size:0.75rem; color:#999; text-transform:uppercase; font-weight:600;">Distrito</th>
                    <th style="text-align:left; padding:10px 8px; font-size:0.75rem; color:#999; text-transform:uppercase; font-weight:600;">Precio</th>
                    <th style="text-align:left; padding:10px 8px; font-size:0.75rem; color:#999; text-transform:uppercase; font-weight:600;"></th>
                </tr>
            </thead>
            <tbody>
                @forelse($ultimosProyectos as $proyecto)
                <tr style="border-bottom:1px solid #f9f9f9;">
                    <td style="padding:12px 8px; font-size:0.9rem; color:#333; font-weight:500;">{{ $proyecto->nombre_proyecto }}</td>
                    <td style="padding:12px 8px;">
                        <span style="background:#e8f0fe; color:#1a56db; padding:3px 10px; border-radius:20px; font-size:0.75rem; font-weight:600;">
                            {{ $proyecto->distrito }}
                        </span>
                    </td>
                    <td style="padding:12px 8px; font-size:0.85rem; color:#555;">
                        {{ $proyecto->precio ? 'S/. '.number_format($proyecto->precio, 0, '.', ',') : '-' }}
                    </td>
                    <td style="padding:12px 8px;">
                        <a href="{{ route('admin.proyectos.edit', $proyecto->id_proyecto) }}"
                           style="color:#1a56db; font-size:0.85rem; text-decoration:none; font-weight:500;">
                            Editar
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" style="padding:20px; text-align:center; color:#aaa;">No hay proyectos registrados.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- ÚLTIMOS CONTACTOS -->
    <div style="flex:1; min-width:250px; background:#fff; border-radius:12px; padding:25px; box-shadow:0 2px 8px rgba(0,0,0,0.06);">
        <h2 style="font-size:1rem; font-weight:700; color:#333; margin-bottom:20px;">📩 Últimos contactos</h2>
        <table style="width:100%; border-collapse:collapse;">
            <thead>
                <tr style="border-bottom:1px solid #f0f0f0;">
                    <th style="text-align:left; padding:10px 8px; font-size:0.75rem; color:#999; text-transform:uppercase;">Nombre</th>
                    <th style="text-align:left; padding:10px 8px; font-size:0.75rem; color:#999; text-transform:uppercase;">Correo</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="2" style="padding:30px; text-align:center; color:#aaa; font-size:0.85rem;">Sin contactos aún</td>
                </tr>
            </tbody>
        </table>
    </div>

</div>

<!-- ACCESOS RÁPIDOS -->
<div style="display:flex; gap:20px; flex-wrap:wrap;">

    <a href="{{ route('admin.proyectos.create') }}"
       style="flex:1; min-width:150px; background:#fff; border-radius:12px; padding:30px 20px; text-align:center; text-decoration:none; box-shadow:0 2px 8px rgba(0,0,0,0.06); transition:box-shadow 0.2s;"
       onmouseover="this.style.boxShadow='0 4px 16px rgba(0,0,0,0.12)'"
       onmouseout="this.style.boxShadow='0 2px 8px rgba(0,0,0,0.06)'">
        <div style="font-size:2.5rem; margin-bottom:10px;">🏗️</div>
        <div style="color:#333; font-weight:600; font-size:0.9rem;">Nuevo Proyecto</div>
    </a>

    <a href="{{ route('admin.asesores.create') }}"
       style="flex:1; min-width:150px; background:#fff; border-radius:12px; padding:30px 20px; text-align:center; text-decoration:none; box-shadow:0 2px 8px rgba(0,0,0,0.06); transition:box-shadow 0.2s;"
       onmouseover="this.style.boxShadow='0 4px 16px rgba(0,0,0,0.12)'"
       onmouseout="this.style.boxShadow='0 2px 8px rgba(0,0,0,0.06)'">
        <div style="font-size:2.5rem; margin-bottom:10px;">👥</div>
        <div style="color:#333; font-weight:600; font-size:0.9rem;">Nuevo Asesor</div>
    </a>

    <a href="{{ url('/') }}" target="_blank"
       style="flex:1; min-width:150px; background:#fff; border-radius:12px; padding:30px 20px; text-align:center; text-decoration:none; box-shadow:0 2px 8px rgba(0,0,0,0.06); transition:box-shadow 0.2s;"
       onmouseover="this.style.boxShadow='0 4px 16px rgba(0,0,0,0.12)'"
       onmouseout="this.style.boxShadow='0 2px 8px rgba(0,0,0,0.06)'">
        <div style="font-size:2.5rem; margin-bottom:10px;">🌐</div>
        <div style="color:#333; font-weight:600; font-size:0.9rem;">Ver Sitio Web</div>
    </a>

    <a href="{{ route('admin.proyectos.index') }}"
       style="flex:1; min-width:150px; background:#fff; border-radius:12px; padding:30px 20px; text-align:center; text-decoration:none; box-shadow:0 2px 8px rgba(0,0,0,0.06); transition:box-shadow 0.2s;"
       onmouseover="this.style.boxShadow='0 4px 16px rgba(0,0,0,0.12)'"
       onmouseout="this.style.boxShadow='0 2px 8px rgba(0,0,0,0.06)'">
        <div style="font-size:2.5rem; margin-bottom:10px;">⚙️</div>
        <div style="color:#333; font-weight:600; font-size:0.9rem;">Gestionar</div>
    </a>

</div>

@endsection