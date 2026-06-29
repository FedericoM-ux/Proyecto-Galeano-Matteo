@extends('plantilla')

@section('contenido')

@php
    $isAdmin = auth()->user()->rol_id == 1;
@endphp

<div class="container my-5">
    <div class="card shadow p-4">

        <h3 class="text-center mb-4">Comprobante de Compra</h3>

        <p><strong>Fecha:</strong> {{ \Carbon\Carbon::parse($venta->fecha_venta)->translatedFormat('d \d\e F \d\e Y \a \l\a\s H:i \h\s') }}</p>

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
        <a href="/main" class="btn btn-primary">Volver a la página principal</a>
        <a href="{{ route('ventas.pdf', $venta->id) }}" class="btn btn-danger" target="_blank">Ver PDF</a>
    @endif
    </div>
    </div>

</div>

@endsection