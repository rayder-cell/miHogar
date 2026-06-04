<?php

namespace App\Http\Controllers;

use App\Models\Reclamacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReclamacionController extends Controller
{
    public function enviar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre'   => 'required|string|max:150',
            'dni'      => 'required|digits:8',
            'correo'   => 'required|email|max:150',
            'telefono' => 'required|digits:9',
            'tipo'     => 'required|string|in:Queja,Reclamo,Otros|max:200',  // ← solo valores permitidos
            'detalle'  => 'required|string|min:10|max:3000',
        ], [
            'nombre.required'   => 'El nombre es obligatorio.',
            'dni.required'      => 'El DNI es obligatorio.',
            'dni.digits'        => 'El DNI debe tener exactamente 8 dígitos.',
            'correo.required'   => 'El correo electrónico es obligatorio.',
            'correo.email'      => 'Ingresa un correo electrónico válido.',
            'telefono.required' => 'El teléfono es obligatorio.',
            'telefono.digits'   => 'El teléfono debe tener exactamente 9 dígitos.',
            'tipo.required'     => 'Debes seleccionar o especificar el tipo.',
            'tipo.in'           => 'El tipo seleccionado no es válido.',
            'detalle.required'  => 'El detalle de la reclamación es obligatorio.',
            'detalle.min'       => 'El detalle debe tener al menos 10 caracteres.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'ok'      => false,
                'errores' => $validator->errors()->all(),
            ], 422);
        }

        Reclamacion::create([
            'nombre'   => strip_tags($request->nombre),    // ← elimina HTML/JS
            'dni'      => $request->dni,
            'correo'   => $request->correo,
            'telefono' => $request->telefono,
            'tipo'     => strip_tags($request->tipo),      // ← elimina HTML/JS
            'detalle'  => strip_tags($request->detalle),   // ← elimina HTML/JS
            'ip'       => $request->ip(),
        ]);

        return response()->json([
            'ok'      => true,
            'mensaje' => 'Tu reclamación ha sido registrada. Nos comunicaremos contigo pronto.',
        ]);
    }
}