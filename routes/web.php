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
