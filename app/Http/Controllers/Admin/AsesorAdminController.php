<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AsesorVenta;
use Illuminate\Http\Request;

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
            'foto'     => 'nullable|image|max:2048',
        ]);

        $ruta = null;
        if ($request->hasFile('foto')) {
            $ruta = $request->file('foto')->store('images/asesores', 'public');
        }

        AsesorVenta::create([
            'nombre'   => $request->nombre,
            'contacto' => $request->contacto,
            'foto'     => $ruta ? 'storage/' . $ruta : null,
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
            'foto'     => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $ruta = $request->file('foto')->store('images/asesores', 'public');
            $asesor->foto = 'storage/' . $ruta;
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