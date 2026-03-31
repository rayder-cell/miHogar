<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $table      = 'proyectos';
    protected $primaryKey = 'id_proyecto';
    public $timestamps    = false;

    protected $fillable = [
        'nombre_proyecto',
        'distrito',
        'direccion',
        'descripcion',
        'fotos',
        'videos',
        'mapa',
    ];

    public function usuarios()
    {
        return $this->belongsToMany(
            Usuario::class,
            'usuarios_proyectos',
            'id_proyecto',
            'id_usuario'
        )->withPivot('fecha_acceso');
    }

    public function asesores()
    {
        return $this->belongsToMany(
            AsesorVenta::class,
            'asesores_proyectos',
            'id_proyecto',
            'id_asesor'
        )->withPivot('fecha_acceso');
    }
}