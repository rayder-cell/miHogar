<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContactoController extends Controller
{
    public function enviar(Request $request)
    {
        if ($request->website) {
            return response()->json(['success' => true]);
        }

        try {
            $request->validate([
                'nombre'    => 'required|string|max:100',
                'apellidos' => 'required|string|max:100',
                'dni'       => 'required|string|max:20',
                'telefono'  => 'required|string|max:20',
                'correo'    => 'required|email|max:150',
                'proyecto'  => 'required|string|max:200',
            ]);

            $nombre    = strip_tags(trim($request->nombre));
            $apellidos = strip_tags(trim($request->apellidos));
            $dni       = strip_tags(trim($request->dni));
            $telefono  = strip_tags(trim($request->telefono));
            $correo    = strip_tags(trim($request->correo));
            $proyecto  = strip_tags(trim($request->proyecto));

            // Guardar datos en sesión para el paso 2
            session(['datos_contacto' => $request->all()]);

            $emailEmpresa = config('mail.empresa');

            // Email a la empresa
            Mail::raw(
                "📋 NUEVO CONTACTO - Inmobiliaria Mi Hogar\n\n" .
                "Nombre: {$nombre} {$apellidos}\n" .
                "DNI: {$dni}\n" .
                "Teléfono: {$telefono}\n" .
                "Correo: {$correo}\n" .
                "Proyecto de interés: {$proyecto}",
                function ($message) use ($emailEmpresa) {
                    $message->to($emailEmpresa)
                        ->subject('Nuevo contacto - Mi Hogar');
                }
            );

            return response()->json(['success' => true]);

        } catch (\Exception $e) {
            Log::error('Error contacto: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error al enviar. Inténtalo de nuevo.'
            ], 200);
        }
    }

    public function verificar(Request $request)
    {
        $datos   = session('datos_contacto');
        $horario = $request->horario;

        if (!$horario) {
            return response()->json(['success' => false, 'message' => 'Elige un horario']);
        }

        try {
            $emailEmpresa = config('mail.empresa');

            Mail::raw(
                "✅ HORARIO CONFIRMADO - Inmobiliaria Mi Hogar\n\n" .
                "Nombre: {$datos['nombre']} {$datos['apellidos']}\n" .
                "DNI: {$datos['dni']}\n" .
                "Teléfono: {$datos['telefono']}\n" .
                "Correo: {$datos['correo']}\n" .
                "Proyecto: {$datos['proyecto']}\n\n" .
                "📞 Horario preferido para llamar: {$horario}",
                function ($message) use ($emailEmpresa, $horario) {
                    $message->to($emailEmpresa)
                        ->subject('📞 Llamar a cliente - ' . $horario);
                }
            );
        } catch (\Exception $e) {
            Log::error('Error email verificacion: ' . $e->getMessage());
        }

        session()->forget('datos_contacto');
        return response()->json(['success' => true]);
    }

    public function chat(Request $request)
    {
        if ($request->website) {
            return response()->json(['success' => true]);
        }

        try {
            $request->validate([
                'nombre' => 'required|string|max:100',
                'correo' => 'required|email|max:150',
            ]);

            $nombre   = strip_tags(trim($request->nombre));
            $correo   = strip_tags(trim($request->correo));
            $proyecto = strip_tags(trim($request->proyecto ?? 'No especificado'));
            $asunto   = strip_tags(trim($request->asunto ?? 'No especificado'));
            $mensaje  = strip_tags(trim($request->mensaje ?? 'Sin mensaje'));

            $emailEmpresa = config('mail.empresa');

            Mail::raw(
                "📩 Nuevo mensaje desde el chat web\n\n" .
                "👤 Nombre: {$nombre}\n" .
                "📧 Correo: {$correo}\n" .
                "🏠 Proyecto de interés: {$proyecto}\n" .
                "📌 Asunto: {$asunto}\n" .
                "💬 Mensaje: {$mensaje}",
                function ($message) use ($emailEmpresa) {
                    $message->to($emailEmpresa)
                        ->subject('💬 Nuevo mensaje - Chat Web Mi Hogar');
                }
            );

            return response()->json(['success' => true]);

        } catch (\Exception $e) {
            Log::error('Error chat: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error al enviar. Inténtalo de nuevo.'
            ], 200);
        }
    }
}