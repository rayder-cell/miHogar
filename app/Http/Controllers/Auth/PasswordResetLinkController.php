<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PasswordResetLinkController extends Controller
{
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'correo' => ['required', 'email'],
        ]);

        $usuario = DB::table('usuarios')
                     ->where('correo', $request->correo)
                     ->first();

        if (!$usuario) {
            return back()->withErrors([
                'correo' => 'No encontramos un usuario con ese correo.'
            ]);
        }

        $token = Str::random(64);

        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->correo],
            [
                'token'      => Hash::make($token),
                'created_at' => now(),
            ]
        );

        $resetUrl = url('/reset-password/' . $token . '?email=' . $request->correo);

        // Enviar correo
        Mail::raw(
            "Hola, haz clic en el siguiente enlace para restablecer tu contraseña:\n\n" . $resetUrl,
            function ($message) use ($request) {
                $message->to($request->correo)
                        ->subject('Recuperar contraseña - Inmobiliaria Mi Hogar');
            }
        );

        return back()->with('status', '✅ Te enviamos un enlace de recuperación a tu correo.');
    }
}