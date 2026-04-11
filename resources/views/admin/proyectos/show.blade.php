@extends('layouts.admin')

@section('content')
<div style="max-width:900px; margin:40px auto; padding:0 20px;">

    <h1 style="color:#c9a84c; font-size:1.8rem; font-weight:900; margin-bottom:20px;">
        {{ $proyecto->nombre_proyecto }}
    </h1>

    @if($proyecto->fotos)
    <div style="margin-bottom:20px;">
        <img src="{{ $proyecto->fotos }}" style="width:100%; max-height:400px; object-fit:cover; border-radius:8px;">
    </div>
    @endif

    <div style="background:#f9f9f9; padding:20px; border-radius:8px; margin-bottom:20px;">
        <p><strong>Distrito:</strong> {{ $proyecto->distrito }}</p>
        <p><strong>Dirección:</strong> {{ $proyecto->direccion }}</p>
        <p><strong>Precio:</strong> S/. {{ number_format($proyecto->precio, 0, '.', ',') }}</p>
        <p><strong>Descripción:</strong> {{ $proyecto->descripcion }}</p>
    </div>

    <div style="display:flex; gap:10px;">
        <a href="{{ route('admin.proyectos.edit', $proyecto->id_proyecto) }}"
           style="background:#c9a84c; color:#000; padding:10px 20px; text-decoration:none; font-weight:bold; border-radius:6px;">
            ✏️ Editar
        </a>
        <a href="{{ route('admin.proyectos.index') }}"
           style="background:#333; color:#fff; padding:10px 20px; text-decoration:none; font-weight:bold; border-radius:6px;">
            ← Volver
        </a>
    </div>
</div>
@endsection