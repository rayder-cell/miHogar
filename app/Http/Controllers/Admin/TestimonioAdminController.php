<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonio;
use Illuminate\Http\Request;

class TestimonioAdminController extends Controller
{
    public function index()
    {
        $testimonios = Testimonio::orderBy('id_testimonio', 'desc')->get();
        return view('admin.testimonios.index', compact('testimonios'));
    }

    public function create()
    {
        return view('admin.testimonios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'     => 'required|string|max:100',
            'ubicacion'  => 'nullable|string|max:100',
            'titulo'     => 'nullable|string|max:200',
            'comentario' => 'nullable|string',
            'foto'       => 'nullable|string',
        ]);

        Testimonio::create([
            'nombre'     => $request->nombre,
            'ubicacion'  => $request->ubicacion,
            'titulo'     => $request->titulo,
            'comentario' => $request->comentario,
            'foto'       => $request->foto,
            'activo'     => $request->has('activo') ? true : false,
        ]);

        return redirect()->route('admin.testimonios.index')
            ->with('success', 'Testimonio creado correctamente.');
    }

    public function edit($id)
    {
        $testimonio = Testimonio::findOrFail($id);
        return view('admin.testimonios.edit', compact('testimonio'));
    }

    public function update(Request $request, $id)
    {
        $testimonio = Testimonio::findOrFail($id);

        $request->validate([
            'nombre'     => 'required|string|max:100',
            'ubicacion'  => 'nullable|string|max:100',
            'titulo'     => 'nullable|string|max:200',
            'comentario' => 'nullable|string',
            'foto'       => 'nullable|string',
        ]);

        $testimonio->nombre     = $request->nombre;
        $testimonio->ubicacion  = $request->ubicacion;
        $testimonio->titulo     = $request->titulo;
        $testimonio->comentario = $request->comentario;
        $testimonio->activo     = $request->has('activo') ? true : false;

        if ($request->filled('foto')) {
            $testimonio->foto = $request->foto;
        }

        $testimonio->save();

        return redirect()->route('admin.testimonios.index')
            ->with('success', 'Testimonio actualizado correctamente.');
    }

    public function destroy($id)
    {
        Testimonio::findOrFail($id)->delete();
        return redirect()->route('admin.testimonios.index')
            ->with('success', 'Testimonio eliminado correctamente.');
    }
}