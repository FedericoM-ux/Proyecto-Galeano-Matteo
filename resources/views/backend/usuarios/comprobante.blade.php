@extends('plantilla')

@section('contenido')

<div class="container my-5">

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
            <a href="/productos" class="btn btn-primary">
                Seguir comprando
            </a>
        </div>

    </div>

</div>

@endsection