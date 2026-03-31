@extends('layouts.admin')
@section('titulo', 'Nuevo Asesor')

@section('content')
<div class="card">
    <form method="POST" action="{{ route('admin.asesores.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>Nombre *</label>
            <input type="text" name="nombre" value="{{ old('nombre') }}" required>
        </div>

        <div class="form-group">
            <label>Contacto (WhatsApp) *</label>
            <input type="text" name="contacto" value="{{ old('contacto') }}" placeholder="51912345678" required>
            <small style="color:#888;">Incluye el código de país, ej: 51912345678</small>
        </div>

        <div class="form-group">
            <label>Foto del Asesor</label>
            <input type="file" name="foto" accept="image/*">
        </div>

        <div style="display:flex; gap:10px; margin-top:10px;">
            <button type="submit" class="btn-gold">💾 Guardar Asesor</button>
            <a href="{{ route('admin.asesores.index') }}" class="btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection