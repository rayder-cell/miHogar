<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table          = 'usuarios';
    protected $primaryKey     = 'id_usuario';
    public $timestamps        = false;
    protected $authPasswordName = 'contrasena'; // ← esta línea

    protected $fillable = [
        'nombre',
        'dni',
        'telefono',
        'correo',
        'contrasena',
        'comentario',
        'titulo_comentario',
    ];

    protected $hidden = [
        'contrasena',
    ];

    public function getAuthPassword()
    {
        return $this->contrasena;
    }
}