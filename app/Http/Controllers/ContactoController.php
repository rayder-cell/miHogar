<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    public function enviar(Request $request)
    {
        $request->validate([...]);

        $codigo = rand(1000, 9999);

        session([...]);

        try {
            Mail::raw(
                "📋 NUEVO CONTACTO...",
                function ($message) {
                    $message->to(config('services.email_empresa'))
                        ->subject('Nuevo contacto - Mi Hogar');
                }
            );

            Mail::raw(
                "Hola...",
                function ($message) use ($request) {
                    $message->to($request->correo)
                        ->subject('Tu código de verificación - Mi Hogar');
                }
            );

            return response()->json(['success' => true]);

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
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