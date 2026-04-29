@extends('layouts.app-public')

@section('content')
    <!-- TÍTULO -->
    <div style="text-align:center; padding:50px 20px 30px;">
        <h1 class="text-gold" style="font-size:2.5rem; font-weight:900; text-transform:uppercase; letter-spacing:4px;">
            Asesores de Venta
        </h1>
        <p style="color:var(--color-gray); margin-top:10px;">Nuestro equipo está listo para ayudarte</p>
        <div class="bg-gold" style="width:80px; height:3px; margin:15px auto 0;"></div>
    </div>

    <!-- TARJETAS DE ASESORES -->
    <div
        style="max-width:1100px; margin:0 auto 60px; padding:0 20px; display:flex; flex-wrap:wrap; gap:30px; justify-content:center;">

        @forelse($asesores as $asesor)
            <div class="border-gold"
                style="background:var(--color-dark-2); width:260px; text-align:center; padding:30px 20px; transition:transform 0.3s;"
                onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">

                <!-- FOTO -->
                @if ($asesor->foto)
                    <img src="{{ $asesor->foto }}" alt="{{ $asesor->nombre }}"
                        style="width:120px; height:120px; border-radius:50%; object-fit:cover; border:3px solid var(--color-gold); margin:0 auto 15px; display:block;">
                @else
                    <div
                        style="width:120px; height:120px; border-radius:50%; background:#222; margin:0 auto 15px; display:flex; align-items:center; justify-content:center; border:3px solid var(--color-gold);">
                        <span style="font-size:3rem;">👤</span>
                    </div>
                @endif

                <!-- NOMBRE -->
                <h3 style="color:var(--color-white); font-size:1.1rem; font-weight:bold; margin-bottom:10px;">
                    {{ $asesor->nombre }}
                </h3>

                <!-- DESCRIPCIÓN -->
                @if ($asesor->descripcion)
                    <p style="color:var(--color-gray); font-size:0.82rem; line-height:1.6; margin-bottom:10px;">
                        {{ $asesor->descripcion }}
                    </p>
                @endif

                <!-- CONTACTO -->
                <p class="text-gold" style="font-size:0.9rem; margin-bottom:20px;">
                    📞 {{ $asesor->contacto }}
                </p>

                <!-- BOTÓN WHATSAPP -->
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $asesor->contacto) }}" target="_blank"
                    style="display:inline-block; background:#25D366; color:#fff; padding:8px 20px; font-weight:bold; text-decoration:none; border-radius:4px; font-size:0.85rem;">
                    💬 WhatsApp
                </a>

            </div>
        @empty
            <p style="color:var(--color-gray); text-align:center; width:100%;">No hay asesores registrados aún.</p>
        @endforelse

    </div>
@endsection
