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

    // 2. Catálogo General CON FILTROS DINÁMICOS
    public function index(Request $request)
    {
        // Empezamos la consulta filtrando por la sección 'productos'
        $query = Producto::whereJsonContains('secciones', 'productos');

        // Filtro por Género (solo si se seleccionó uno)
        $query->when($request->filled('genero'), function ($q) use ($request) {
            return $q->where('genero', $request->genero);
        });

        // Filtro por Marca
        $query->when($request->filled('marca'), function ($q) use ($request) {
            return $q->where('marca', $request->marca);
        });

        // Filtro por Talle
        $query->when($request->filled('talle'), function ($q) use ($request) {
            return $q->where('talle', $request->talle);
        });

        // Filtro por Rango de Precio Mínimo
        $query->when($request->filled('precio_min'), function ($q) use ($request) {
            return $q->where('precio', '>=', $request->precio_min);
        });

        // Filtro por Rango de Precio Máximo
        $query->when($request->filled('precio_max'), function ($q) use ($request) {
            return $q->where('precio', '<=', $request->precio_max);
        });

        // Ejecutamos la consulta filtrada
        $productos = $query->get();

        // Retornamos manteniendo los filtros en la URL para la vista
        return view('productos', compact('productos'))->with($request->all());
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

    // Método para guardar un producto NUEVO incluyendo los filtros
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'secciones' => 'nullable|array',
            'genero' => 'nullable|string|max:20', // <-- AGREGADO
            'marca' => 'nullable|string|max:50',  // <-- AGREGADO
            'talle' => 'nullable|string|max:10',  // <-- AGREGADO
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
            'genero' => $request->genero ?: null, // Si viene vacío, guarda NULL
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
            'genero' => 'nullable|string|max:20', // <-- AGREGADO
            'marca' => 'nullable|string|max:50',  // <-- AGREGADO
            'talle' => 'nullable|string|max:10',  // <-- AGREGADO
        ]);

        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->stock = $request->stock;
        $producto->secciones = $request->secciones ?? []; 
        
        // Asignamos los nuevos valores filtrables
        $producto->genero = $request->genero ?: null; // Convierte a NULL si no se selecciona ninguno
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