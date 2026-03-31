@extends('layouts.admin')
@section('titulo', 'Proyectos')

@section('content')
<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
    <h2 style="color:#333;">Lista de Proyectos</h2>
    <a href="{{ route('admin.proyectos.create') }}" class="btn-gold">+ Nuevo Proyecto</a>
</div>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Distrito</th>
            <th>Dirección</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($proyectos as $proyecto)
        <tr>
            <td>{{ $proyecto->id_proyecto }}</td>
            <td>{{ $proyecto->nombre_proyecto }}</td>
            <td>{{ $proyecto->distrito }}</td>
            <td>{{ $proyecto->direccion }}</td>
            <td style="display:flex; gap:8px;">
                <a href="{{ route('admin.proyectos.edit', $proyecto->id_proyecto) }}" class="btn-secondary">✏️ Editar</a>
                <form method="POST" action="{{ route('admin.proyectos.destroy', $proyecto->id_proyecto) }}"
                      onsubmit="return confirm('¿Estás seguro de eliminar este proyecto?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-danger">🗑️ Eliminar</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" style="text-align:center; color:#aaa; padding:30px;">No hay proyectos registrados.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection