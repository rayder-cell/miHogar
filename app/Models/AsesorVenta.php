<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AsesorVenta extends Model
{
    protected $table      = 'asesores_venta';
    protected $primaryKey = 'id_asesor';
    public $timestamps    = false;

    protected $fillable = [
        'nombre',
        'foto',
        'contacto',
        'descripcion', // agregado
        'cargo',
    ];

    public function proyectos()
    {
        return $this->belongsToMany(
            Proyecto::class,
            'asesores_proyectos',
            'id_asesor',
            'id_proyecto'
        )->withPivot('fecha_acceso');
    }
}