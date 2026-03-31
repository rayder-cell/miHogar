<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table      = 'usuarios';
    protected $primaryKey = 'id_usuario';
    public $timestamps    = false; // tu tabla no tiene created_at/updated_at

    protected $fillable = [
        'dni',
        'telefono',
        'correo',
        'contrasena',
        'nombre',
        'comentario',
        'titulo_comentario',
    ];

    protected $hidden = [
        'contrasena',
    ];

    public function proyectos()
    {
        return $this->belongsToMany(
            Proyecto::class,
            'usuarios_proyectos',
            'id_usuario',
            'id_proyecto'
        )->withPivot('fecha_acceso');
    }
}