<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Proyecto;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

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
                'fotos'           => 'nullable|string', // URL de Cloudinary
                'videos'          => 'nullable|string',
                'mapa'            => 'nullable|string',
            ]);

            Proyecto::create([
                'nombre_proyecto' => $request->nombre_proyecto,
                'distrito'        => $request->distrito,
                'direccion'       => $request->direccion,
                'descripcion'     => $request->descripcion,
                'fotos'           => $request->fotos, // URL directa de Cloudinary
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
            'fotos'           => 'nullable|string',
            'videos'          => 'nullable|string',
            'mapa'            => 'nullable|string',
        ]);

        if ($request->filled('fotos')) {
            $proyecto->fotos = $request->fotos;
        }

        $proyecto->nombre_proyecto = $request->nombre_proyecto;
        $proyecto->distrito        = $request->distrito;
        $proyecto->direccion       = $request->direccion;
        $proyecto->descripcion     = $request->descripcion;

        if ($request->filled('videos')) {
            $proyecto->videos = $this->convertirYoutubeEmbed($request->videos);
        }

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
