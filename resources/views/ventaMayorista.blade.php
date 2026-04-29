@extends('plantilla')
@section('contenido')
<div class="container my-5">
    <div class="row g-4">
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card h-100 border-0 shadow-sm text-center">
                <img src="{{ asset('images/caja-bull.jpeg') }}" class="card-img-top p-3" alt="Pelotas Bull">
                <div class="card-body">
                    <p class="text-muted small mb-1">Caja de pelotas Bullpadel</p>
                    <h5 class="fw-bold mb-1">$270,000</h5>
                    <button class="btn btn-dark w-100 fw-bold py-2">COMPRAR <i class="bi bi-cart"></i></button>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-3">
            <div class="card h-100 border-0 shadow-sm text-center">
                <img src="{{ asset('images/caja-penn.jpeg') }}" class="card-img-top p-3" alt="Pelotas Penn">
                <div class="card-body">
                    <p class="text-muted small mb-1">Caja de pelotas Penn</p>
                    <h5 class="fw-bold mb-1">$180,000</h5>
                    <button class="btn btn-dark w-100 fw-bold py-2">COMPRAR <i class="bi bi-cart"></i></button>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-3">
            <div class="card h-100 border-0 shadow-sm text-center">
                <img src="{{ asset('images/caja-xtrust.jpeg') }}" class="card-img-top p-3" alt="Pelotas X-Trust">
                <div class="card-body">
                    <p class="text-muted small mb-1">Caja de pelotas X-Trust</p>
                    <h5 class="fw-bold mb-1">$200,000</h5>
                    <button class="btn btn-dark w-100 fw-bold py-2">COMPRAR <i class="bi bi-cart"></i></button>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-3">
            <div class="card h-100 border-0 shadow-sm text-center">
                <img src="{{ asset('images/grips-winar.jpeg') }}" class="card-img-top p-3" alt="Paleta Hombre">
                <div class="card-body">
                    <p class="text-muted small mb-1">Caramelera grips WinAr</p>
                    <h5 class="fw-bold mb-1">$100,000</h5>
                    <button class="btn btn-dark w-100 fw-bold py-2">COMPRAR <i class="bi bi-cart"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection