@extends('layouts.app-public')
@section('content')
<div style="max-width:900px; margin:60px auto; padding:0 20px;">
    <h1 style="color:#c9a84c; font-size:2rem; font-weight:900; text-transform:uppercase; letter-spacing:3px; margin-bottom:10px;">Libro de Reclamaciones</h1>
    <div style="width:80px; height:3px; background:#c9a84c; margin-bottom:30px;"></div>

    <div style="color:#ddd; line-height:1.9; font-size:0.95rem;">
        <p style="font-size:1.05rem; margin-bottom:20px;">Conforme a lo establecido en el Código de Protección y Defensa del Consumidor (Ley N° 29571), Inmobiliaria Mi Hogar Real State Perú S.A.C. pone a disposición de sus clientes el presente Libro de Reclamaciones Virtual.</p>

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
                    <select id="rec-tipo" onchange="toggleOtroTipo(this.value)"
                        style="width:100%; padding:10px 14px; border:1px solid #333; border-radius:6px; background:#1a1a1a; color:#fff; font-size:0.9rem; box-sizing:border-box;">
                        <option value="">Selecciona el tipo</option>
                        <option value="Queja">Queja (malestar sin afectación económica)</option>
                        <option value="Reclamo">Reclamo (disconformidad con producto o servicio)</option>
                        <option value="Otros">Otros</option>
                    </select>
                    <div id="rec-tipo-otro-wrap" style="display:none; margin-top:10px;">
                        <input type="text" id="rec-tipo-otro"
                            placeholder="Especifica el tipo de reclamación..."
                            style="width:100%; padding:10px 14px; border:1px solid #c9a84c55; border-radius:6px;
                                   background:#1a1a1a; color:#fff; font-size:0.9rem; box-sizing:border-box;">
                    </div>
                </div>

                <div>
                    <label style="color:#c9a84c; font-size:0.85rem; font-weight:bold; display:block; margin-bottom:5px;">Detalle de la reclamación *</label>
                    <textarea id="rec-detalle" rows="4" placeholder="Describe detalladamente tu queja o reclamo..."
                        style="width:100%; padding:10px 14px; border:1px solid #333; border-radius:6px; background:#1a1a1a; color:#fff; font-size:0.9rem; box-sizing:border-box; resize:none;"></textarea>
                </div>

                <p id="rec-error" style="color:#ff5252; font-size:0.85rem; display:none; background:#ff525215; border:1px solid #ff525240; border-radius:6px; padding:10px 14px; margin:0;"></p>
                <p id="rec-exito" style="color:#28a745; font-size:0.85rem; display:none; background:#28a74515; border:1px solid #28a74540; border-radius:6px; padding:10px 14px; margin:0;"></p>

                <button id="btn-enviar" onclick="enviarReclamacion()"
                    style="background:#c9a84c; color:#000; border:none; padding:14px; border-radius:6px; font-weight:900; font-size:1rem; cursor:pointer; text-transform:uppercase; letter-spacing:1px; transition:opacity .2s;">
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
function toggleOtroTipo(value) {
    const wrap  = document.getElementById('rec-tipo-otro-wrap');
    const input = document.getElementById('rec-tipo-otro');
    if (value === 'Otros') {
        wrap.style.display = 'block';
        input.focus();
    } else {
        wrap.style.display = 'none';
        input.value = '';
    }
}

async function enviarReclamacion() {
    const nombre   = document.getElementById('rec-nombre').value.trim();
    const dni      = document.getElementById('rec-dni').value.trim();
    const correo   = document.getElementById('rec-correo').value.trim();
    const telefono = document.getElementById('rec-telefono').value.trim();
    const tipoSel  = document.getElementById('rec-tipo').value;
    const tipoOtro = document.getElementById('rec-tipo-otro').value.trim();
    const detalle  = document.getElementById('rec-detalle').value.trim();
    const errorEl  = document.getElementById('rec-error');
    const exitoEl  = document.getElementById('rec-exito');
    const btnEl    = document.getElementById('btn-enviar');

    const tipo = tipoSel === 'Otros' ? tipoOtro : tipoSel;

    // Validación front-end
    if (!nombre || !dni || !correo || !telefono || !tipoSel || !detalle) {
        mostrarError('⚠️ Por favor completa todos los campos.');
        return;
    }
    if (tipoSel === 'Otros' && !tipoOtro) {
        mostrarError('⚠️ Por favor especifica el tipo de reclamación.');
        return;
    }

    // Estado cargando
    btnEl.disabled      = true;
    btnEl.textContent   = 'Enviando...';
    btnEl.style.opacity = '0.7';
    errorEl.style.display = 'none';
    exitoEl.style.display = 'none';

    try {
        const response = await fetch('{{ route("reclamacion.enviar") }}', {
            method:  'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept':       'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content ?? '',
            },
            body: JSON.stringify({ nombre, dni, correo, telefono, tipo, detalle }),
        });

        const data = await response.json();

        if (response.ok && data.ok) {
            exitoEl.textContent   = '✅ ' + data.mensaje;
            exitoEl.style.display = 'block';
            limpiarFormulario();
        } else {
            const msgs = data.errores
                ? data.errores.join(' | ')
                : (data.message ?? 'Ocurrió un error. Inténtalo nuevamente.');
            mostrarError('⚠️ ' + msgs);
        }
    } catch (err) {
        mostrarError('❌ No se pudo conectar con el servidor. Verifica tu conexión e inténtalo de nuevo.');
    } finally {
        btnEl.disabled      = false;
        btnEl.textContent   = 'Enviar Reclamación';
        btnEl.style.opacity = '1';
    }
}

function mostrarError(msg) {
    const errorEl = document.getElementById('rec-error');
    errorEl.textContent   = msg;
    errorEl.style.display = 'block';
    document.getElementById('rec-exito').style.display = 'none';
}

function limpiarFormulario() {
    ['rec-nombre','rec-dni','rec-correo','rec-telefono','rec-detalle','rec-tipo-otro']
        .forEach(id => document.getElementById(id).value = '');
    document.getElementById('rec-tipo').value = '';
    document.getElementById('rec-tipo-otro-wrap').style.display = 'none';
}
</script>
@endsection