<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{ public_path('css/estilo.css') }}">
    <meta charset="utf-8">
    <title>Comprobante</title>
</head>
<body>
<div class="logo">
    <img src="{{ public_path('images/pelota.png') }}" width="80">

    <div class="logo-text">
        <div class="main">LA DEJADA</div>
        <div class="sub">PADEL STORE</div>
    </div>
</div>
<br>
<h1>Comprobante de Compra</h1>
<br>
<p><strong>Fecha:</strong> {{ \Carbon\Carbon::parse($venta->fecha_venta)->translatedFormat('d \d\e F \d\e Y \a \l\a\s H:i \h\s') }}</p>
<br>
<table>
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

<h3 class="total">
    Total: ${{ $venta->total }}
</h3>

</body>
</html>