<!DOCTYPE html>
<html>
<head>
    <title>La Dejada Padel</title>
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

<nav class="navbar navbar-expand-lg navbar-dark navbar2">

<div class="navbar-brand ms-2">
<a class="nav-link" href="/productos">Productos</a> 
</div>

<div class="navbar-brand">
<a class="nav-link" href=#Sobre-Nosotros>Sobre Nosotros</a>
</div>

<div class="navbar-brand">
<a class="nav-link" href="/comercialización">Comercialización</a>
</div>

<div class="navbar-brand">
<a class="nav-link" href="/contacto">Contactanos</a>
</div>

<div class="navbar-brand">
<a class="nav-link" href="/términos">Términos y Usos</a>
</div>
</nav>

<!-- separador para cuando incluyamos el carrusel de imagenes-->
<div class="separador"></div>

<div class="container mt-4">
    <div class="card">
        <div class="card-body">
            <h1 id=Sobre-Nosotros class="card-title">Sobre Nosotros</h1>
            <p>Somos una tienda que vende artículos de pádel, entre grips, pelotas y más. Hacemos envíos por todo Corrientes. Podés hacer consultas por nuestro Instagram o WhatsApp.</p>
        </div>
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-dark navbar2">
<a class="navbar-brand mx-auto">    
<p><br>Copyright La Dejada Padel - Tel: 3989821394 - 2026</p>
</a>
</nav>

<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>