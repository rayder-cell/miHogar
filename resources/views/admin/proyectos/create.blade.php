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

            <!-- FOTO DEL PROYECTO -->
            <div class="form-group">
                <label>Foto del Proyecto</label>
                <input type="file" id="foto_input" accept="image/*">
                <small style="color:#888;">Formatos: jpg, jpeg, png, webp. Sin límite de tamaño.</small>

                <!-- Preview -->
                <div id="preview_container" style="margin-top:10px; display:none;">
                    <img id="foto_preview" style="height:150px; border:2px solid #c9a84c;">
                    <p id="upload_status" style="color:#c9a84c; font-size:0.85rem; margin-top:5px;"></p>
                </div>

                <!-- Input oculto que guarda la URL de Cloudinary -->
                <input type="hidden" name="fotos" id="fotos_url">
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

    <script>
        const CLOUDINARY_CLOUD_NAME = '{{ env('CLOUDINARY_CLOUD_NAME') }}';
        const CLOUDINARY_UPLOAD_PRESET = '{{ env('CLOUDINARY_UPLOAD_PRESET') }}';

        document.getElementById('foto_input').addEventListener('change', async function(e) {
            const file = e.target.files[0];
            if (!file) return;

            // Mostrar preview
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('foto_preview').src = e.target.result;
                document.getElementById('preview_container').style.display = 'block';
            };
            reader.readAsDataURL(file);

            // Subir a Cloudinary
            document.getElementById('upload_status').textContent = '⏳ Subiendo imagen...';

            const formData = new FormData();
            formData.append('file', file);
            formData.append('upload_preset', CLOUDINARY_UPLOAD_PRESET);
            formData.append('folder', 'mihogar/proyectos');

            try {
                const response = await fetch(
                    `https://api.cloudinary.com/v1_1/${CLOUDINARY_CLOUD_NAME}/image/upload`, {
                        method: 'POST',
                        body: formData
                    }
                );

                const data = await response.json();

                if (data.secure_url) {
                    document.getElementById('fotos_url').value = data.secure_url;
                    document.getElementById('upload_status').textContent = '✅ Imagen subida correctamente';
                    document.getElementById('upload_status').style.color = '#28a745';
                } else {
                    document.getElementById('upload_status').textContent = '❌ Error al subir la imagen';
                    document.getElementById('upload_status').style.color = '#dc3545';
                }
            } catch (error) {
                document.getElementById('upload_status').textContent = '❌ Error de conexión';
                document.getElementById('upload_status').style.color = '#dc3545';
            }
        });
    </script>
@endsection
