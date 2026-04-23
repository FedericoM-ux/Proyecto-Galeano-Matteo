<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Dejada - Padel Store</title>
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

    <nav class="navbar navbar-expand-lg navbar-light navbar2">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto text-uppercase fw-semibold">
                    <li class="nav-item"><a class="nav-link px-3" href="/main">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="/productos">Productos</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="#sobre-nosotros">Sobre Nosotros</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="/comercialización">Comercialización</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="/contacto">Contáctanos</a>
                    <li class="nav-item"><a class="nav-link px-3" href="/términos">Términos y Usos</a></li>
                </ul>
            </div>
        </div>
    </nav>


<div id="carouselPadel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('images/palas-de-padel-bullpadel-jugadores-profesionales-2022-portada.jpg') }}" class="d-block w-100" style="height: 400px; object-fit: cover;" alt="Palas Bullpadel">
        </div>
        </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselPadel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselPadel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>

<div class="card">
        <div class="card-body">
            <h1 id="sobre-nosotros" class="card-title">Sobre Nosotros</h1>
            <p>Somos una tienda dedicada a la venta de artículos de pádel, donde podés encontrar una amplia variedad de productos como grips, pelotas, paletas y accesorios esenciales para mejorar tu juego. Trabajamos con productos de calidad para jugadores de todos los niveles, desde principiantes hasta más avanzados.<br><br>Realizamos envíos a toda la provincia de Corrientes, buscando que tu compra llegue de forma rápida y segura hasta tu domicilio. Además, ofrecemos atención personalizada para ayudarte a elegir el equipamiento que mejor se adapte a tus necesidades.<br><br>Podés hacer consultas, pedir recomendaciones o coordinar compras a través de nuestro Instagram o WhatsApp, donde respondemos de manera ágil para brindarte la mejor experiencia posible. Nuestro objetivo es acompañarte dentro y fuera de la cancha, ofreciéndote todo lo necesario para disfrutar al máximo del pádel.</p>        
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-dark navbar2">
    <a class="navbar-brand mx-auto">
        <p><br>Copyright La Dejada Padel - Tel: 3989821394 - 2026</p>
    </a>
</nav>
</body>
</html>