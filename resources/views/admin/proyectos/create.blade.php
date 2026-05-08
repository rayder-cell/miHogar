@extends('layouts.admin')
@section('titulo', 'Nuevo Proyecto')

@section('content')
    <div class="card">

        {{-- MENSAJE DE ERROR --}}
        @if ($errors->any())
            <div style="background:#fee2e2; border:1px solid #ef4444; border-radius:8px; padding:15px; margin-bottom:20px;">
                @foreach ($errors->all() as $error)
                    <p style="color:#dc2626; margin:0; font-size:0.9rem;">⚠️ {{ $error }}</p>
                @endforeach
            </div>
        @endif

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
                    <select name="distrito" required>
                        <option value="">Selecciona un distrito</option>
                        <option value="Andahuaylas" {{ old('distrito') == 'Andahuaylas' ? 'selected' : '' }}>Andahuaylas
                        </option>
                        <option value="San Jerónimo" {{ old('distrito') == 'San Jerónimo' ? 'selected' : '' }}>San Jerónimo
                        </option>
                        <option value="Talavera" {{ old('distrito') == 'Talavera' ? 'selected' : '' }}>Talavera</option>
                    </select>
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
                <input type="number" name="precio" value="{{ old('precio', $proyecto->precio ?? '') }}"
                    placeholder="Ej: 150000" min="0" step="1" style="...tu estilo actual...">
            </div>

            <!-- FOTO DEL PROYECTO -->
            <div class="form-group">
                <label>Foto del Proyecto</label>
                <input type="file" id="foto_input" accept="image/*">
                <small style="color:#888;">Formatos: jpg, jpeg, png, webp. Sin límite de tamaño.</small>
                <div id="preview_container" style="margin-top:10px; display:none;">
                    <img id="foto_preview" style="height:150px; border:2px solid #c9a84c;">
                    <p id="upload_status" style="color:#c9a84c; font-size:0.85rem; margin-top:5px;"></p>
                </div>
                <input type="hidden" name="fotos" id="fotos_url">
            </div>

            <!-- FOTO PARA EL SLIDER -->
            <div class="form-group">
                <label>🖼️ Foto para el Slider (página principal)</label>
                <input type="file" id="slider_input" accept="image/*">
                <small style="color:#888;">Esta imagen aparecerá en el slider de la página de inicio.</small>
                <div id="slider_preview_container" style="margin-top:10px; display:none;">
                    <img id="slider_preview" style="height:150px; border:2px solid #c9a84c;">
                    <p id="slider_upload_status" style="color:#c9a84c; font-size:0.85rem; margin-top:5px;"></p>
                </div>
                <input type="hidden" name="foto_slider" id="foto_slider_url">
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
        const CLOUDINARY_CLOUD_NAME = '{{ config('services.cloudinary.cloud_name') }}';
        const CLOUDINARY_UPLOAD_PRESET = '{{ config('services.cloudinary.upload_preset') }}';

        async function subirACloudinary(file, previewId, statusId, urlInputId, previewContainerId) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById(previewId).src = e.target.result;
                if (previewContainerId) document.getElementById(previewContainerId).style.display = 'block';
            };
            reader.readAsDataURL(file);

            document.getElementById(statusId).textContent = '⏳ Subiendo imagen...';

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
                    document.getElementById(urlInputId).value = data.secure_url;
                    document.getElementById(statusId).textContent = '✅ Imagen subida correctamente';
                    document.getElementById(statusId).style.color = '#28a745';
                } else {
                    document.getElementById(statusId).textContent = '❌ Error al subir la imagen';
                    document.getElementById(statusId).style.color = '#dc3545';
                }
            } catch (error) {
                document.getElementById(statusId).textContent = '❌ Error de conexión';
                document.getElementById(statusId).style.color = '#dc3545';
            }
        }

        document.getElementById('foto_input').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (!file) return;
            subirACloudinary(file, 'foto_preview', 'upload_status', 'fotos_url', 'preview_container');
        });

        document.getElementById('slider_input').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (!file) return;
            subirACloudinary(file, 'slider_preview', 'slider_upload_status', 'foto_slider_url',
                'slider_preview_container');
        });
    </script>
@endsection
