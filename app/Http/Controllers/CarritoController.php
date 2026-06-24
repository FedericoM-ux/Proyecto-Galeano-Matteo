<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\VentaCabecera;

class CarritoController extends Controller
{
    private function obtenerCarrito()
{
    return VentaCabecera::firstOrCreate(
        [
            'user_id' => auth()->id(),
            'estado' => 'carrito'
        ],
        [
            'total' => 0
        ]
    );
}

    public function index()
    {
        $carrito = $this->obtenerCarrito();

        $items = $carrito->detalles()
            ->with('producto')
            ->get();

        $total = $carrito->total;

        return view('backend.usuarios.carrito', compact('items', 'total'));
    }

    public function agregar(Request $request)
{
    if (auth()->check() && auth()->user()->esAdmin()) {
    return back()->with(
        'error',
        'Los administradores no pueden realizar compras.'
    );
}
    $request->validate([
        'producto_id' => 'required|exists:productos,id',
        'cantidad' => 'required|integer|min:1'
    ]);

    $producto = Producto::findOrFail($request->producto_id);

    if ($producto->stock < $request->cantidad) {
        return back()->with('error', 'No hay suficiente stock disponible');
    }

    $carrito = $this->obtenerCarrito();

    $item = $carrito->detalles()
        ->where('producto_id', $producto->id)
        ->first();

    if ($item) {

        $item->cantidad += $request->cantidad;
        $item->subtotal = $item->cantidad * $item->precio_unitario;
        $item->save();

    } else {

        $carrito->detalles()->create([
            'producto_id' => $producto->id,
            'cantidad' => $request->cantidad,
            'precio_unitario' => $producto->precio,
            'subtotal' => $producto->precio * $request->cantidad,
        ]);
    }

    $this->recalcularTotal($carrito);

    return redirect()
        ->route('cliente.carrito')
        ->with('success', 'Producto agregado al carrito');
}

    public function eliminar($id)
    {
        $carrito = $this->obtenerCarrito();

        $carrito->detalles()
            ->where('id', $id)
            ->delete();

        $this->recalcularTotal($carrito);

        return back()->with('success', 'Producto eliminado del carrito');
    }

    public function confirmar()
{
    $carrito = $this->obtenerCarrito();

    if ($carrito->detalles()->count() == 0) {
        return back()->with('error', 'Tu carrito está vacío');
    }

    foreach ($carrito->detalles as $detalle) {

        $producto = $detalle->producto;

        if ($producto->stock < $detalle->cantidad) {
            return back()->with('error', "Stock insuficiente para {$producto->nombre}");
        }

        $producto->decrement('stock', $detalle->cantidad);
    }

    $total = $carrito->total;

    $carrito->update([
        'estado' => 'confirmado',
        'fecha_venta' => now()
    ]);

    return redirect()->route('comprobante', $carrito->id);
}

    private function recalcularTotal(VentaCabecera $carrito)
    {
        $total = $carrito->detalles()->sum('subtotal');

        $carrito->update([
            'total' => $total
        ]);
    }

    public function comprobante($id)
{
    $venta = VentaCabecera::with('detalles.producto')->findOrFail($id);

    return view('backend.usuarios.comprobante', compact('venta'));
}
}