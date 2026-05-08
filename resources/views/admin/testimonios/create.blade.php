@extends('layouts.admin')
@section('titulo', 'Nuevo Testimonio')

@section('content')
<div class="card">
    <h2 style="color:#c9a84c; margin-bottom:20px;">Nuevo Testimonio</h2>

    <form method="POST" action="{{ route('admin.testimonios.store') }}">
        @csrf

        <div class="form-group">
            <label>Nombre *</label>
            <input type="text" name="nombre" value="{{ old('nombre') }}" required>
            @error('nombre') <span style="color:red; font-size:0.8rem;">{{ $message }}</span> @enderror
        </div>

        <div style="display:flex; gap:20px;">
            <div class="form-group" style="flex:1;">
                <label>Ubicación</label>
                <input type="text" name="ubicacion" value="{{ old('ubicacion') }}" placeholder="Ej: Andahuaylas">
            </div>
            <div class="form-group" style="flex:1;">
                <label>Título / Frase</label>
                <input type="text" name="titulo" value="{{ old('titulo') }}" placeholder='Ej: "Un hogar pensando en el futuro"'>
            </div>
        </div>

        <div class="form-group">
            <label>Comentario</label>
            <textarea name="comentario" rows="4" placeholder="Escribe el testimonio del cliente...">{{ old('comentario') }}</textarea>
        </div>

        <!-- FOTO -->
        <div class="form-group">
            <label>Foto del Cliente</label>
            <input type="file" id="foto_input" accept="image/*">
            <small style="color:#888;">Opcional. Formatos: jpg, png, webp.</small>
            <div id="preview_container" style="margin-top:10px; display:none;">
                <img id="foto_preview" style="height:80px; width:80px; border-radius:50%; object-fit:cover; border:2px solid #c9a84c;">
            </div>
            <p id="upload_status" style="font-size:0.85rem; margin-top:5px;"></p>
            <input type="hidden" name="foto" id="foto_url">
        </div>

        <div class="form-group">
            <label style="display:flex; align-items:center; gap:8px; cursor:pointer;">
                <input type="checkbox" name="activo" checked>
                Mostrar en la página web
            </label>
        </div>

        <div style="display:flex; gap:10px; margin-top:10px;">
            <button type="submit" class="btn-gold">💾 Guardar Testimonio</button>
            <a href="{{ route('admin.testimonios.index') }}" class="btn-secondary">Cancelar</a>
        </div>
    </form>
</div>

<script>
    const CLOUDINARY_CLOUD_NAME   = '{{ env('CLOUDINARY_CLOUD_NAME') }}';
    const CLOUDINARY_UPLOAD_PRESET = '{{ env('CLOUDINARY_UPLOAD_PRESET') }}';

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
        document.getElementById('upload_status').style.color = '#c9a84c';

        const formData = new FormData();
        formData.append('file', file);
        formData.append('upload_preset', CLOUDINARY_UPLOAD_PRESET);
        formData.append('folder', 'mihogar/testimonios');

        try {
            const response = await fetch(
                `https://api.cloudinary.com/v1_1/${CLOUDINARY_CLOUD_NAME}/image/upload`,
                { method: 'POST', body: formData }
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