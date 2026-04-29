@extends('plantilla')
@section('contenido')
<div class="container text-center mt-5">
    <h1 class="mb-3">Carrito de Compras</h1>
    <img src="{{ asset('images/alert-square-rounded.svg') }}" height="30">
    <span class="text-muted fs-5">Tu carrito está vacío.</span><br>

    <a href="/productos" class="btn btn-success mt-3">
        Ver productos
    </a>
</div>
@endsection