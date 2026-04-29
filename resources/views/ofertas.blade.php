@extends('plantilla')
@section('contenido')
<div class="container my-5">
    <div class="row g-4">
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card h-100 border-0 shadow-sm text-center">
                <img src="{{ asset('images/grip-relieve.jpeg') }}" class="card-img-top p-3" alt="Grip X-Trust">
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
                <img src="{{ asset('images/remera-head.jpeg') }}" class="card-img-top p-3" alt="Remera Head">
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
                <img src="{{ asset('images/pelota-penn.jpeg') }}" class="card-img-top p-3" alt="Pelota Penn">
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
                <img src="{{ asset('images/pelota-rosa.jpeg') }}" class="card-img-top p-3" alt="Pelota AmaSport">
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
@endsection