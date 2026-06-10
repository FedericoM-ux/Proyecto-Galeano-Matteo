@extends('plantilla')
@section('contenido')
<div class="container">
    <h1>Panel de Cliente</h1>

    <p>Hola {{ auth()->user()->name }}</p>

    <a href="/shop">Ir a la tienda</a>
</div>
@endsection