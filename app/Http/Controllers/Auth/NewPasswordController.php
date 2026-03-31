<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\View\View;

class NewPasswordController extends Controller
{
    public function create(Request $request): View
    {
        return view('auth.reset-password', ['request' => $request]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'token'                 => ['required'],
            'email'                 => ['required', 'email'],
            'password'              => ['required', 'confirmed', 'min:8'],
        ]);

        // Buscar el token en la tabla
        $resetRecord = DB::table('password_reset_tokens')
                         ->where('email', $request->email)
                         ->first();

        if (!$resetRecord) {
            return back()->withErrors(['email' => 'Token inválido o expirado.']);
        }

        // Verificar el token
        if (!Hash::check($request->token, $resetRecord->token)) {
            return back()->withErrors(['email' => 'Token inválido o expirado.']);
        }

        // Actualizar la contraseña
        $usuario = User::where('correo', $request->email)->first();

        if (!$usuario) {
            return back()->withErrors(['email' => 'No encontramos un usuario con ese correo.']);
        }

        $usuario->contrasena = Hash::make($request->password);
        $usuario->save();

        // Eliminar el token usado
        DB::table('password_reset_tokens')
          ->where('email', $request->email)
          ->delete();

        event(new PasswordReset($usuario));

        return redirect()->route('login')
                         ->with('status', '✅ Contraseña restablecida correctamente. Ya puedes iniciar sesión.');
    }
}