<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\CarritoController;

use App\Http\Controllers\UsuarioController;

use App\Http\Controllers\ProductoController;


// --- VISTAS DINÁMICAS DESDE EL PRODUCTOCONTROLLER ---
Route::get('/', [ProductoController::class, 'main']);
Route::get('/main', [ProductoController::class, 'main']);
Route::get('/productos', [ProductoController::class, 'index']);
Route::get('/ventaMayorista', [ProductoController::class, 'mayorista']);
Route::get('/ofertas', [ProductoController::class, 'ofertas']);
// ---------------------------------------------------

Route::get('/shop', function () {
    return view('shop');
});

// --- AUTENTICACIÓN ---
Route::get('/registro', [AuthController::class, 'formularioRegistro'])->name('registro');
Route::post('/registro', [AuthController::class, 'registrar'])->name('registro.guardar');
Route::get('/login', [AuthController::class, 'formularioLogin'])->name('login');
Route::post('/login', [AuthController::class, 'autenticar'])->name('login.autenticar');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// --- PANEL ADMINISTRADOR ---
Route::middleware(['auth', 'rol:admin'])->group(function() {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/admin/crearProd', [AdminController::class, 'productosIndex'])->name('admin.crearProd.index');
    Route::post('/admin/crearProd/guardar', [AdminController::class, 'storeProducto'])->name('admin.crearProd.store');
});

// --- ÁREA CLIENTE Y CARRITO DE COMPRAS ---
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

// --- INFORMACIÓN GENERAL Y CONTACTO ---
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

// --- RUTAS DE PRUEBA / TEMPORALES ---
Route::get('/admin-test', [AdminController::class, 'dashboard']);
Route::get('/cliente', function () {
    return view('backend.usuarios.cliente');
});


Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('usuarios', UsuarioController::class);

