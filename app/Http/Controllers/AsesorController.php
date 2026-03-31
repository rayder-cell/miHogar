<?php

namespace App\Http\Controllers;

use App\Models\AsesorVenta;
use Illuminate\Http\Request;

class AsesorController extends Controller
{
    public function index()
    {
        $asesores = AsesorVenta::all();
        return view('asesores.index', compact('asesores'));
    }
}