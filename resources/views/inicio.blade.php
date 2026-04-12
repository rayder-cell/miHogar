@extends('layouts.app-public')

@section('content')
    <!-- ===== HERO ===== -->
    <section style="position:relative; min-height:90vh; overflow:hidden; background:var(--color-black);">

        @foreach ($proyectos as $index => $proyecto)
            <div class="slide"
                style="
                position:absolute; top:0; left:0;
                width:100%; height:100%;
                background: {{ $proyecto->fotos ? 'url(' . $proyecto->fotos . ') center/cover no-repeat' : '#1a1a1a' }};
                opacity: {{ $index === 0 ? '1' : '0' }};
                transition: opacity 1s ease;">
                <div style="position:absolute;inset:0;background:rgba(0,0,0,0.45);"></div>
            </div>
        @endforeach

        <div style="position:absolute; top:0; left:0; width:100%; height:100%; display:flex; flex-direction:column; align-items:center; justify-content:center; z-index:5; text-align:center; padding:20px;">
            <p class="text-gold" style="font-size:1rem; letter-spacing:4px; text-transform:uppercase; margin-bottom:10px;">Bienvenido a</p>
            <h1 style="color:var(--color-white); font-size:3.5rem; font-weight:900; text-transform:uppercase; letter-spacing:6px; text-shadow:2px 2px 10px rgba(0,0,0,0.8); margin-bottom:15px;">
                Inmobiliaria Mi Hogar
            </h1>
            <p style="color:var(--color-gray-light); font-size:1.1rem; margin-bottom:30px; max-width:600px;">
                Encuentra el hogar de tus sueños en Andahuaylas, Apurímac
            </p>
            <a href="{{ route('proyectos.index') }}" class="btn-gold">Ver Proyectos</a>
        </div>

        @if ($proyectos->count() > 1)
            <button onclick="cambiarSlide(-1)"
                style="position:absolute; left:20px; top:50%; transform:translateY(-50%);
                       background:rgba(0,0,0,0.6); border:2px solid #c9a84c;
                       color:#c9a84c; font-size:2.5rem; cursor:pointer;
                       width:60px; height:60px; border-radius:50%; z-index:10;
                       display:flex; align-items:center; justify-content:center;
                       transition:all 0.3s;"
                onmouseover="this.style.background='#c9a84c'; this.style.color='#000';"
                onmouseout="this.style.background='rgba(0,0,0,0.6)'; this.style.color='#c9a84c';">
                &#8249;
            </button>
            <button onclick="cambiarSlide(1)"
                style="position:absolute; right:20px; top:50%; transform:translateY(-50%);
                       background:rgba(0,0,0,0.6); border:2px solid #c9a84c;
                       color:#c9a84c; font-size:2.5rem; cursor:pointer;
                       width:60px; height:60px; border-radius:50%; z-index:10;
                       display:flex; align-items:center; justify-content:center;
                       transition:all 0.3s;"
                onmouseover="this.style.background='#c9a84c'; this.style.color='#000';"
                onmouseout="this.style.background='rgba(0,0,0,0.6)'; this.style.color='#c9a84c';">
                &#8250;
            </button>
        @endif

        <div style="position:absolute;bottom:20px;width:100%;display:flex;justify-content:center;gap:10px;z-index:10;">
            @foreach ($proyectos as $index => $p)
                <span class="slider-punto {{ $index === 0 ? 'activo' : '' }}"
                      onclick="irASlide({{ $index }})"
                      style="display:inline-block; width:12px; height:12px; border-radius:50%; cursor:pointer;
                             background:{{ $index === 0 ? '#c9a84c' : 'rgba(255,255,255,0.5)' }};
                             border:2px solid #c9a84c; transition:background 0.3s;">
                </span>
            @endforeach
        </div>

        <!-- INFO PROYECTO ESQUINA -->
        <div style="position:absolute; bottom:60px; left:30px; z-index:10;">
            @foreach ($proyectos as $index => $proyecto)
                <div class="info-slide" style="display:{{ $index === 0 ? 'block' : 'none' }};">
                    <div class="border-left-gold" style="background:rgba(0,0,0,0.75); padding:15px 20px; max-width:280px;">
                        <h2 style="color:var(--color-white); font-size:1rem; margin-bottom:6px;">{{ $proyecto->nombre_proyecto }}</h2>
                        <p style="color:var(--color-gray-light); font-size:0.82rem; margin-bottom:4px;">📍 {{ $proyecto->distrito }} - {{ $proyecto->direccion }}</p>
                        @if ($proyecto->precio)
                            <p class="text-gold" style="font-weight:bold; font-size:0.95rem; margin-bottom:8px;">💰 S/. {{ number_format($proyecto->precio, 0, '.', ',') }}</p>
                        @endif
                        <a href="{{ route('proyectos.show', $proyecto->id_proyecto) }}" class="btn-gold" style="padding:6px 14px; font-size:0.82rem;">
                            Ver más →
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- ===== FORMULARIO DE CONTACTO ===== -->
    <section style="background:var(--color-dark); padding:70px 20px;">
        <div style="max-width:1100px; margin:0 auto; display:flex; align-items:center; gap:60px; flex-wrap:wrap; justify-content:center;">

            <!-- TEXTO IZQUIERDA -->
            <div style="flex:1; min-width:280px;">
                <p class="text-gold" style="font-size:0.9rem; letter-spacing:4px; text-transform:uppercase; margin-bottom:10px;">Contáctanos</p>
                <h2 style="color:var(--color-white); font-size:2.2rem; font-weight:900; line-height:1.3; margin-bottom:20px;">
                    Dueño de una vida mejor.<br>
                    <span class="text-gold">Descubre lo que</span><br>
                    tenemos para ti.
                </h2>
                <p style="color:var(--color-gray); font-size:0.95rem; line-height:1.8;">
                    📍 Andahuaylas, Apurímac<br>
                    📞 912 345 678<br>
                    ✉️ info@mihogar.pe
                </p>
            </div>

            <!-- FORMULARIO PASO 1 -->
            <div id="form-paso1" class="bg-gold" style="border-radius:12px; padding:35px; width:400px; flex-shrink:0; box-sizing:border-box;">
                <div style="display:flex; align-items:center; gap:10px; margin-bottom:20px;">
                    <div style="width:28px; height:28px; background:#000; color:var(--color-gold); border-radius:50%; display:flex; align-items:center; justify-content:center; font-weight:bold;">1</div>
                    <div style="flex:1; height:2px; background:#000; opacity:0.3;"></div>
                    <div style="width:28px; height:28px; background:#fff; color:#000; border-radius:50%; display:flex; align-items:center; justify-content:center; font-weight:bold; border:2px solid #000;">2</div>
                </div>
                <h3 style="color:#000; font-weight:900; font-size:1.1rem; margin-bottom:20px; text-align:center;">Quiero recibir información</h3>
                <div style="display:flex; flex-direction:column; gap:12px;">
                    <div style="display:flex; gap:10px;">
                        <input id="nombre" type="text" placeholder="Nombre*" style="width:50%; padding:10px 14px; border:none; border-radius:8px; font-size:0.9rem; outline:none; box-sizing:border-box; background:#fff; color:#000;">
                        <input id="apellidos" type="text" placeholder="Apellidos*" style="width:50%; padding:10px 14px; border:none; border-radius:8px; font-size:0.9rem; outline:none; box-sizing:border-box; background:#fff; color:#000;">
                    </div>
                    <input id="dni" type="text" placeholder="DNI*" style="width:100%; padding:10px 14px; border:none; border-radius:8px; font-size:0.9rem; outline:none; box-sizing:border-box; background:#fff; color:#000;">
                    <input id="telefono" type="tel" placeholder="Teléfono*" style="width:100%; padding:10px 14px; border:none; border-radius:8px; font-size:0.9rem; outline:none; box-sizing:border-box; background:#fff; color:#000;">
                    <input id="correo" type="email" placeholder="Correo electrónico*" style="width:100%; padding:10px 14px; border:none; border-radius:8px; font-size:0.9rem; outline:none; box-sizing:border-box; background:#fff; color:#000;">
                    <select id="proyecto" style="width:100%; padding:10px 14px; border:none; border-radius:8px; font-size:0.9rem; outline:none; box-sizing:border-box; background:#fff; color:#000;">
                        <option value="">Proyecto de interés</option>
                        @foreach ($proyectos as $p)
                            <option value="{{ $p->nombre_proyecto }}">{{ $p->nombre_proyecto }}</option>
                        @endforeach
                    </select>
                    <label style="display:flex; align-items:flex-start; gap:8px; font-size:0.78rem; color:#000; cursor:pointer;">
                        <input type="checkbox" id="acepto" style="margin-top:2px;">
                        Acepto el tratamiento de mis datos personales.
                    </label>
                    <button onclick="enviarFormulario()" style="background:#000; color:var(--color-gold); padding:14px; border:none; border-radius:8px; font-weight:900; font-size:1rem; cursor:pointer; text-transform:uppercase; letter-spacing:1px; width:100%;">
                        Solicitar información
                    </button>
                    <p id="msg-error" style="color:red; font-size:0.8rem; display:none; text-align:center;"></p>
                </div>
            </div>
        </div>
    </section>

    <!-- MODAL VERIFICACIÓN PASO 2 -->
    <div id="modal-verificacion" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.7); z-index:9999; align-items:center; justify-content:center;">
        <div class="border-gold" style="background:var(--color-dark-3); border-radius:16px; padding:35px; width:380px; text-align:center;">
            <div style="display:flex; align-items:center; justify-content:center; gap:10px; margin-bottom:20px;">
                <div class="bg-gold" style="width:28px; height:28px; color:#000; border-radius:50%; display:flex; align-items:center; justify-content:center; font-weight:bold;">✓</div>
                <div style="flex:1; height:2px; background:var(--color-gold); max-width:80px;"></div>
                <div class="bg-gold" style="width:28px; height:28px; color:#000; border-radius:50%; display:flex; align-items:center; justify-content:center; font-weight:bold;">2</div>
            </div>
            <p style="color:var(--color-white); font-size:0.95rem; margin-bottom:5px;">Hemos enviado un código de 4 dígitos a tu correo:</p>
            <p id="correo-mostrado" class="text-gold" style="font-size:1rem; font-weight:bold; margin-bottom:20px;"></p>
            <div class="form-verificacion" style="display:flex; gap:10px; justify-content:center; margin-bottom:20px;">
                <input id="c1" type="text" maxlength="1" style="width:60px; height:60px; text-align:center; font-size:1.5rem; font-weight:bold; border-radius:10px; outline:none; background:#fff; color:#000; border:2px solid var(--color-gold);" oninput="moverFoco(this, 'c2')">
                <input id="c2" type="text" maxlength="1" style="width:60px; height:60px; text-align:center; font-size:1.5rem; font-weight:bold; border-radius:10px; outline:none; background:#fff; color:#000; border:2px solid var(--color-gold);" oninput="moverFoco(this, 'c3')">
                <input id="c3" type="text" maxlength="1" style="width:60px; height:60px; text-align:center; font-size:1.5rem; font-weight:bold; border-radius:10px; outline:none; background:#fff; color:#000; border:2px solid var(--color-gold);" oninput="moverFoco(this, 'c4')">
                <input id="c4" type="text" maxlength="1" style="width:60px; height:60px; text-align:center; font-size:1.5rem; font-weight:bold; border-radius:10px; outline:none; background:#fff; color:#000; border:2px solid var(--color-gold);" oninput="moverFoco(this, null)">
            </div>
            <p style="color:var(--color-gray); font-size:0.82rem; margin-bottom:15px;">
                ¿No recibiste el código?
                <a href="#" onclick="reenviarCodigo()" class="text-gold" style="font-weight:bold;">Reenviar</a>
            </p>
            <p style="color:var(--color-white); font-size:0.9rem; margin-bottom:8px; text-align:left;">¿En qué horario prefieres que te llamemos?</p>
            <select id="horario" class="border-gold" style="width:100%; padding:10px 14px; border-radius:8px; font-size:0.9rem; outline:none; box-sizing:border-box; background:#fff; color:#000; margin-bottom:15px;">
                <option value="">Elige el horario de tu preferencia</option>
                <option value="Mañana (8am - 12pm)">Mañana (8am - 12pm)</option>
                <option value="Tarde (12pm - 6pm)">Tarde (12pm - 6pm)</option>
                <option value="Noche (6pm - 9pm)">Noche (6pm - 9pm)</option>
            </select>
            <p id="msg-verificacion" style="color:red; font-size:0.82rem; margin:10px 0; display:none;"></p>
            <p id="msg-exito" style="color:#4caf50; font-size:0.82rem; margin:10px 0; display:none;"></p>
            <button onclick="verificarCodigo()" class="btn-gold" style="width:100%; margin-top:5px;">Enviar</button>
            <button onclick="cerrarModal()" style="background:transparent; color:var(--color-gray); padding:10px; border:none; font-size:0.85rem; cursor:pointer; width:100%; margin-top:5px;">Cancelar</button>
        </div>
    </div>

    <!-- ===== TESTIMONIOS ===== -->
    <section style="background:#fff; padding:70px 20px;">
        <div style="max-width:1100px; margin:0 auto;">
            <h2 style="text-align:center; color:#000; font-size:2rem; font-weight:900; margin-bottom:50px;">
                Nuestros clientes nos respaldan
            </h2>
            <div style="display:flex; gap:25px; justify-content:center; flex-wrap:wrap;">

                <div style="width:300px; background:#fff; border-radius:12px; overflow:hidden; box-shadow:0 4px 20px rgba(0,0,0,0.1);">
                    <div style="height:220px; background:#e8e0cc; display:flex; align-items:center; justify-content:center;">
                        <span style="font-size:5rem;">👨</span>
                    </div>
                    <div style="padding:20px;">
                        <p class="text-gold" style="font-weight:bold; font-size:0.95rem; margin-bottom:8px;">"Un hogar pensando en el futuro"</p>
                        <p style="color:#555; font-size:0.82rem; line-height:1.6; margin-bottom:15px;">Compré con Mi Hogar pensando en el futuro de mis hijos. Me dieron facilidades y logré cumplir el sueño de la casa propia.</p>
                        <p style="color:#000; font-weight:bold; font-size:0.85rem; text-align:right;">Carlos Quispe<br><span style="color:#888; font-weight:normal;">Andahuaylas</span></p>
                    </div>
                </div>

                <div style="width:300px; background:#fff; border-radius:12px; overflow:hidden; box-shadow:0 4px 20px rgba(0,0,0,0.1);">
                    <div style="height:220px; background:#e8e0cc; display:flex; align-items:center; justify-content:center;">
                        <span style="font-size:5rem;">👩</span>
                    </div>
                    <div style="padding:20px;">
                        <p class="text-gold" style="font-weight:bold; font-size:0.95rem; margin-bottom:8px;">"Nuestro mejor legado familiar"</p>
                        <p style="color:#555; font-size:0.82rem; line-height:1.6; margin-bottom:15px;">Con Mi Hogar logramos un terreno para darles a nuestros hijos un lugar tranquilo. Fue nuestra mejor decisión en familia.</p>
                        <p style="color:#000; font-weight:bold; font-size:0.85rem; text-align:right;">María Flores<br><span style="color:#888; font-weight:normal;">Apurímac</span></p>
                    </div>
                </div>

                <div style="width:300px; background:#fff; border-radius:12px; overflow:hidden; box-shadow:0 4px 20px rgba(0,0,0,0.1);">
                    <div style="height:220px; background:#e8e0cc; display:flex; align-items:center; justify-content:center;">
                        <span style="font-size:5rem;">👩</span>
                    </div>
                    <div style="padding:20px;">
                        <p class="text-gold" style="font-weight:bold; font-size:0.95rem; margin-bottom:8px;">"Mi casa propia, un sueño cumplido"</p>
                        <p style="color:#555; font-size:0.82rem; line-height:1.6; margin-bottom:15px;">Cumplí mi sueño de tener casa propia. De un cuarto alquilado a un hogar con patio y espacio para mi familia.</p>
                        <p style="color:#000; font-weight:bold; font-size:0.85rem; text-align:right;">Rosa Huamán<br><span style="color:#888; font-weight:normal;">Andahuaylas</span></p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <script>
        // ===== SLIDER =====
        let actual = 0;
        const slides = document.querySelectorAll('.slide');
        const puntos = document.querySelectorAll('.slider-punto');
        const infos = document.querySelectorAll('.info-slide');

        function mostrarSlide(n) {
            if (!slides.length) return;
            slides.forEach(s => { if (s) s.style.opacity = '0'; });
            puntos.forEach(p => { if (p) p.style.background = 'rgba(255,255,255,0.5)'; });
            infos.forEach(i => { if (i) i.style.display = 'none'; });
            actual = (n + slides.length) % slides.length;
            if (slides[actual]) slides[actual].style.opacity = '1';
            if (puntos[actual]) puntos[actual].style.background = '#c9a84c';
            if (infos[actual]) infos[actual].style.display = 'block';
        }

        function cambiarSlide(dir) { mostrarSlide(actual + dir); }
        function irASlide(n) { mostrarSlide(n); }

        if (slides.length > 0) {
            mostrarSlide(0);
            setInterval(() => cambiarSlide(1), 5000);
        }

        // ===== FORMULARIO =====
        function enviarFormulario() {
            const nombre = document.getElementById('nombre').value.trim();
            const apellidos = document.getElementById('apellidos').value.trim();
            const dni = document.getElementById('dni').value.trim();
            const telefono = document.getElementById('telefono').value.trim();
            const correo = document.getElementById('correo').value.trim();
            const proyecto = document.getElementById('proyecto').value;
            const acepto = document.getElementById('acepto').checked;
            const error = document.getElementById('msg-error');

            if (!nombre || !apellidos || !dni || !telefono || !correo || !proyecto) {
                error.textContent = 'Por favor completa todos los campos.';
                error.style.display = 'block';
                return;
            }
            if (!acepto) {
                error.textContent = 'Debes aceptar el tratamiento de datos.';
                error.style.display = 'block';
                return;
            }
            error.style.display = 'none';

            fetch('{{ route('contacto.enviar') }}', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                body: JSON.stringify({ nombre, apellidos, dni, telefono, correo, proyecto })
            })
            .then(r => r.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('correo-mostrado').textContent = correo;
                    document.getElementById('modal-verificacion').style.display = 'flex';
                } else {
                    error.textContent = data.message || 'Error al enviar. Intenta de nuevo.';
                    error.style.display = 'block';
                }
            })
            .catch(() => {
                error.textContent = 'Error de conexión. Intenta de nuevo.';
                error.style.display = 'block';
            });
        }

        function moverFoco(actual, siguienteId) {
            if (actual.value && siguienteId) document.getElementById(siguienteId).focus();
        }

        function verificarCodigo() {
            const msg = document.getElementById('msg-verificacion');
            const exito = document.getElementById('msg-exito');
            const horario = document.getElementById('horario').value;

            if (!horario) {
                msg.textContent = '⚠️ Por favor elige un horario de llamada.';
                msg.style.display = 'block';
                return;
            }

            fetch('{{ route('contacto.verificar') }}', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                body: JSON.stringify({
                    codigo1: document.getElementById('c1').value,
                    codigo2: document.getElementById('c2').value,
                    codigo3: document.getElementById('c3').value,
                    codigo4: document.getElementById('c4').value,
                    horario: horario
                })
            })
            .then(r => r.json())
            .then(data => {
                if (data.success) {
                    msg.style.display = 'none';
                    exito.textContent = '✅ ¡Verificación exitosa! Nos contactaremos contigo pronto.';
                    exito.style.display = 'block';
                    setTimeout(() => cerrarModal(), 2500);
                } else {
                    exito.style.display = 'none';
                    msg.textContent = '❌ Código incorrecto. Intenta de nuevo.';
                    msg.style.display = 'block';
                }
            });
        }

        function cerrarModal() {
            document.getElementById('modal-verificacion').style.display = 'none';
            ['c1','c2','c3','c4'].forEach(id => document.getElementById(id).value = '');
            document.getElementById('msg-verificacion').style.display = 'none';
            document.getElementById('msg-exito').style.display = 'none';
            document.getElementById('horario').value = '';
        }

        function reenviarCodigo() {
            cerrarModal();
            setTimeout(() => enviarFormulario(), 300);
        }
    </script>
@endsection