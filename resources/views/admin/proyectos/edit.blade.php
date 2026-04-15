@extends('layouts.admin')
@section('titulo', 'Editar Proyecto')

@section('content')
    <div class="card">
        <form method="POST" action="{{ route('admin.proyectos.update', $proyecto->id_proyecto) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nombre del Proyecto *</label>
                <input type="text" name="nombre_proyecto" value="{{ old('nombre_proyecto', $proyecto->nombre_proyecto) }}"
                    required>
                @error('nombre_proyecto')
                    <span style="color:red; font-size:0.8rem;">{{ $message }}</span>
                @enderror
            </div>

            <div style="display:flex; gap:20px;">
                <div class="form-group" style="flex:1;">
                    <label>Distrito *</label>
                    <select name="distrito" required>
                        <option value="">Selecciona un distrito</option>
                        <option value="Andahuaylas"
                            {{ old('distrito', $proyecto->distrito) == 'Andahuaylas' ? 'selected' : '' }}>Andahuaylas
                        </option>
                        <option value="San Jerónimo"
                            {{ old('distrito', $proyecto->distrito) == 'San Jerónimo' ? 'selected' : '' }}>San Jerónimo
                        </option>
                        <option value="Talavera" {{ old('distrito', $proyecto->distrito) == 'Talavera' ? 'selected' : '' }}>
                            Talavera</option>
                    </select>
                </div>
                <div class="form-group" style="flex:1;">
                    <label>Dirección *</label>
                    <input type="text" name="direccion" value="{{ old('direccion', $proyecto->direccion) }}" required>
                </div>
            </div>

            <div class="form-group">
                <label>Descripción</label>
                <textarea name="descripcion" rows="4">{{ old('descripcion', $proyecto->descripcion) }}</textarea>
            </div>

            <div class="form-group">
                <label>Precio</label>
                <input type="text" name="precio" value="{{ old('precio', $proyecto->precio) }}"
                    placeholder="Ej: 150,000">
            </div>

            <!-- FOTO DEL PROYECTO -->
            <div class="form-group">
                <label>Foto del Proyecto</label>

                <!-- Imagen actual -->
                @if ($proyecto->fotos)
                    <div style="margin-bottom:10px;">
                        <img id="foto_preview" src="{{ $proyecto->fotos }}" style="height:150px; border:2px solid #c9a84c;">
                        <p style="color:#888; font-size:0.8rem; margin-top:5px;">Imagen actual</p>
                    </div>
                @else
                    <div id="preview_container" style="margin-top:10px; display:none;">
                        <img id="foto_preview" style="height:150px; border:2px solid #c9a84c;">
                    </div>
                @endif

                <input type="file" id="foto_input" accept="image/*">
                <small style="color:#888;">Selecciona una nueva imagen para reemplazar la actual</small>
                <p id="upload_status" style="font-size:0.85rem; margin-top:5px;"></p>

                <!-- Input oculto con la URL de Cloudinary -->
                <input type="hidden" name="fotos" id="fotos_url" value="{{ $proyecto->fotos }}">
            </div>

            <div class="form-group">
                <label>Link de Video (YouTube)</label>
                <input type="text" name="videos" value="{{ old('videos', $proyecto->videos) }}"
                    placeholder="https://www.youtube.com/watch?v=...">
            </div>

            <div class="form-group">
                <label>Link de Google Maps (embed)</label>
                <input type="text" name="mapa" value="{{ old('mapa', $proyecto->mapa) }}"
                    placeholder="https://www.google.com/maps/embed?pb=...">
            </div>

            <div style="display:flex; gap:10px; margin-top:10px;">
                <button type="submit" class="btn-gold">💾 Actualizar Proyecto</button>
                <a href="{{ route('admin.proyectos.index') }}" class="btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>

    <script>
        const CLOUDINARY_CLOUD_NAME = '{{ config('services.cloudinary.cloud_name') }}';
        const CLOUDINARY_UPLOAD_PRESET = '{{ config('services.cloudinary.upload_preset') }}';

        document.getElementById('foto_input').addEventListener('change', async function(e) {
            const file = e.target.files[0];
            if (!file) return;

            // Mostrar preview
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('foto_preview').src = e.target.result;
                document.getElementById('foto_preview').style.display = 'block';
            };
            reader.readAsDataURL(file);

            // Subir a Cloudinary
            document.getElementById('upload_status').textContent = '⏳ Subiendo imagen...';
            document.getElementById('upload_status').style.color = '#c9a84c';

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
