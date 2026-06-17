<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Producto;

class AdminController extends Controller
{
    public function dashboard()
    {
        $usuarios = Usuario::with('rol')->get();
    $totalUsuarios = Usuario::count();
    return view('backend.admin.dashboard', compact('totalUsuarios', 'usuarios'));}

    public function productosIndex()
    {
        $totalProductos = Producto::count();
        $productos = Producto::all(); // Traemos todos los productos de HeidiSQL
        
        return view('backend.admin.crearProd', compact('totalProductos', 'productos'));
    }

    public function storeProducto(Request $request)
{
    // Agregamos el límite estricto de caracteres máximos
    $request->validate([
        'nombre' => 'required|string|max:100', // Máximo 100 caracteres
        'descripcion' => 'required|string|max:500', // Máximo 500 caracteres
        'precio' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
    ], [
        // Opcional: Podés personalizar el mensaje en español si querés
        'nombre.max' => 'El nombre del producto no puede superar los 100 caracteres.',
        'descripcion.max' => 'La descripción no puede superar los 500 caracteres.',
    ]);

    // Si pasa la validación, se guarda en la base de datos
    Producto::create([
        'nombre' => $request->nombre,
        'descripcion' => $request->descripcion,
        'precio' => $request->precio,
        'stock' => $request->stock,
    ]);

    return redirect()->back()->with('success', '¡Producto cargado con éxito!');
}
}
