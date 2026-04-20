<!DOCTYPE html>
<html>

<head>
    <title>Productos</title>
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar">
    <div class="container-fluid px-0">

        <a class="navbar-brand ms-2" href="/main">
            <img src="{{ asset('images/icono.PNG') }}" alt="Icono" height="40">
        </a>
        
        <div class="navbar-brand mx-auto">
            <a class="nav-link" href="/">Buscar</a>
        </div>

        <a class="navbar-brand" href="/user">
        <img src="{{ asset('images/user.svg') }}" height="30">
        </a>
        
        <a class="navbar-brand" href="/shop">
        <img src="{{ asset('images/shopping-cart.svg') }}" height="30">
        </a>
    </div>
</nav>

<div style="text-align:center; margin-top:50px;">
    <h1>Productos:</h1>
</div>
</body>

</html>