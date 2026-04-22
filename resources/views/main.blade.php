<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Dejada - Padel Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<header class="bg-white shadow-sm">
    <div class="container py-3">
        <div class="row align-items-center">
            <div class="col-md-3">
                <a class="navbar-brand d-flex align-items-center" href="/main">
                    <img src="{{ asset('images/Icono.PNG') }}" alt="Logo La Dejada" width="50" class="me-2">
                </a>
            </div>
            
            <div class="col-md-6">
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Buscar productos..." aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
            </div>
            
            <div class="col-md-3 text-end">
                <a href="/user" class="text-decoration-none text-dark me-3">
                    <i class="bi bi-person"></i> Login
                </a>
                <a href="/shop" class="text-decoration-none text-dark position-relative">
                    <i class="bi bi-cart"></i> Carrito
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">0</span>
                </a>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto text-uppercase fw-semibold">
                    <li class="nav-item"><a class="nav-link px-3" href="/main">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="/productos">Productos</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="#">Sobre Nosotros</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="/comercialización">Comercialización</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="/contacto">Contáctanos</a>
                    <li class="nav-item"><a class="nav-link px-3" href="/términos">Términos y Usos</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

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



</body>
</html>