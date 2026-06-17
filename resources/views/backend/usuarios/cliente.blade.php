@extends('plantilla')
@section('contenido')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 60vh;">
    <div class="text-center">
        <h1 class="mb-3">Panel de Cliente</h1>

        <img src="{{ asset('images/user.svg') }}" height="30" class="mb-2">

        <div class="text-muted fs-5 mb-3">
            Bienvenido, {{ auth()->user()->nombre }}
        </div>

        <a href="/carrito" class="btn btn-success">
            Ir a la Tienda
        </a>
    </div>
</div>
@endsection