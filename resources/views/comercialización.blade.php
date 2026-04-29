@extends('plantilla')
@section('contenido')
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
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3539.1196500133583!2d-58.831813274683974!3d-27.49665412630397!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2sar!4v1777390430012!5m2!1ses-419!2sar" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="text-center mt-3">
                <p class="text-muted small">
                    <i class="bi bi-geo-alt-fill"></i> Professor Pedro Crespo y Rafaela, Corrientes
                </p>
            </div>
        </div>

    </div>
</div>
@endsection