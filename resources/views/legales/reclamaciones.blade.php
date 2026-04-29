@extends('layouts.app-public')
@section('content')
<div style="max-width:900px; margin:60px auto; padding:0 20px;">
    <h1 style="color:#c9a84c; font-size:2rem; font-weight:900; text-transform:uppercase; letter-spacing:3px; margin-bottom:10px;">Libro de Reclamaciones</h1>
    <div style="width:80px; height:3px; background:#c9a84c; margin-bottom:30px;"></div>

    <div style="color:#ddd; line-height:1.9; font-size:0.95rem;">
        <p style="font-size:1.05rem; margin-bottom:20px;">Conforme a lo establecido en el Código de Protección y Defensa del Consumidor (Ley N° 29571), Inmobiliaria Mi Hogar S.A.C. pone a disposición de sus clientes el presente Libro de Reclamaciones Virtual.</p>

        <div style="background:#111; border:1px solid #c9a84c; border-radius:8px; padding:30px; margin-bottom:30px;">
            <h2 style="color:#c9a84c; font-size:1.2rem; margin-bottom:20px;">📋 Registrar una reclamación</h2>

            <div style="display:flex; flex-direction:column; gap:15px;">
                <div>
                    <label style="color:#c9a84c; font-size:0.85rem; font-weight:bold; display:block; margin-bottom:5px;">Nombre completo *</label>
                    <input type="text" id="rec-nombre" placeholder="Tu nombre completo"
                        style="width:100%; padding:10px 14px; border:1px solid #333; border-radius:6px; background:#1a1a1a; color:#fff; font-size:0.9rem; box-sizing:border-box;">
                </div>
                <div>
                    <label style="color:#c9a84c; font-size:0.85rem; font-weight:bold; display:block; margin-bottom:5px;">DNI *</label>
                    <input type="text" id="rec-dni" placeholder="Tu número de DNI" maxlength="8"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                        style="width:100%; padding:10px 14px; border:1px solid #333; border-radius:6px; background:#1a1a1a; color:#fff; font-size:0.9rem; box-sizing:border-box;">
                </div>
                <div>
                    <label style="color:#c9a84c; font-size:0.85rem; font-weight:bold; display:block; margin-bottom:5px;">Correo electrónico *</label>
                    <input type="email" id="rec-correo" placeholder="tu@correo.com"
                        style="width:100%; padding:10px 14px; border:1px solid #333; border-radius:6px; background:#1a1a1a; color:#fff; font-size:0.9rem; box-sizing:border-box;">
                </div>
                <div>
                    <label style="color:#c9a84c; font-size:0.85rem; font-weight:bold; display:block; margin-bottom:5px;">Teléfono *</label>
                    <input type="tel" id="rec-telefono" placeholder="912345678" maxlength="9"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                        style="width:100%; padding:10px 14px; border:1px solid #333; border-radius:6px; background:#1a1a1a; color:#fff; font-size:0.9rem; box-sizing:border-box;">
                </div>
                <div>
                    <label style="color:#c9a84c; font-size:0.85rem; font-weight:bold; display:block; margin-bottom:5px;">Tipo *</label>
                    <select id="rec-tipo"
                        style="width:100%; padding:10px 14px; border:1px solid #333; border-radius:6px; background:#1a1a1a; color:#fff; font-size:0.9rem; box-sizing:border-box;">
                        <option value="">Selecciona el tipo</option>
                        <option value="Queja">Queja (malestar sin afectación económica)</option>
                        <option value="Reclamo">Reclamo (disconformidad con producto o servicio)</option>
                    </select>
                </div>
                <div>
                    <label style="color:#c9a84c; font-size:0.85rem; font-weight:bold; display:block; margin-bottom:5px;">Detalle de la reclamación *</label>
                    <textarea id="rec-detalle" rows="4" placeholder="Describe detalladamente tu queja o reclamo..."
                        style="width:100%; padding:10px 14px; border:1px solid #333; border-radius:6px; background:#1a1a1a; color:#fff; font-size:0.9rem; box-sizing:border-box; resize:none;"></textarea>
                </div>
                <p id="rec-error" style="color:red; font-size:0.82rem; display:none;"></p>
                <p id="rec-exito" style="color:#28a745; font-size:0.82rem; display:none;"></p>
                <button onclick="enviarReclamacion()"
                    style="background:#c9a84c; color:#000; border:none; padding:14px; border-radius:6px; font-weight:900; font-size:1rem; cursor:pointer; text-transform:uppercase; letter-spacing:1px;">
                    Enviar Reclamación
                </button>
            </div>
        </div>

        <p style="color:#888; font-size:0.82rem;">La empresa responderá tu reclamación en un plazo máximo de 30 días calendario, conforme a la normativa vigente.</p>
    </div>

    <div style="margin-top:40px;">
        <a href="{{ url('/') }}" style="background:#c9a84c; color:#000; padding:10px 25px; font-weight:bold; text-decoration:none;">← Volver al inicio</a>
    </div>
</div>

<script>
function enviarReclamacion() {
    const nombre = document.getElementById('rec-nombre').value.trim();
    const dni = document.getElementById('rec-dni').value.trim();
    const correo = document.getElementById('rec-correo').value.trim();
    const telefono = document.getElementById('rec-telefono').value.trim();
    const tipo = document.getElementById('rec-tipo').value;
    const detalle = document.getElementById('rec-detalle').value.trim();
    const error = document.getElementById('rec-error');
    const exito = document.getElementById('rec-exito');

    if (!nombre || !dni || !correo || !telefono || !tipo || !detalle) {
        error.textContent = '⚠️ Por favor completa todos los campos.';
        error.style.display = 'block';
        return;
    }
    error.style.display = 'none';
    exito.textContent = '✅ Tu reclamación ha sido registrada. Nos comunicaremos contigo pronto.';
    exito.style.display = 'block';
    ['rec-nombre','rec-dni','rec-correo','rec-telefono','rec-tipo','rec-detalle']
        .forEach(id => document.getElementById(id).value = '');
}
</script>
@endsection