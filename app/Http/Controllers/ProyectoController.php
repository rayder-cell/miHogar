<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    public function index()
    {
        $proyectos = Proyecto::all();
        return view('inicio', compact('proyectos'));
    }

    public function show($id)
    {
        $proyecto = Proyecto::with('asesores')->findOrFail($id);
        return view('proyectos.show', compact('proyecto'));
    }
}
