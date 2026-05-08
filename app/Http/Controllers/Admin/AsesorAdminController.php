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
            'nombre'      => 'required|string|max:100',
            'contacto'    => 'required|string|max:150',
            'descripcion' => 'nullable|string',
            'foto_url'    => 'nullable|string',
        ]);

        AsesorVenta::create([
            'nombre'      => $request->nombre,
            'contacto'    => $request->contacto,
            'descripcion' => $request->descripcion,
            'cargo'       => $request->cargo,
            'foto'        => $request->foto_url ?: null,
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
            'nombre'      => 'required|string|max:100',
            'contacto'    => 'required|string|max:150',  // string es más flexible
            'descripcion' => 'nullable|string',
            'cargo'       => 'required|string|max:100',
            'foto_url'    => 'nullable|string',           // nullable, no required
        ]);

        $asesor->nombre   = $request->nombre;
        $asesor->contacto = $request->contacto;
        $asesor->cargo    = $request->cargo;

        if ($request->filled('descripcion')) {
            $asesor->descripcion = $request->descripcion;
        }

        if ($request->filled('foto_url')) {
            $asesor->foto = $request->foto_url;
        }

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
