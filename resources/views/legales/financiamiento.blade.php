@extends('layouts.app-public')
@section('content')
<div style="max-width:900px; margin:60px auto; padding:0 20px;">
    <h1 style="color:#c9a84c; font-size:2rem; font-weight:900; text-transform:uppercase; letter-spacing:3px; margin-bottom:10px;">Financiamiento</h1>
    <div style="width:80px; height:3px; background:#c9a84c; margin-bottom:30px;"></div>

    <div style="color:#ddd; line-height:1.9; font-size:0.95rem;">
        <p style="font-size:1.05rem; margin-bottom:30px;">En Inmobiliaria Mi Hogar S.A.C. queremos que cumplir tu sueño de tener un terreno o casa propia sea posible. Por eso ofrecemos opciones de financiamiento flexibles adaptadas a tu situación.</p>

        <div style="display:flex; flex-wrap:wrap; gap:20px; margin-bottom:40px;">
            <div style="flex:1; min-width:250px; background:#111; border:1px solid #c9a84c; border-radius:8px; padding:25px;">
                <h3 style="color:#c9a84c; margin-bottom:10px;">💰 Pago al contado</h3>
                <p>Obtén un descuento especial pagando el valor total del lote o inmueble al contado. Consulta con nuestros asesores para conocer los beneficios disponibles.</p>
            </div>
            <div style="flex:1; min-width:250px; background:#111; border:1px solid #c9a84c; border-radius:8px; padding:25px;">
                <h3 style="color:#c9a84c; margin-bottom:10px;">📅 Financiamiento directo</h3>
                <p>Financia tu lote directamente con nosotros, sin banco. Con una cuota inicial accesible y cuotas mensuales cómodas adaptadas a tus posibilidades.</p>
            </div>
            <div style="flex:1; min-width:250px; background:#111; border:1px solid #c9a84c; border-radius:8px; padding:25px;">
                <h3 style="color:#c9a84c; margin-bottom:10px;">🏦 Crédito bancario</h3>
                <p>También puedes acceder a financiamiento a través de entidades bancarias. Nuestros asesores te orientarán en el proceso para obtener tu crédito hipotecario.</p>
            </div>
        </div>

        <h2 style="color:#c9a84c; font-size:1.2rem; margin:25px 0 10px;">¿Cómo funciona?</h2>
        <ol style="padding-left:20px; line-height:2.2;">
            <li>Elige el proyecto y el lote de tu preferencia.</li>
            <li>Consulta con nuestro asesor la opción de financiamiento más conveniente para ti.</li>
            <li>Presenta los documentos requeridos (DNI, recibo de servicios, sustento de ingresos).</li>
            <li>Firma el contrato de compra-venta y realiza tu cuota inicial.</li>
            <li>Comienza a pagar tus cuotas mensuales y disfruta tu terreno.</li>
        </ol>

        <div style="background:#111; border-left:4px solid #c9a84c; padding:20px; margin-top:30px; border-radius:4px;">
            <p style="margin:0; font-size:1rem;">¿Tienes preguntas sobre el financiamiento? Contáctanos al <span style="color:#c9a84c; font-weight:bold;">912 345 678</span> o escríbenos a <span style="color:#c9a84c; font-weight:bold;">info@mihogar.pe</span></p>
        </div>
    </div>

    <div style="margin-top:40px;">
        <a href="{{ url('/') }}" style="background:#c9a84c; color:#000; padding:10px 25px; font-weight:bold; text-decoration:none;">← Volver al inicio</a>
    </div>
</div>
@endsection