<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // <-- AGREGADO para soportar softDeletes de tu migración

class Producto extends Model {
    use HasFactory, SoftDeletes; // <-- AGREGADO SoftDeletes acá

    protected $table = 'productos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'url_imagen',
        'activo',
        'secciones', // <-- AGREGADO: Permitimos que se pueda guardar este campo
    ];

    protected $casts = [
        'precio' => 'decimal:2',
        'stock' => 'integer',
        'activo' => 'boolean',
        'secciones' => 'array', // <-- AGREGADO: Crucial para que in_array() no tire error
    ];
}