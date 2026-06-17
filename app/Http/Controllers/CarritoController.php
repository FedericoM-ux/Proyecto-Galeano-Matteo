<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarritoController extends Controller {
    private function obtenerCarrito() {           
    return VentaCabecera::firstOrCreate(             
        [                 
            'user_id' => auth()->id(),                 
            'estado'  => 'carrito',             
            ],             
            // Si crea uno nuevo, arranca con total 0             
            ['total' => 0]         
            );     
    } 

    public function index()
{
    // Obtenemos el carrito de la sesión (si no existe, pasamos un array vacío)
    $carrito = session()->get('cart', []);
    
    // Calculamos el total de la compra
    $total = 0;
    foreach ($carrito as $item) {
        $total += $item['precio'] * $item['cantidad'];
    }

    // Retornamos la vista del carrito enviando los datos
    return view('backend.usuarios.cliente', compact('carrito', 'total')); 
    // Nota: Ajustá 'backend.usuarios.cliente' por la vista donde quieras mostrar tu tabla del carrito
}

    public function agregar(Request $request)     {         $request->validate([             'producto_id' => 'required|exists:productos,id',             'cantidad'    => 'required|integer|min:1',         ]);         $producto = Producto::findOrFail($request->producto_id); 
    if ($producto->stock < $request->cantidad) {             return back()->with('error', 'No hay suficiente stock');         }         $carrito = $this->obtenerCarrito(); 
    $item = $carrito->detalles()                         ->where('producto_id', $producto->id)->first();         if ($item) { 
    $item->cantidad += $request->cantidad;             $item->subtotal  = $item->cantidad * $item->precio_unitario;             $item->save();         } else { 
        $carrito->detalles()->create([                 'producto_id'     => $producto->id,                 'cantidad'        => $request->cantidad,                 'precio_unitario' => $producto->precio,                 'subtotal'        => $producto->precio * $request->cantidad,             ]);         }         $this->recalcularTotal($carrito);         return back()->with('success', 'Producto agregado al carrito'); 
    }

    public function eliminar($id)     {         $carrito = $this->obtenerCarrito();
    $carrito->detalles()->where('id', $id)->delete();         $this->recalcularTotal($carrito);         return back()->with('success', 'Producto eliminado');} 
    
    public function confirmar()     {         $carrito = $this->obtenerCarrito();         if ($carrito->detalles()->count() === 0) {             return back()->with('error', 'Tu carrito está vacío');         }         $items = $carrito->detalles()->with('producto')->get();         $total = $carrito->total;
    $carrito->update([             'estado'      => 'confirmado',             'fecha_venta' => now(),         ]); 
    return redirect()->route('compra.confirmada')                          ->with('items', $items)                          ->with('total', $total);     } 

    private function recalcularTotal(VentaCabecera $carrito)     {
        $total = $carrito->detalles()->sum('subtotal');         $carrito->update(['total' => $total]);     }  
}   
     
