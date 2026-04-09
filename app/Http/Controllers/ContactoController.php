<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    public function enviar(Request $request)
    {
        try {
            $request->validate([
                'nombre'    => 'required|string',
                'apellidos' => 'required|string',
                'dni'       => 'required|string',
                'telefono'  => 'required|string',
                'correo'    => 'required|email',
                'proyecto'  => 'required|string',
            ]);

            $codigo = rand(1000, 9999);

            session([
                'codigo_verificacion' => $codigo,
                'correo_cliente'      => $request->correo,
                'datos_contacto'      => $request->all(),
            ]);

            Mail::raw(
                "📋 NUEVO CONTACTO - Inmobiliaria Mi Hogar\n\nNombre: {$request->nombre} {$request->apellidos}\nDNI: {$request->dni}\nTeléfono: {$request->telefono}\nCorreo: {$request->correo}\nProyecto de interés: {$request->proyecto}",
                function ($message) {
                    $message->to(env('EMAIL_EMPRESA'))
                        ->subject('Nuevo contacto - Mi Hogar');
                }
            );

            Mail::raw(
                "Hola {$request->nombre},\n\nTu código es: {$codigo}",
                function ($message) use ($request) {
                    $message->to($request->correo)
                        ->subject('Tu código de verificación - Mi Hogar');
                }
            );

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            \Log::error('Error contacto: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 200); // 200 para que llegue al navegador
        }
    }

    public function verificar(Request $request)
    {
        $codigoIngresado = $request->codigo1 . $request->codigo2 . $request->codigo3 . $request->codigo4;
        $codigoGuardado  = session('codigo_verificacion');
        $datos           = session('datos_contacto');
        $horario         = $request->horario;

        if ($codigoIngresado == $codigoGuardado) {
            // Notificar a la empresa con el horario elegido
            try {
                Mail::raw(
                    "✅ CLIENTE VERIFICADO - Inmobiliaria Mi Hogar\n\n" .
                        "Nombre: {$datos['nombre']} {$datos['apellidos']}\n" .
                        "DNI: {$datos['dni']}\n" .
                        "Teléfono: {$datos['telefono']}\n" .
                        "Correo: {$datos['correo']}\n" .
                        "Proyecto: {$datos['proyecto']}\n\n" .
                        "📞 Horario preferido para llamar: {$horario}",
                    function ($message) {
                        $message->to(env('EMAIL_EMPRESA'))
                            ->subject('✅ Cliente verificado - Llamar a ' . request('horario'));
                    }
                );
            } catch (\Exception $e) {
                Log::error('Error email verificacion: ' . $e->getMessage());
            }

            session()->forget(['codigo_verificacion', 'correo_cliente', 'datos_contacto']);
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Código incorrecto']);
    }
}
