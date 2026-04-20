<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/main', function () {
    return view('main');
});

Route::get('/shop', function () {
    return view('shop');
});

Route::get('/user', function () {
    return view('user');
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
