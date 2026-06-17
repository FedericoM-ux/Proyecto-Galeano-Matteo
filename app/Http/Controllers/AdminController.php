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
    // 1. Validamos los datos con un criterio un poco más flexible para probar
    $request->validate([
        'nombre' => 'required|string|max:100',
        'descripcion' => 'required|string|max:500',
        'precio' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120', // Subimos el límite a 5MB por las dudas
    ]);

    $rutaImagen = null;

    // 2. Procesamos la imagen si fue adjuntada
    if ($request->hasFile('imagen')) {
        $file = $request->file('imagen');
        
        // Creamos un nombre único para el archivo
        $nombreImagen = time() . '.' . $file->getClientOriginalExtension();
        
        // Nos aseguramos de que la carpeta public/images exista en el proyecto
        $destino = public_path('images');
        if (!file_exists($destino)) {
            mkdir($destino, 0777, true);
        }

        // Movemos físicamente la foto
        $file->move($destino, $nombreImagen);
        
        // Guardamos la ruta relativa
        $rutaImagen = 'images/' . $nombreImagen;
    }

    // 3. Guardamos en la Base de Datos
    Producto::create([
        'nombre' => $request->nombre,
        'descripcion' => $request->descripcion,
        'precio' => $request->precio,
        'stock' => $request->stock,
        'url_imagen' => $rutaImagen, // Si no se subió nada, guardará NULL sin romper
    ]);

    return redirect()->back()->with('success', '¡Producto guardado exitosamente en la base de datos!');
}
}
