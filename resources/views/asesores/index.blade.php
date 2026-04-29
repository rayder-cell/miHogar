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

                <!-- CARGO -->
                @if ($asesor->cargo)
                    <p
                        style="color:var(--color-gold); font-size:0.82rem; font-weight:bold; margin-bottom:8px; text-transform:uppercase; letter-spacing:1px;">
                        {{ $asesor->cargo }}
                    </p>
                @endif

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
                    style="display:inline-flex; align-items:center; gap:8px; background:#25D366; color:#fff; padding:12px 24px; font-weight:bold; text-decoration:none; border-radius:50px; font-size:0.9rem; box-shadow:0 4px 15px rgba(37,211,102,0.4); margin-top:10px;">
                    <svg width="18" height="18" fill="white" viewBox="0 0 24 24">
                        <path
                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                    </svg>
                    WhatsApp
                </a>

            </div>
        @empty
            <p style="color:var(--color-gray); text-align:center; width:100%;">No hay asesores registrados aún.</p>
        @endforelse

    </div>
@endsection
