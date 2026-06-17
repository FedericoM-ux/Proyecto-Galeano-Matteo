<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function main()
    {
        // Trae todos los productos sin filtrar por 'activo'
        $productos = Producto::all(); 
        return view('main', compact('productos'));
    }

    public function index()
    {
        $productos = Producto::all();
        return view('productos', compact('productos'));
    }

    public function ofertas()
    {
        $productos = Producto::all();
        return view('ofertas', compact('productos'));
    }

    public function mayorista()
    {
        $productos = Producto::all();
        return view('ventaMayorista', compact('productos'));
    }
}