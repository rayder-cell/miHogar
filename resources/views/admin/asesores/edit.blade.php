@extends('layouts.admin')
@section('titulo', 'Editar Asesor')

@section('content')
<div class="card">
    <form method="POST" action="{{ route('admin.asesores.update', $asesor->id_asesor) }}">
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
                <img id="foto-preview" src="{{ $asesor->foto }}"
                     style="width:80px; height:80px; border-radius:50%; object-fit:cover; border:2px solid #c9a84c;">
                <p style="color:#888; font-size:0.8rem; margin-top:5px;">Foto actual</p>
            </div>
            @else
            <div style="margin-bottom:10px; display:none;" id="preview-container">
                <img id="foto-preview" style="width:80px; height:80px; border-radius:50%; object-fit:cover; border:2px solid #c9a84c;">
            </div>
            @endif

            <input type="file" id="foto_input" accept="image/*">
            <p id="upload-status" style="font-size:0.82rem; margin-top:5px; color:#888;"></p>
            <small style="color:#888;">Deja vacío para mantener la foto actual</small>

            <!-- URL de Cloudinary -->
            <input type="hidden" name="foto_url" id="foto_url" value="{{ $asesor->foto }}">
        </div>

        <div style="display:flex; gap:10px; margin-top:10px;">
            <button type="submit" class="btn-gold">💾 Actualizar Asesor</button>
            <a href="{{ route('admin.asesores.index') }}" class="btn-secondary">Cancelar</a>
        </div>
    </form>
</div>

<script>
    const CLOUDINARY_CLOUD_NAME = '{{ config('services.cloudinary.cloud_name', env('CLOUDINARY_CLOUD_NAME')) }}';
    const CLOUDINARY_UPLOAD_PRESET = '{{ env('CLOUDINARY_UPLOAD_PRESET', 'mihogar_preset') }}';

    document.getElementById('foto_input').addEventListener('change', async function(e) {
        const file = e.target.files[0];
        if (!file) return;

        const status = document.getElementById('upload-status');
        status.textContent = '⏳ Subiendo imagen...';
        status.style.color = '#c9a84c';

        // Preview
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById('foto-preview');
            if (preview) {
                preview.src = e.target.result;
                document.getElementById('preview-container') &&
                    (document.getElementById('preview-container').style.display = 'block');
            }
        };
        reader.readAsDataURL(file);

        // Subir a Cloudinary
        const formData = new FormData();
        formData.append('file', file);
        formData.append('upload_preset', CLOUDINARY_UPLOAD_PRESET);
        formData.append('folder', 'mihogar/asesores');

        try {
            const response = await fetch(
                `https://api.cloudinary.com/v1_1/${CLOUDINARY_CLOUD_NAME}/image/upload`,
                { method: 'POST', body: formData }
            );
            const data = await response.json();

            if (data.secure_url) {
                document.getElementById('foto_url').value = data.secure_url;
                status.textContent = '✅ Imagen subida correctamente';
                status.style.color = '#28a745';
            } else {
                status.textContent = '❌ Error al subir: ' + (data.error?.message || 'Error desconocido');
                status.style.color = '#dc3545';
            }
        } catch (error) {
            status.textContent = '❌ Error de conexión';
            status.style.color = '#dc3545';
        }
    });
</script>
@endsection