@extends('layouts.app-public')
@section('content')
<div style="max-width:900px; margin:60px auto; padding:0 20px;">
    <h1 style="color:#c9a84c; font-size:2rem; font-weight:900; text-transform:uppercase; letter-spacing:3px; margin-bottom:10px;">Políticas de Privacidad</h1>
    <div style="width:80px; height:3px; background:#c9a84c; margin-bottom:30px;"></div>

    <div style="color:#ddd; line-height:1.9; font-size:0.95rem;">
        <h2 style="color:#c9a84c; font-size:1.2rem; margin:25px 0 10px;">1. Responsable del tratamiento</h2>
        <p>Inmobiliaria Mi Hogar Real State Perú S.A.C., con RUC 20615528421, con dirección en AV. ANDAHUAYLAS 485, Andahuaylas, Apurímac, Perú, es la empresa responsable del tratamiento de sus datos personales.</p>

        <h2 style="color:#c9a84c; font-size:1.2rem; margin:25px 0 10px;">2. Datos que recopilamos</h2>
        <p>Recopilamos los siguientes datos personales cuando usted completa nuestros formularios de contacto: nombre completo, DNI, número de teléfono, correo electrónico y proyecto de interés. Estos datos son proporcionados voluntariamente por usted.</p>

        <h2 style="color:#c9a84c; font-size:1.2rem; margin:25px 0 10px;">3. Finalidad del tratamiento</h2>
        <p>Sus datos personales serán utilizados para: brindarle información sobre nuestros proyectos inmobiliarios, contactarle a través de nuestros asesores de venta, enviarle información comercial relacionada con nuestros servicios y gestionar su solicitud de atención.</p>

        <h2 style="color:#c9a84c; font-size:1.2rem; margin:25px 0 10px;">4. Base legal</h2>
        <p>El tratamiento de sus datos se realiza con su consentimiento expreso, otorgado al momento de completar nuestros formularios, de conformidad con la Ley N° 29733 - Ley de Protección de Datos Personales del Perú.</p>

        <h2 style="color:#c9a84c; font-size:1.2rem; margin:25px 0 10px;">5. Conservación de datos</h2>
        <p>Sus datos personales serán conservados durante el tiempo necesario para cumplir con la finalidad para la que fueron recopilados, o hasta que usted solicite su eliminación.</p>

        <h2 style="color:#c9a84c; font-size:1.2rem; margin:25px 0 10px;">6. Sus derechos</h2>
        <p>Usted tiene derecho a acceder, rectificar, cancelar y oponerse al tratamiento de sus datos personales (derechos ARCO). Para ejercer estos derechos, puede escribirnos a <span style="color:#c9a84c;">inmobiliariamihogarperu@gmail.com</span>.</p>

        <h2 style="color:#c9a84c; font-size:1.2rem; margin:25px 0 10px;">7. Seguridad</h2>
        <p>Implementamos medidas técnicas y organizativas apropiadas para proteger sus datos personales contra el acceso no autorizado, pérdida o destrucción.</p>
    </div>

    <div style="margin-top:40px;">
        <a href="{{ url('/') }}" style="background:#c9a84c; color:#000; padding:10px 25px; font-weight:bold; text-decoration:none;">← Volver al inicio</a>
    </div>
</div>
@endsection