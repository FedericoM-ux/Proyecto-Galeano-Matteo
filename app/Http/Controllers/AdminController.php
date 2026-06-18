<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Producto;
use App\Models\VentaCabecera;
use App\Models\Consulta;

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
        $productos = Producto::all(); 
        return view('backend.admin.crearProd', compact('totalProductos', 'productos'));
    }
    
    public function ventas()
{
    $ventas = VentaCabecera::with('usuario')
        ->where('estado', 'confirmado')
        ->latest()
        ->get();

    $totalVentas = $ventas->count();
    $montoTotal = $ventas->sum('total');

    return view('backend.admin.visVentas', compact('ventas', 'totalVentas', 'montoTotal'));
}
    public function consultas()
{
    $consultas = Consulta::latest()->get();

    return view('backend.admin.visConsultas', compact('consultas'));
}

    public function storeProducto(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:100',
        'descripcion' => 'required|string|max:500',
        'precio' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120', // Subimos el límite a 5MB por las dudas
    ]);

    $rutaImagen = null;
    if ($request->hasFile('imagen')) {
        $file = $request->file('imagen');
        $nombreImagen = time() . '.' . $file->getClientOriginalExtension();
        $destino = public_path('images');
        if (!file_exists($destino)) {
            mkdir($destino, 0777, true);
        }
        $file->move($destino, $nombreImagen);
        $rutaImagen = 'images/' . $nombreImagen;
    }

    Producto::create([
        'nombre' => $request->nombre,
        'descripcion' => $request->descripcion,
        'precio' => $request->precio,
        'stock' => $request->stock,
        'url_imagen' => $rutaImagen, 
    ]);

    return redirect()->back()->with('success', '¡Producto guardado exitosamente en la base de datos!');
}
}
