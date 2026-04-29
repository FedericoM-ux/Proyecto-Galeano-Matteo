@extends('plantilla')
@section('contenido')
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
@endsection