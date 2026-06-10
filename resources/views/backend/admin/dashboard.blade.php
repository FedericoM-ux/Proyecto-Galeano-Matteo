@extends('plantilla')
@section('contenido')
<div class="container">
    <h1>Panel de Administrador</h1>

    <p>Bienvenido, {{ auth()->user()->name }}</p>

    <a href="/productos">Gestionar productos</a>
</div>
@endsection