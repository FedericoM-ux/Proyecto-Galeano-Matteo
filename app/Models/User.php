<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Indicamos explícitamente la tabla por si las dudas
    protected $table = 'usuarios';

    // Campos permitidos para llenado masivo (¡Sin usar 'this'!)
    protected $fillable = [
        'nombre',
        'email',
        'password',
        'rol_id', // Requerido por la cátedra
    ];

    // Ocultar campos sensibles en las consultas
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Conversión de tipos de datos
    protected $casts = [
    'password' => 'hashed',
];
}

