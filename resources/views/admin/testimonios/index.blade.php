@extends('layouts.admin')
@section('titulo', 'Testimonios')

@section('content')
<div class="card">
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
        <h2 style="color:#c9a84c;">Testimonios</h2>
        <a href="{{ route('admin.testimonios.create') }}" class="btn-gold">+ Nuevo Testimonio</a>
    </div>

    @if(session('success'))
        <div style="background:#d4edda; color:#155724; padding:10px 15px; border-radius:8px; margin-bottom:15px;">
            ✅ {{ session('success') }}
        </div>
    @endif

    <table style="width:100%; border-collapse:collapse;">
        <thead>
            <tr style="background:#1a1a1a; color:#c9a84c;">
                <th style="padding:12px; text-align:left;">Foto</th>
                <th style="padding:12px; text-align:left;">Nombre</th>
                <th style="padding:12px; text-align:left;">Ubicación</th>
                <th style="padding:12px; text-align:left;">Título</th>
                <th style="padding:12px; text-align:left;">Activo</th>
                <th style="padding:12px; text-align:left;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($testimonios as $t)
            <tr style="border-bottom:1px solid #333;">
                <td style="padding:12px;">
                    @if($t->foto)
                        <img src="{{ $t->foto }}" style="width:50px; height:50px; border-radius:50%; object-fit:cover;">
                    @else
                        <span style="font-size:2rem;">👤</span>
                    @endif
                </td>
                <td style="padding:12px; color:#000000;">{{ $t->nombre }}</td>
                <td style="padding:12px; color:#000000;">{{ $t->ubicacion }}</td>
                <td style="padding:12px; color:#000000;">{{ Str::limit($t->titulo, 40) }}</td>
                <td style="padding:12px;">
                    <span style="background:{{ $t->activo ? '#28a745' : '#dc3545' }}; color:#fff; padding:3px 10px; border-radius:20px; font-size:0.75rem;">
                        {{ $t->activo ? 'Activo' : 'Inactivo' }}
                    </span>
                </td>
                <td style="padding:12px; display:flex; gap:8px;">
                    <a href="{{ route('admin.testimonios.edit', $t->id_testimonio) }}" class="btn-gold" style="padding:6px 12px; font-size:0.8rem;">✏️ Editar</a>
                    <form method="POST" action="{{ route('admin.testimonios.destroy', $t->id_testimonio) }}"
                          onsubmit="return confirm('¿Eliminar este testimonio?')">
                        @csrf @method('DELETE')
                        <button type="submit" style="background:#dc3545; color:#fff; border:none; padding:6px 12px; border-radius:4px; cursor:pointer; font-size:0.8rem;">
                            🗑️ Eliminar
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="padding:20px; text-align:center; color:#888;">No hay testimonios registrados.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection