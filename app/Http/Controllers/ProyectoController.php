<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    public function index(Request $request)
    {
        $query = Proyecto::query();

        // Filtro por distrito si viene desde el dropdown
        if ($request->has('distrito') && $request->distrito != '') {
            $query->where('distrito', $request->distrito);
        }

        $proyectos = $query->get();

        return view('proyectos.index', compact('proyectos'));
    }

    public function show($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        return view('proyectos.show', compact('proyecto'));
    }
}