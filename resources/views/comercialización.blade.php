<!DOCTYPE html>
<html>

<head>
    <title>Comercialización</title>
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar">
    <div class="container-fluid px-0">

        <a class="navbar-brand ms-2" href="/main">
            <img src="{{ asset('images/icono.PNG') }}" alt="Icono" height="40">
        </a>

        <a class="navbar-brand ms-auto" href="/user">
        <img src="{{ asset('images/user.svg') }}" height="30">
        </a>
        
        <a class="navbar-brand" href="/shop">
        <img src="{{ asset('images/shopping-cart.svg') }}" height="30">
        </a>
    </div>
</nav>

<div style="text-align:center; margin-top:50px;">
    <h1>Comercialización:</h1>
</div>

<p>Métodos de Pago:<br>Efectivo, Transferencia Bancaria, Tarjeta de Crédito/Debito.</p>

<p>Métodos de Envío:<br>Retiro por nuestra sucursal o envíos a todo el país a través de correo argentino.</p>
<!--Agregar mapa de la sucursal, tarjetas, etc.-->
</body>

</html>