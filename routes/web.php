<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProductoController;


Route::get('/', [ProductoController::class, 'main']);
Route::get('/main', [ProductoController::class, 'main']);
Route::get('/productos', [ProductoController::class, 'index']);
Route::get('/ventaMayorista', [ProductoController::class, 'mayorista']);
Route::get('/ofertas', [ProductoController::class, 'ofertas']);

Route::get('/registro', [AuthController::class, 'formularioRegistro'])->name('registro');
Route::post('/registro', [AuthController::class, 'registrar'])->name('registro.guardar');
Route::get('/login', [AuthController::class, 'formularioLogin'])->name('login');
Route::post('/login', [AuthController::class, 'autenticar'])->name('login.autenticar');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'rol:admin'])->group(function() {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/crearProd', [AdminController::class, 'productosIndex'])->name('admin.crearProd.index');
    Route::post('/admin/crearProd/guardar', [ProductoController::class, 'store'])->name('admin.crearProd.store');
});

Route::middleware(['auth', 'rol:cliente'])->group(function () { 
    Route::get('/carrito', [CarritoController::class, 'index'])->name('cliente.carrito'); 
    Route::post('/carrito/agregar', [CarritoController::class, 'agregar'])->name('carrito.agregar'); 
    Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar'); 
    Route::post('/carrito/confirmar', [CarritoController::class, 'confirmar'])->name('carrito.confirmar'); 

    Route::get('/compra-confirmada', function () { 
        if (!session('total')) { 
            return redirect()->route('cliente.dashboard'); 
        } 
        return view('backend.usuarios.compra-confirmada'); 
    })->name('compra.confirmada'); 
}); 

Route::get('/comercialización', function () {
    return view('comercialización');
});

Route::get('/contacto', function () {
    return view('contacto');
});
Route::post('/contacto', [ContactoController::class, 'store'])->name('contacto.store');

Route::get('/términos', function () {
    return view('términos');
});

Route::get('/sobre-nosotros', function () {
    return view('sobre-nosotros');
});

Route::get('/admin-test', [AdminController::class, 'dashboard']);
Route::get('/cliente', function () {
    return view('backend.usuarios.cliente');
});

Route::resource('usuarios', UsuarioController::class);
Route::resource('productos', ProductoController::class);

Route::get('/comprobante/{id}', [CarritoController::class, 'comprobante'])->name('comprobante');

Route::get('/admin/ventas', [AdminController::class, 'ventas'])->name('admin.visVentas.index');

Route::get('/admin/consultas', [AdminController::class, 'consultas'])->name('admin.visConsultas.index');

Route::get('/cuenta', [UsuarioController::class, 'editCuenta'])->name('cuenta.edit');
Route::put('/cuenta', [UsuarioController::class, 'updateCuenta'])->name('cuenta.update');
Route::get('/cuenta/compras', [UsuarioController::class, 'compras'])->name('cuenta.compras');

Route::get('/ventas/{id}/pdf', [CarritoController::class, 'generarPdf'])->name('ventas.pdf');