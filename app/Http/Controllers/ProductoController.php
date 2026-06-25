<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{

    public function main()
    {
        $productos = Producto::whereJsonContains('secciones', 'inicio')->get(); 
        return view('main', compact('productos'));
    }

    public function index(Request $request)
    {
        $query = Producto::whereJsonContains('secciones', 'productos');

        $query->when($request->filled('buscar'), function ($q) use ($request) {
            $termino = '%' . $request->buscar . '%';
            return $q->where(function ($subQuery) use ($termino) {
                $subQuery->where('nombre', 'LIKE', $termino)
                         ->orWhere('descripcion', 'LIKE', $termino);
            });
        });

        $query->when($request->filled('genero'), function ($q) use ($request) {
            return $q->where('genero', $request->genero);
        });

        $query->when($request->filled('marca'), function ($q) use ($request) {
            return $q->where('marca', $request->marca);
        });

        $query->when($request->filled('talle'), function ($q) use ($request) {
            return $q->where('talle', $request->talle);
        });

        $query->when($request->filled('precio_min'), function ($q) use ($request) {
            return $q->where('precio', '>=', $request->precio_min);
        });

        $query->when($request->filled('precio_max'), function ($q) use ($request) {
            return $q->where('precio', '<=', $request->precio_max);
        });

        $productos = $query->get();

        return view('productos', compact('productos'))->with($request->all());
    }

    public function ofertas()
    {
        $productos = Producto::whereJsonContains('secciones', 'ofertas')->get();
        return view('ofertas', compact('productos'));
    }

    public function mayorista()
    {
        $productos = Producto::whereJsonContains('secciones', 'mayorista')->get();
        return view('ventaMayorista', compact('productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'secciones' => 'nullable|array',
            'genero' => 'nullable|string|max:20', 
            'marca' => 'nullable|string|max:50',  
            'talle' => 'nullable|string|max:10',  
        ]);

        $rutaImagen = null;

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $imagen->move(public_path('images/productos'), $nombreImagen);
            $rutaImagen = 'images/productos/' . $nombreImagen;
        }

        // Creamos el registro con los nuevos atributos de filtros
        Producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'url_imagen' => $rutaImagen,
            'secciones' => $request->secciones ?? ['productos'],
            'genero' => $request->genero ?: null, 
            'marca' => $request->marca ?: null,
            'talle' => $request->talle ?: null,
        ]);

        return redirect()->back()->with('success', '¡Producto creado y asignado a sus secciones con éxito!');
    }

    // Método de Actualización (Update) incluyendo edición de filtros
    public function update(Request $request, Producto $producto) 
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'secciones' => 'nullable|array', 
            'genero' => 'nullable|string|max:20', 
            'marca' => 'nullable|string|max:50',  
            'talle' => 'nullable|string|max:10',  
        ]);

        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->stock = $request->stock;
        $producto->secciones = $request->secciones ?? []; 
        
        // Asignamos los nuevos valores filtrables
        $producto->genero = $request->genero ?: null; 
        $producto->marca = $request->marca ?: null;
        $producto->talle = $request->talle ?: null;

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