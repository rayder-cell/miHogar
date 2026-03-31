@extends('layouts.admin')
@section('titulo', 'Editar Asesor')

@section('content')
<div class="card">
    <form method="POST" action="{{ route('admin.asesores.update', $asesor->id_asesor) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nombre *</label>
            <input type="text" name="nombre" value="{{ old('nombre', $asesor->nombre) }}" required>
        </div>

        <div class="form-group">
            <label>Contacto (WhatsApp) *</label>
            <input type="text" name="contacto" value="{{ old('contacto', $asesor->contacto) }}" required>
        </div>

        <div class="form-group">
            <label>Foto del Asesor</label>
            @if($asesor->foto)
            <div style="margin-bottom:10px;">
                <img src="{{ asset($asesor->foto) }}" style="width:80px; height:80px; border-radius:50%; object-fit:cover; border:2px solid #c9a84c;">
                <p style="color:#888; font-size:0.8rem; margin-top:5px;">Foto actual</p>
            </div>
            @endif
            <input type="file" name="foto" accept="image/*">
            <small style="color:#888;">Deja vacío para mantener la foto actual</small>
        </div>

        <div style="display:flex; gap:10px; margin-top:10px;">
            <button type="submit" class="btn-gold">💾 Actualizar Asesor</button>
            <a href="{{ route('admin.asesores.index') }}" class="btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection