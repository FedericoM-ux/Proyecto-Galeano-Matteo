<!DOCTYPE html>
<html>

<head>
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light navbar">
    <div class="container-fluid py-3">
            <div class="col-md-3">
                <a class="navbar-brand d-flex align-items-center" href="/main">
                    <img src="{{ asset('images/Icono.PNG') }}" alt="Logo La Dejada" width="130" class="me-2">
                </a>
            </div>
            
            <div class="col-md-6">
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Buscar productos..." aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
            </div>
            
            <a class="navbar-brand ms-auto" href="/user">
                <img src="{{ asset('images/user.svg') }}" height="30">
            </a>
                    <a class="navbar-brand position-relative" href="/shop">
    <img src="{{ asset('images/shopping-cart.svg') }}" height="30">
    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">0</span>
</a>
            </div>
    </div>
</nav>


<div class="container text-center mt-5">
    <h1 class="mb-3">Carrito de Compras</h1>
    <img src="{{ asset('images/alert-square-rounded.svg') }}" height="30">
    <span class="text-muted fs-5">Tu carrito está vacío.</span><br>

    <a href="/productos" class="btn btn-success mt-3">
        Ver productos
    </a>
</div>

</body>
</html>