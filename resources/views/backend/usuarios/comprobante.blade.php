@extends('plantilla')

@section('contenido')

@php
    $isAdmin = auth()->user()->rol_id == 1;
@endphp

<div class="container my-5">

    @if(!$isAdmin)
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i> 
        <strong>¡Éxito!</strong> El comprobante ha sido enviado a su correo.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card shadow p-4">

        <h3 class="text-center mb-4">Comprobante de Compra</h3>

        <p><strong>Venta N°:</strong> {{ $venta->id }}</p>
        <p><strong>Fecha:</strong> {{ $venta->fecha_venta }}</p>

        <hr>

        <table class="table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                </tr>
            </thead>

            <tbody>
                @foreach($venta->detalles as $detalle)
                <tr>
                    <td>{{ $detalle->producto->nombre }}</td>
                    <td>{{ $detalle->cantidad }}</td>
                    <td>${{ $detalle->subtotal }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <hr>

        <h4 class="text-end">
            Total: ${{ $venta->total }}
        </h4>

        <div class="text-center mt-3">

    @if($isAdmin)
        <a href="{{ route('admin.visVentas.index') }}" class="btn btn-primary">
            Volver a Ventas
        </a>
    @else
        <a href="/main" class="btn btn-primary">
            Seguir Comprando
        </a>
    @endif
    </div>
    </div>

</div>

@endsection