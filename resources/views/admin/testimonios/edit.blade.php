@extends('layouts.admin')
@section('titulo', 'Editar Testimonio')

@section('content')
    <div class="card">
        <h2 style="color:#c9a84c; margin-bottom:20px;">Editar Testimonio</h2>

        <form method="POST" action="{{ route('admin.testimonios.update', $testimonio->id_testimonio) }}">
            @csrf @method('PUT')

            <div class="form-group">
                <label>Nombre *</label>
                <input type="text" name="nombre" value="{{ old('nombre', $testimonio->nombre) }}" required>
            </div>

            <div style="display:flex; gap:20px; flex-wrap:wrap;">
                <div class="form-group" style="flex:1; min-width:200px;">
                    <label>Ubicación</label>
                    <input type="text" name="ubicacion" value="{{ old('ubicacion', $testimonio->ubicacion) }}"
                        placeholder="Ej: Andahuaylas">
                </div>
                <div class="form-group" style="flex:1; min-width:200px;">
                    <label>Título / Frase</label>
                    <input type="text" name="titulo" value="{{ old('titulo', $testimonio->titulo) }}"
                        placeholder='Ej: "Un hogar pensando en el futuro"'>
                </div>
            </div>

            <div class="form-group">
                <label>Comentario</label>
                <textarea name="comentario" rows="4">{{ old('comentario', $testimonio->comentario) }}</textarea>
            </div>

            <!-- FOTO -->
            <div class="form-group">
                <label>Foto del Cliente</label>
                @if ($testimonio->foto)
                    <div style="margin-bottom:10px;">
                        <img id="foto_preview" src="{{ $testimonio->foto }}"
                            style="height:80px; width:80px; border-radius:50%; object-fit:cover; border:2px solid #c9a84c; display:block;">
                        <p style="color:#888; font-size:0.8rem; margin-top:5px;">Foto actual</p>
                    </div>
                @else
                    <div style="margin-bottom:10px; display:none;" id="preview_container">
                        <img id="foto_preview"
                            style="height:80px; width:80px; border-radius:50%; object-fit:cover; border:2px solid #c9a84c; display:block;">
                    </div>
                @endif
                <input type="file" id="foto_input" accept="image/*">
                <small style="color:#888;">Selecciona una nueva foto para reemplazar la actual</small>
                <p id="upload_status" style="font-size:0.85rem; margin-top:5px;"></p>
                <input type="hidden" name="foto" id="foto_url" value="{{ $testimonio->foto }}">
            </div>

            <!-- ACTIVO -->
            <div class="form-group">
                <label>Estado</label>
                <select name="activo"
                    style="width:100%; padding:10px 14px; border:1px solid #333; border-radius:8px; background:#1a1a1a; color:#fff; font-size:0.9rem; outline:none;">
                    <option value="1" {{ old('activo', $testimonio->activo ?? '1') == '1' ? 'selected' : '' }}>✅ Activo
                        - Visible en la página</option>
                    <option value="0" {{ old('activo', $testimonio->activo ?? '1') == '0' ? 'selected' : '' }}>❌
                        Inactivo - No visible</option>
                </select>
            </div>

            <div style="display:flex; gap:10px; margin-top:20px; flex-wrap:wrap;">
                <button type="submit" class="btn-gold">💾 Actualizar Testimonio</button>
                <a href="{{ route('admin.testimonios.index') }}" class="btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>

    <script>
        const CLOUDINARY_CLOUD_NAME = '{{ env('CLOUDINARY_CLOUD_NAME') }}';
        const CLOUDINARY_UPLOAD_PRESET = '{{ env('CLOUDINARY_UPLOAD_PRESET') }}';

        document.getElementById('foto_input').addEventListener('change', async function(e) {
            const file = e.target.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('foto_preview').src = e.target.result;
                document.getElementById('foto_preview').style.display = 'block';
            };
            reader.readAsDataURL(file);

            document.getElementById('upload_status').textContent = '⏳ Subiendo imagen...';
            document.getElementById('upload_status').style.color = '#c9a84c';

            const formData = new FormData();
            formData.append('file', file);
            formData.append('upload_preset', CLOUDINARY_UPLOAD_PRESET);
            formData.append('folder', 'mihogar/testimonios');

            try {
                const response = await fetch(
                    `https://api.cloudinary.com/v1_1/${CLOUDINARY_CLOUD_NAME}/image/upload`, {
                        method: 'POST',
                        body: formData
                    }
                );
                const data = await response.json();
                if (data.secure_url) {
                    document.getElementById('foto_url').value = data.secure_url;
                    document.getElementById('upload_status').textContent = '✅ Imagen subida correctamente';
                    document.getElementById('upload_status').style.color = '#28a745';
                } else {
                    document.getElementById('upload_status').textContent = '❌ Error al subir';
                    document.getElementById('upload_status').style.color = '#dc3545';
                }
            } catch (error) {
                document.getElementById('upload_status').textContent = '❌ Error de conexión';
                document.getElementById('upload_status').style.color = '#dc3545';
            }
        });
    </script>
@endsection
