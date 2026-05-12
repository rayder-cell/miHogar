<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;

class BuscadorController extends Controller
{
    public function buscar(Request $request)
    {
        $query = Proyecto::query();

        if ($request->filled('q')) {
            $q = $request->q;
            $query->where(function($sql) use ($q) {
                $sql->where('nombre_proyecto', 'ilike', "%$q%")
                    ->orWhere('distrito', 'ilike', "%$q%")
                    ->orWhere('direccion', 'ilike', "%$q%");
            });
        }

        if ($request->filled('distrito')) {
            $query->where('distrito', 'ilike', "%{$request->distrito}%");
        }

        if ($request->filled('precio_max')) {
            $query->where('precio', '<=', $request->precio_max);
        }

        if ($request->filled('precio_min')) {
            $query->where('precio', '>=', $request->precio_min);
        }

        $proyectos = $query->orderBy('nombre_proyecto')->get();
        $distritos = Proyecto::selectRaw('MIN(distrito) as distrito')
            ->groupByRaw('LOWER(distrito)')
            ->orderByRaw('LOWER(distrito)')
            ->pluck('distrito');

        return view('buscar', compact('proyectos', 'distritos'));
    }
}