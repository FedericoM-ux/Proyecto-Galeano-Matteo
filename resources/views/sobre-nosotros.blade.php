<!DOCTYPE html>
<html>

<head>
    <title>Perfil de Usuario</title>
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
</body>

<section class="py-5 bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold display-5">Sobre <span class="text-verde">Nosotros</span></h2>
            <p class="lead text-muted">Equipamos tu pasión: calidad y asesoramiento para cada punto.</p>
            <hr class="mx-auto" style="width: 60px; height: 4px; background-color: #1a5928; opacity: 1;">
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm p-3">
                    <div class="card-body">
                        <div class="mb-3 text-verde">
                            <i class="bi bi-trophy fs-2"></i>
                        </div>
                        <h4 class="fw-bold">Nuestra Tienda</h4>
                        <p class="text-secondary">Somos una tienda dedicada a la venta de artículos de pádel, donde podés encontrar una amplia variedad de productos como grips, pelotas, paletas y accesorios esenciales para mejorar tu juego. <br>Trabajamos con productos de calidad para jugadores de todos los niveles, desde principiantes hasta más avanzados.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm p-3">
                    <div class="card-body">
                        <div class="mb-3 text-verde">
                            <i class="bi bi-truck fs-2"></i>
                        </div>
                        <h4 class="fw-bold">Envíos Rápidos</h4>
                        <p class="text-secondary">Realizamos envíos a toda la provincia de Corrientes, buscando que tu compra llegue de forma rápida y segura hasta tu domicilio.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm p-3">
                    <div class="card-body">
                        <div class="mb-3 text-verde">
                            <i class="bi bi-chat-dots fs-2"></i>
                        </div>
                        <h4 class="fw-bold">Atención Personalizada</h4>
                        <p class="text-secondary">Contactanos por Instagram o WhatsApp. Te asesoramos para elegir el equipo que mejor se adapte a tu juego..</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-5 p-5 bg-light rounded-4 text-center">
            <h4 class="fw-bold mb-3">¿Listo para entrar a la cancha?</h4>
            <p class="mb-4">Nuestro objetivo es acompañarte dentro y fuera de la cancha, ofreciéndote todo lo necesario para disfrutar al máximo del pádel.</p>
            <div class="d-flex justify-content-center gap-3">
                <a href="https://wa.me/tu-numero" class="btn btn-outline-success btn-lg px-4 d-inline-flex align-items-center gap-2">
                    <i class="bi bi-whatsapp fs-4"></i> 
                    Consultar por Whatsapp
                </a>
            </div>
        </div>
    </div>
</section>

<div class="separador"></div>

<nav class="navbar navbar-expand-lg navbar-dark navbar2">
    <a class="navbar-brand mx-auto">
        <p><br>Copyright La Dejada Padel - Tel: 3989821394 - 2026</p>
    </a>
</nav>

</body>
</html>