<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Proyecto;
use App\Models\AsesorVenta;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProyectos  = Proyecto::count();
        $totalAsesores   = AsesorVenta::count();
        $ultimosProyectos = Proyecto::latest('id_proyecto')->take(5)->get();

        return view('admin.dashboard', compact(
            'totalProyectos',
            'totalAsesores',
            'ultimosProyectos'
        ));
    }
}