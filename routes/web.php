<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('main');
});

Route::get('/main', function () {
    return view('main');
});

Route::get('/shop', function () {
    return view('shop');
});

Route::get('/registro', [AuthController::class, 'formularioRegistro'])->name('registro');

Route::get('/login', [AuthController::class, 'formularioLogin'])->name('login');

Route::middleware(['auth','rol.admin'])->group(function(){
    Route::get('/admin', [AuthController::class, 'dashboard'])->name('admin.dashboard');
});

Route::middleware(['auth', 'rol:cliente'])->group(function () { 
    Route::get('/carrito', [CarritoController::class, 'index'])                           
    ->name('cliente.carrito'); 

    Route::post('/carrito/agregar', [CarritoController::class, 'agregar'])                                    
    ->name('carrito.agregar'); 

    Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])                                            
    ->name('carrito.eliminar'); 

    Route::post('/carrito/confirmar', [CarritoController::class, 'confirmar'])                                      
    ->name('carrito.confirmar'); 

     Route::get('/compra-confirmada', function () {         if (!session('total')) {             return redirect()->route('cliente.dashboard');         }         return view('backend.usuarios.compra-confirmada');     })->name('compra.confirmada'); }); 

Route::get('/productos', function () {
    return view('productos');
});

Route::get('/comercialización', function () {
    return view('comercialización');
});

Route::get('/contacto', function () {
    return view('contacto');
});

Route::get('/términos', function () {
    return view('términos');
});

Route::get('/sobre-nosotros', function () {
    return view('sobre-nosotros');
});

Route::get('/ventaMayorista', function () {
    return view('ventaMayorista');
});

Route::get('/ofertas', function () {
    return view('ofertas');
});

Route::get('/admin-test', [AdminController::class, 'dashboard']);
