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

    // Cambiá el parámetro para usar $producto en lugar de $id si usás Route Model Binding
public function update(Request $request, Producto $producto) 
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'required|string',
        'precio' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
    ]);

    // Ya no hace falta el Producto::findOrFail() porque Laravel ya buscó el objeto

    $producto->nombre = $request->nombre;
    $producto->descripcion = $request->descripcion;
    $producto->precio = $request->precio;
    $producto->stock = $request->stock;

    if ($request->hasFile('imagen')) {
        // Usamos $producto->url_imagen en lugar de $id
        if ($producto->url_imagen && file_exists(public_path($producto->url_imagen))) {
            unlink(public_path($producto->url_imagen));
        }

        $imagen = $request->file('imagen');
        $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
        $imagen->move(public_path('images/productos'), $nombreImagen);
        
        $producto->url_imagen = 'images/productos/' . $nombreImagen;
    }

    $producto->save();

    return redirect()->back()->with('success', 'Producto actualizado correctamente.');
}

    public function destroy(Producto $producto)
    {
    $producto->delete();
    return redirect()->back()->with('success', 'Producto eliminado correctamente');
    }
}