<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reclamacion;
use Illuminate\Http\Request;

class ReclamacionAdminController extends Controller
{
    // Lista todas las reclamaciones, más recientes primero
    public function index(Request $request)
    {
        $query = Reclamacion::latest();

        // Filtro de búsqueda por nombre, DNI o tipo
        if ($request->filled('buscar')) {
            $q = $request->buscar;
            $query->where(function ($qb) use ($q) {
                $qb->where('nombre',  'ilike', "%{$q}%")
                   ->orWhere('dni',   'ilike', "%{$q}%")
                   ->orWhere('tipo',  'ilike', "%{$q}%")
                   ->orWhere('correo','ilike', "%{$q}%");
            });
        }

        $reclamaciones = $query->paginate(15)->withQueryString();
        $total         = Reclamacion::count();

        return view('admin.reclamaciones.index', compact('reclamaciones', 'total'));
    }

    // Eliminar una reclamación
    public function destroy(Reclamacion $reclamacion)
    {
        $reclamacion->delete();

        return redirect()
            ->route('admin.reclamaciones.index')
            ->with('success', 'Reclamación eliminada correctamente.');
    }
}