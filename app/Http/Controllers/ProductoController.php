<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    // 1. Página de Inicio (Muestra solo los asignados a 'inicio')
    public function main()
    {
        $productos = Producto::whereJsonContains('secciones', 'inicio')->get(); 
        return view('main', compact('productos'));
    }

    // 2. Catálogo General (Muestra solo los asignados a 'productos')
    public function index()
    {
        $productos = Producto::whereJsonContains('secciones', 'productos')->get();
        return view('productos', compact('productos'));
    }

    // 3. Página de Ofertas (Muestra solo los asignados a 'ofertas')
    public function ofertas()
    {
        $productos = Producto::whereJsonContains('secciones', 'ofertas')->get();
        return view('ofertas', compact('productos'));
    }

    // 4. Venta Mayorista (Muestra solo los asignados a 'mayorista')
    public function mayorista()
    {
        $productos = Producto::whereJsonContains('secciones', 'mayorista')->get();
        return view('ventaMayorista', compact('productos'));
    }

    // NUEVO: Método para guardar un producto NUEVO con sus secciones e imagen
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'secciones' => 'nullable|array', // Validación para los checkboxes nuevos
        ]);

        $rutaImagen = null;

        // Procesamos la imagen si fue adjuntada
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            
            // Guardamos en la misma carpeta que usás en el update
            $imagen->move(public_path('images/productos'), $nombreImagen);
            $rutaImagen = 'images/productos/' . $nombreImagen;
        }

        // Creamos el registro en HeidiSQL
        Producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'url_imagen' => $rutaImagen,
            'secciones' => $request->secciones ?? ['productos'], // Si no tildó ninguno, por defecto va a Catálogo General
        ]);

        return redirect()->back()->with('success', '¡Producto creado y asignado a sus secciones con éxito!');
    }

    // Método de Actualización (Update) procesando correctamente checkboxes e imágenes
    public function update(Request $request, Producto $producto) 
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'secciones' => 'nullable|array', 
        ]);

        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->stock = $request->stock;
        
        // Guardamos las secciones editadas (si quitó todas, se limpia guardando un array vacío)
        $producto->secciones = $request->secciones ?? []; 

        if ($request->hasFile('imagen')) {
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