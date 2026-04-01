<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProyectoAdminController extends Controller
{
    private function convertirYoutubeEmbed($url)
    {
        if (!$url) return null;

        if (str_contains($url, 'youtube.com/embed/')) {
            return preg_replace('/\?.*/', '', $url);
        }

        if (preg_match('/youtu\.be\/([a-zA-Z0-9_-]+)/', $url, $m)) {
            return 'https://www.youtube.com/embed/' . $m[1];
        }

        if (preg_match('/youtube\.com\/watch\?.*v=([a-zA-Z0-9_-]+)/', $url, $m)) {
            return 'https://www.youtube.com/embed/' . $m[1];
        }

        return $url;
    }

    public function index()
    {
        $proyectos = Proyecto::all();
        return view('admin.proyectos.index', compact('proyectos'));
    }

    public function create()
    {
        return view('admin.proyectos.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nombre_proyecto' => 'required|string|max:200',
                'distrito'        => 'required|string|max:100',
                'direccion'       => 'required|string|max:255',
                'descripcion'     => 'nullable|string',
                'foto'            => 'nullable|image|max:51200',
                'videos'          => 'nullable|string',
                'mapa'            => 'nullable|string',
            ]);

            $ruta = null;
            if ($request->hasFile('foto')) {
                $ruta = $request->file('foto')->store('images/proyectos', 'public');
            }

            Proyecto::create([
                'nombre_proyecto' => $request->nombre_proyecto,
                'distrito'        => $request->distrito,
                'direccion'       => $request->direccion,
                'descripcion'     => $request->descripcion,
                'fotos'           => $ruta ? 'storage/' . $ruta : null,
                'videos'          => $this->convertirYoutubeEmbed($request->videos),
                'mapa'            => $request->mapa,
            ]);

            return redirect('/admin/proyectos');
        } catch (\Exception $e) {
            dd('ERROR: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        return view('admin.proyectos.edit', compact('proyecto'));
    }

    public function update(Request $request, $id)
    {
        $proyecto = Proyecto::findOrFail($id);

        $request->validate([
            'nombre_proyecto' => 'required|string|max:200|unique:proyectos,nombre_proyecto,' . $id . ',id_proyecto',
            'distrito'        => 'required|string|max:100',
            'direccion'       => 'required|string|max:255',
            'descripcion'     => 'nullable|string',
            'foto'            => 'nullable|image|max:51200',
            'videos'          => 'nullable|string',
            'mapa'            => 'nullable|string',
        ]);

        // Foto: solo actualiza si se sube una nueva
        if ($request->hasFile('foto')) {
            $ruta = $request->file('foto')->store('images/proyectos', 'public');
            $proyecto->fotos = 'storage/' . $ruta;
        }

        $proyecto->nombre_proyecto = $request->nombre_proyecto;
        $proyecto->distrito        = $request->distrito;
        $proyecto->direccion       = $request->direccion;
        $proyecto->descripcion     = $request->descripcion;

        // ✅ Video: solo actualiza si el usuario envió algo
        if ($request->filled('videos')) {
            $proyecto->videos = $this->convertirYoutubeEmbed($request->videos);
        }

        // ✅ Mapa: solo actualiza si el usuario envió algo
        if ($request->filled('mapa')) {
            $proyecto->mapa = $request->mapa;
        }

        $proyecto->save();

        return redirect()->route('admin.proyectos.index')
            ->with('success', 'Proyecto actualizado correctamente.');
    }

    public function destroy($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        $proyecto->delete();

        return redirect()->route('admin.proyectos.index')
            ->with('success', 'Proyecto eliminado correctamente.');
    }
}