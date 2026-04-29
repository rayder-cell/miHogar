@extends('layouts.app-public')
@section('content')
<div style="max-width:900px; margin:60px auto; padding:0 20px;">
    <h1 style="color:#c9a84c; font-size:2rem; font-weight:900; text-transform:uppercase; letter-spacing:3px; margin-bottom:10px;">Condiciones de Uso</h1>
    <div style="width:80px; height:3px; background:#c9a84c; margin-bottom:30px;"></div>

    <div style="color:#ddd; line-height:1.9; font-size:0.95rem;">
        <h2 style="color:#c9a84c; font-size:1.2rem; margin:25px 0 10px;">1. Aceptación de los términos</h2>
        <p>Al acceder y utilizar el sitio web de Inmobiliaria Mi Hogar S.A.C., usted acepta cumplir y estar sujeto a las siguientes condiciones de uso. Si no está de acuerdo con alguna de estas condiciones, le rogamos que no utilice nuestro sitio.</p>

        <h2 style="color:#c9a84c; font-size:1.2rem; margin:25px 0 10px;">2. Uso del sitio</h2>
        <p>Este sitio web es de uso exclusivamente informativo. Toda la información publicada sobre proyectos, precios y disponibilidad está sujeta a cambios sin previo aviso. Inmobiliaria Mi Hogar S.A.C. se reserva el derecho de modificar, suspender o discontinuar cualquier aspecto del sitio en cualquier momento.</p>

        <h2 style="color:#c9a84c; font-size:1.2rem; margin:25px 0 10px;">3. Propiedad intelectual</h2>
        <p>Todo el contenido de este sitio, incluyendo textos, imágenes, logotipos y diseños, es propiedad de Inmobiliaria Mi Hogar S.A.C. y está protegido por las leyes de propiedad intelectual vigentes en el Perú. Queda prohibida su reproducción total o parcial sin autorización expresa.</p>

        <h2 style="color:#c9a84c; font-size:1.2rem; margin:25px 0 10px;">4. Información de proyectos</h2>
        <p>Los precios, planos, imágenes y especificaciones de los proyectos publicados en este sitio son referenciales y pueden variar. Para información actualizada y vinculante, comuníquese directamente con nuestros asesores de venta.</p>

        <h2 style="color:#c9a84c; font-size:1.2rem; margin:25px 0 10px;">5. Limitación de responsabilidad</h2>
        <p>Inmobiliaria Mi Hogar S.A.C. no será responsable por daños directos o indirectos derivados del uso o la imposibilidad de uso de este sitio web o de la información contenida en él.</p>

        <h2 style="color:#c9a84c; font-size:1.2rem; margin:25px 0 10px;">6. Modificaciones</h2>
        <p>Nos reservamos el derecho de actualizar estas condiciones en cualquier momento. Le recomendamos revisar esta página periódicamente para estar informado de cualquier cambio.</p>

        <h2 style="color:#c9a84c; font-size:1.2rem; margin:25px 0 10px;">7. Contacto</h2>
        <p>Para cualquier consulta relacionada con estas condiciones, puede contactarnos a través de: <span style="color:#c9a84c;">info@mihogar.pe</span> o llamar al <span style="color:#c9a84c;">912 345 678</span>.</p>
    </div>

    <div style="margin-top:40px;">
        <a href="{{ url('/') }}" style="background:#c9a84c; color:#000; padding:10px 25px; font-weight:bold; text-decoration:none;">← Volver al inicio</a>
    </div>
</div>
@endsection