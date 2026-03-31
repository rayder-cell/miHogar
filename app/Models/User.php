<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table      = 'usuarios';
    protected $primaryKey = 'id_usuario';
    public $timestamps    = false;

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

    protected function casts(): array
    {
        return [
            'contrasena' => 'hashed',
        ];
    }

    // ← Agrega estos métodos
    public function getEmailAttribute()
    {
        return $this->correo;
    }

    public function setEmailAttribute($value)
    {
        $this->correo = $value;
    }

    public function getAuthPassword()
    {
        return $this->contrasena;
    }
}