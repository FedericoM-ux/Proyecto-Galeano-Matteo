<!DOCTYPE html>
<html>

<head>
    <title>Comercialización</title>
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
                    <li class="nav-item"><a class="nav-link px-3" href="/main#sobre-nosotros">Sobre Nosotros</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="/comercialización">Comercialización</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="/contacto">Contáctanos</a>
                    <li class="nav-item"><a class="nav-link px-3" href="/términos">Términos y Usos</a></li>
                </ul>
            </div>
        </div>
    </nav>

<div class="container my-5">
    <h2 class="text-center fw-bold mb-4 text-uppercase">Métodos de Pago</h2>

    <div class="row g-4 justify-content-center">
        
        <div class="col-12 col-md-4 col-lg-3">
            <div class="card h-100 border-0 shadow-sm text-center">
                <img src="{{ asset('images/efectivo.png') }}" class="card-img-top p-4" alt="efectivo" style="object-fit: contain; height: 200px;">
                <div class="card-body">
                    <p class="text-muted fw-bold mb-1">Efectivo</p>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4 col-lg-3">
            <div class="card h-100 border-0 shadow-sm text-center">
                <img src="{{ asset('images/tarjeta.png') }}" class="card-img-top p-4" alt="tarjeta" style="object-fit: contain; height: 200px;">
                <div class="card-body">
                    <p class="text-muted fw-bold mb-1">Tarjetas de Débito/Crédito</p>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4 col-lg-3">
            <div class="card h-100 border-0 shadow-sm text-center">
                <img src="{{ asset('images/transferencia.png') }}" class="card-img-top p-4" alt="transferencia" style="object-fit: contain; height: 200px;">
                <div class="card-body">
                    <p class="text-muted fw-bold mb-1">Transferencia Bancaria</p>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="container my-5">
    <div class="row align-items-center justify-content-center g-5">
        
        <div class="col-12 col-md-5 col-lg-4">
            <h2 class="text-center fw-bold mb-4 text-uppercase">Métodos de Envío</h2>
            <div class="card h-100 border-0 shadow-sm text-center">
                <img src="{{ asset('images/envios.png') }}" class="card-img-top p-4" alt="envio" style="object-fit: contain; height: 200px;">
                <div class="card-body">
                    <p class="text-muted fw-bold mb-1 small">Envíos a domicilio o a todo el país a través de Correo Argentino</p>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-7 col-lg-6">
            <h2 class="text-center fw-bold mb-4 text-uppercase">Nuestra Ubicación</h2>
            <div class="ratio ratio-16x9 shadow-sm rounded border overflow-hidden">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3540.046359516641!2d-58.8188166!3d-27.4678!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94456ca3c37652bd%3A0xc397b2ed77ab41f7!2sRafaela%20%26%20Professor%20Pedro%20Crespo%2C%20W3400%20Corrientes!5e0!3m2!1ses-419!2sar!4v1714000000000!5m2!1ses-419!2sar" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
            <div class="text-center mt-3">
                <p class="text-muted small">
                    <i class="bi bi-geo-alt-fill"></i> Professor Pedro Crespo y Rafaela, Corrientes
                </p>
            </div>
        </div>

    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-dark navbar2">
    <a class="navbar-brand mx-auto">
        <p><br>Copyright La Dejada Padel - Tel: 3989821394 - 2026</p>
    </a>
</nav>

</body>
</html>