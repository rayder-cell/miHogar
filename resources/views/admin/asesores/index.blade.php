@extends('layouts.admin')
@section('titulo', 'Asesores')

@section('content')
<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
    <h2 style="color:#333;">Lista de Asesores</h2>
    <a href="{{ route('admin.asesores.create') }}" class="btn-gold">+ Nuevo Asesor</a>
</div>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Contacto</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($asesores as $asesor)
        <tr>
            <td>{{ $asesor->id_asesor }}</td>
            <td>
                @if($asesor->foto)
                <img src="{{ asset($asesor->foto) }}" style="width:45px; height:45px; border-radius:50%; object-fit:cover; border:2px solid #c9a84c;">
                @else
                <div style="width:45px; height:45px; border-radius:50%; background:#333; display:flex; align-items:center; justify-content:center; border:2px solid #c9a84c;">
                    <span>👤</span>
                </div>
                @endif
            </td>
            <td>{{ $asesor->nombre }}</td>
            <td>{{ $asesor->contacto }}</td>
            <td style="display:flex; gap:8px;">
                <a href="{{ route('admin.asesores.edit', $asesor->id_asesor) }}" class="btn-secondary">✏️ Editar</a>
                <form method="POST" action="{{ route('admin.asesores.destroy', $asesor->id_asesor) }}"
                      onsubmit="return confirm('¿Eliminar este asesor?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-danger">🗑️ Eliminar</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" style="text-align:center; color:#aaa; padding:30px;">No hay asesores registrados.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection