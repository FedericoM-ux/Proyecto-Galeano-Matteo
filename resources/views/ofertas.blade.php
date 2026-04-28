<!DOCTYPE html>
<html>

<head>
    <title>Productos</title>
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
</head>
<nav class="navbar navbar-expand-lg navbar-light navbar">
    <div class="container-fluid py-3">
            <div class="col-md-3">
                <a class="navbar-brand d-flex align-items-center" href="/main">
                    <img src="{{ asset('images/Icono.PNG') }}" alt="Logo La Dejada" width="180" class="me-2">
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

    <nav class="navbar navbar-expand-lg navbar-light navbarW">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto text-uppercase fw-semibold">
                    <li class="nav-item"><a class="nav-link px-3" href="/main">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="/productos">Productos</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="/ofertas">Ofertas</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="/ventaMayorista">Venta Mayorista</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="/sobre-nosotros">Sobre Nosotros</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="/comercialización">Comercialización</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="/contacto">Contáctanos</a>
                    <li class="nav-item"><a class="nav-link px-3" href="/términos">Términos y Usos</a></li>
                </ul>
            </div>
        </div>
    </nav>

<div class="separadorG"></div>

<div class="container my-5">
    <div class="row g-4">
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card h-100 border-0 shadow-sm text-center">
                <img src="{{ asset('images/grip-relieve.jpeg') }}" class="card-img-top p-3" alt="Paleta Hombre">
                <div class="card-body">
                    <p class="text-muted small mb-1">Grip con relieve X-Trust</p>
                    <p class="text-muted mb-0"><del>$3,000</del></p>
                    <h5 class="fw-bold mb-1">$2,000</h5>
                    <button class="btn btn-dark w-100 fw-bold py-2">COMPRAR <i class="bi bi-cart"></i></button>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-3">
            <div class="card h-100 border-0 shadow-sm text-center">
                <img src="{{ asset('images/remera-head.jpeg') }}" class="card-img-top p-3" alt="Paleta Hombre">
                <div class="card-body">
                    <p class="text-muted small mb-1">Remera Head</p>
                    <p class="text-muted mb-0"><del>$25,000</del></p>
                    <h5 class="fw-bold mb-1">$20,000</h5>
                    <button class="btn btn-dark w-100 fw-bold py-2">COMPRAR <i class="bi bi-cart"></i></button>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-3">
            <div class="card h-100 border-0 shadow-sm text-center">
                <img src="{{ asset('images/pelota-penn.jpeg') }}" class="card-img-top p-3" alt="Paleta Hombre">
                <div class="card-body">
                    <p class="text-muted small mb-1">Pelota Penn</p>
                    <p class="text-muted mb-0"><del>$10,000</del></p>
                    <h5 class="fw-bold mb-1">$9,000</h5>
                    <button class="btn btn-dark w-100 fw-bold py-2">COMPRAR <i class="bi bi-cart"></i></button>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-3">
            <div class="card h-100 border-0 shadow-sm text-center">
                <img src="{{ asset('images/pelota-rosa.jpeg') }}" class="card-img-top p-3" alt="Paleta Hombre">
                <div class="card-body">
                    <p class="text-muted small mb-1">Pelota AmaSport</p>
                    <p class="text-muted mb-0"><del>$7,500</del></p>
                    <h5 class="fw-bold mb-1">$7,000</h5>
                    <button class="btn btn-dark w-100 fw-bold py-2">COMPRAR <i class="bi bi-cart"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="linea-end"></div>

<nav class="navbar navbar-expand-lg navbar-dark navbarW">
    <a class="navbar-brand mx-auto">
        <p class="text-dark"><br>Seguinos en nuestras redes sociales: </p>
        <img src="{{ asset('images/brand-whatsapp.svg') }}" alt="wpp" width="40">
        <img src="{{ asset('images/brand-facebook.svg') }}" alt="fb" width="40">
        <img src="{{ asset('images/brand-instagram.svg') }}" alt="ig" width="40">
        <p class="text-dark"><br>© 2026 - La Dejada Padel - Todas las marcas son propiedad de sus respectivos dueños - Todos los derechos reservados</p>
    </a>
</nav>

</body>
</html>