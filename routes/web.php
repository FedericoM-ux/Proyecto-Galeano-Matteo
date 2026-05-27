<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main');
});

Route::get('/main', function () {
    return view('main');
});

Route::get('/shop', function () {
    return view('shop');
});

/*Login sin protección*/
Route::get('/login', [AuthControllerphp::class, 'formularioLogin']);

/*doble proteccion*/
middleware(['auth','rol.admin'])->group(function(){
Route::get('/login', [AuthControllerphp::class, 'formularioLogin']);
});

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
