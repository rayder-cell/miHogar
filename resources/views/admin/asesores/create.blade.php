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
                <label>Cargo *</label>
                <input type="text" name="cargo" value="{{ old('cargo') }}" placeholder="Ej: Asesor de Ventas" required>
            </div>

            <div class="form-group">
                <label>Descripción del Asesor *</label>
                <textarea name="descripcion" rows="3" placeholder="Ej: Especialista en ventas con 5 años de experiencia..." required>{{ old('descripcion') }}</textarea>
            </div>

            <div class="form-group">
                <label>Contacto (WhatsApp) *</label>
                <input type="tel" name="contacto" value="{{ old('contacto') }}" placeholder="912345678" required
                    pattern="[0-9]{9}" inputmode="numeric"
                    oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                    minlength="9" maxlength="9">
                <small style="color:#888;">Solo números, exactamente 9 dígitos</small>
            </div>

            <div class="form-group">
                <label>Foto del Asesor *</label>
                <input type="file" id="foto_input" accept="image/*" required>
                <small style="color:#888;">Formatos: jpg, jpeg, png, webp.</small>
                <div id="preview_container" style="margin-top:10px; display:none;">
                    <img id="foto_preview" style="height:150px; border:2px solid #c9a84c;">
                    <p id="upload_status" style="color:#c9a84c; font-size:0.85rem; margin-top:5px;"></p>
                </div>
                <input type="hidden" name="foto_url" id="fotos_url">
            </div>

            <div style="display:flex; gap:10px; margin-top:10px;">
                <button type="submit" class="btn-gold">💾 Guardar Asesor</button>
                <a href="{{ route('admin.asesores.index') }}" class="btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>

    <script>
        const CLOUDINARY_CLOUD_NAME = '{{ config('services.cloudinary.cloud_name') }}';
        const CLOUDINARY_UPLOAD_PRESET = '{{ config('services.cloudinary.upload_preset') }}';

        document.getElementById('foto_input').addEventListener('change', async function(e) {
            const file = e.target.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('foto_preview').src = e.target.result;
                document.getElementById('preview_container').style.display = 'block';
            };
            reader.readAsDataURL(file);

            document.getElementById('upload_status').textContent = '⏳ Subiendo imagen...';

            const formData = new FormData();
            formData.append('file', file);
            formData.append('upload_preset', CLOUDINARY_UPLOAD_PRESET);
            formData.append('folder', 'mihogar/asesores');

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