<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;
use App\Models\Testimonio;

class ProyectoController extends Controller
{
    // Página principal → hero/slider
    public function index()
    {
        $proyectos = Proyecto::all();
        return view('inicio', compact('proyectos'));
    }

    // Página lista de proyectos
    public function lista(Request $request)
    {
        $query = Proyecto::query();
        if ($request->distrito) {
            $query->where('distrito', $request->distrito);
        }
        $proyectos = $query->get();
        return view('proyectos.index', compact('proyectos'));
    }

    // Detalle de proyecto
    public function show($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        return view('proyectos.show', compact('proyecto'));
    }

    public function index()
    {
        $proyectos   = Proyecto::all();
        $testimonios = Testimonio::where('activo', true)->get();
        return view('inicio', compact('proyectos', 'testimonios'));
    }
}
