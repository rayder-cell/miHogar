@extends('layouts.admin')
@section('titulo', 'Nuevo Proyecto')

@section('content')
    <div class="card">
        <form method="POST" action="{{ route('admin.proyectos.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Nombre del Proyecto *</label>
                <input type="text" name="nombre_proyecto" value="{{ old('nombre_proyecto') }}" required>
                @error('nombre_proyecto')
                    <span style="color:red; font-size:0.8rem;">{{ $message }}</span>
                @enderror
            </div>

            <div style="display:flex; gap:20px;">
                <div class="form-group" style="flex:1;">
                    <label>Distrito *</label>
                    <input type="text" name="distrito" value="{{ old('distrito') }}" required>
                </div>
                <div class="form-group" style="flex:1;">
                    <label>Dirección *</label>
                    <input type="text" name="direccion" value="{{ old('direccion') }}" required>
                </div>
            </div>

            <div class="form-group">
                <label>Descripción</label>
                <textarea name="descripcion" rows="4">{{ old('descripcion') }}</textarea>
            </div>

            <div class="form-group">
                <label>Precio</label>
                <input type="text" name="precio" value="{{ old('precio') }}" placeholder="Ej: 150,000">
            </div>

            <div class="form-group">
                <label>Foto del Proyecto</label>
                <input type="file" name="foto" accept="image/*">
                <small style="color:#888;">Formatos: jpg, jpeg, webp, png. Máx 2MB</small>
            </div>

            <div class="form-group">
                <label>Link de Video (YouTube embed)</label>
                <input type="text" name="videos" value="{{ old('videos') }}"
                    placeholder="https://www.youtube.com/embed/...">
            </div>

            <div class="form-group">
                <label>Link de Google Maps (embed)</label>
                <input type="text" name="mapa" value="{{ old('mapa') }}"
                    placeholder="https://www.google.com/maps/embed?pb=...">
            </div>

            <div style="display:flex; gap:10px; margin-top:10px;">
                <button type="submit" class="btn-gold">💾 Guardar Proyecto</button>
                <a href="{{ route('admin.proyectos.index') }}" class="btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
