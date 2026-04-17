<!DOCTYPE html>
<html>
<head>
    <title>La Dejada Padel</title>
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark mi-navbar">
    <div class="container-fluid px-0">

        <a class="navbar-brand ms-2" href="/proyecto">
            <img src="{{ asset('images/icono.PNG') }}" alt="Icono" height="40">
        </a>

        <div class="navbar-nav mx-auto">
            <a class="nav-link" href="/">Buscar</a>
        </div>

        <a class="navbar-brand" href="/">
        <img src="{{ asset('images/user.svg') }}" height="30">
        <img src="{{ asset('images/shopping-cart.svg') }}" height="30">
</a>

    </div>
</nav>

<!-- separador para cuando incluyamos el carrusel de imagenes-->
<div class="separador"></div>

<div class="container mt-4">
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Sobre Nosotros</h1>
            <p>Somos una tienda que vende articulos de pádel, entre grips, pelotas y más. Hacemos envios por todo Corrientes. Podes hacer consultas por nuestro Instagram o WhatsApp.</p>
        </div>
    </div>
</div>


<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>