<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AsesorVenta;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class AsesorAdminController extends Controller
{
    public function index()
    {
        $asesores = AsesorVenta::all();
        return view('admin.asesores.index', compact('asesores'));
    }

    public function create()
    {
        return view('admin.asesores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'   => 'required|string|max:100',
            'contacto' => 'required|string|max:150',
            'foto'     => 'nullable|image|max:51200',
        ]);

        $ruta = null;
        if ($request->hasFile('foto')) {
            $resultado = Cloudinary::upload($request->file('foto')->getRealPath(), [
                'folder' => 'mihogar/asesores'
            ]);
            $ruta = $resultado->getSecurePath();
        }

        AsesorVenta::create([
            'nombre'   => $request->nombre,
            'contacto' => $request->contacto,
            'foto'     => $ruta,
        ]);

        return redirect()->route('admin.asesores.index')
                         ->with('success', 'Asesor creado correctamente.');
    }

    public function edit($id)
    {
        $asesor = AsesorVenta::findOrFail($id);
        return view('admin.asesores.edit', compact('asesor'));
    }

    public function update(Request $request, $id)
    {
        $asesor = AsesorVenta::findOrFail($id);

        $request->validate([
            'nombre'   => 'required|string|max:100',
            'contacto' => 'required|string|max:150',
            'foto'     => 'nullable|image|max:51200',
        ]);

        if ($request->hasFile('foto')) {
            $resultado = Cloudinary::upload($request->file('foto')->getRealPath(), [
                'folder' => 'mihogar/asesores'
            ]);
            $asesor->foto = $resultado->getSecurePath();
        }

        $asesor->nombre   = $request->nombre;
        $asesor->contacto = $request->contacto;
        $asesor->save();

        return redirect()->route('admin.asesores.index')
                         ->with('success', 'Asesor actualizado correctamente.');
    }

    public function destroy($id)
    {
        $asesor = AsesorVenta::findOrFail($id);
        $asesor->delete();

        return redirect()->route('admin.asesores.index')
                         ->with('success', 'Asesor eliminado correctamente.');
    }
}