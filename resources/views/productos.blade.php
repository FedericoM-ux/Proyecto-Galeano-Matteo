@extends('plantilla')
@section('contenido')
<div class = "container-fluid my-5">
    <div class = "row g-4">
        <div class = "col-12 col-md-6 col-lg-3">
            <div class = "card h-100 border-0 shadow-sm text-center">
                <img src="{{ asset('images/paleta-hombre.jpeg') }}" class = "card-img-top p-3"alt="Paleta Hombre">
                <div class = "card-body">
                    <p class = "text-muted small mb-1">Paleta Bullpadel Onyx Power 2.0 Rojo</p>
                    <h5 class = "fw-bold mb-1">$210,000</h5>
                    <p class = "text-danger small mb-3">3 cuotas de $70,000 sin interes</p>
                    <button class = "btn btn-dark w-100 fw bold py-2">COMPRAR <i class = "bi bi-cart"></i></button>
                </div>
            </div>
        </div>

        <div class = "col-12 col-md-6 col-lg-3">
            <div class = "card h-100 border-0 shadow-sm text-center">
                <img src="{{ asset('images/paleta-mujer.jpeg') }}" class = "card-img-top p-3" alt="Paleta Mujer">
                <div class = "card-body">
                    <p class = "text-muted small mb-1">Paleta Bullpadel Indiga Woman 26</p>
                    <h5 class = "fw-bold mb-1">$280,000</h5>
                    <p class = "text-danger small mb-3">3 cuotas de $93,333 sin interes</p>
                    <button class = "btn btn-dark w-100 fw bold py-2">COMPRAR <i class = "bi bi-cart"></i></button>
                </div>
            </div>
        </div>

        <div class = "col-12 col-md-6 col-lg-3">
            <div class = "card h-100 border-0 shadow-sm text-center">
                <img src="{{ asset('images/pelotas-bull.jpeg') }}" class = "card-img-top p-3" alt="Pelotas Bullpadel">
                <div class = "card-body">
                    <p class = "text-muted small mb-1">Tubo de Pelotas Bullpadel</p>
                    <h5 class = "fw-bold mb-1">$13,000</h5>
                    <p class = "text-danger small mb-3">3 cuotas de $4,333 sin interes</p>
                    <button class = "btn btn-dark w-100 fw bold py-2">COMPRAR <i class = "bi bi-cart"></i></button>
                </div>
            </div>
        </div>

        <div class = "col-12 col-md-6 col-lg-3">
            <div class = "card h-100 border-0 shadow-sm text-center">
                <img src="{{ asset('images/pelotas-xtrust.jpeg') }}" class = "card-img-top p-3" alt="Pelotas X-Trust">
                <div class = "card-body">
                    <p class = "text-muted small mb-1">Tubo de Pelotas X-Trust</p>
                    <h5 class = "fw-bold mb-1">$7,500</h5>
                    <p class = "text-danger small mb-3">3 cuotas de $2,500 sin interes</p>
                    <button class = "btn btn-dark w-100 fw bold py-2">COMPRAR <i class = "bi bi-cart"></i></button>
                </div>
            </div>
        </div>

        <div class = "col-12 col-md-6 col-lg-3">
            <div class = "card h-100 border-0 shadow-sm text-center">
                <img src="{{ asset('images/pelotas-odea.jpeg') }}" class = "card-img-top p-3" alt="Pelotas Odea">
                <div class = "card-body">
                    <p class = "text-muted small mb-1">Tubo de Pelotas Odea</p>
                    <h5 class = "fw-bold mb-1">$8,000</h5>
                    <p class = "text-danger small mb-3">3 cuotas de $2,666 sin interes</p>
                    <button class = "btn btn-dark w-100 fw bold py-2">COMPRAR <i class = "bi bi-cart"></i></button>
                </div>
            </div>
        </div>

        <div class = "col-12 col-md-6 col-lg-3">
            <div class = "card h-100 border-0 shadow-sm text-center">
                <img src="{{ asset('images/remera-babolat.jpeg') }}" class = "card-img-top p-3" alt="Remera Babolat">
                <div class = "card-body">
                    <p class = "text-muted small mb-1">Remera Babolat manga larga</p>
                    <h5 class = "fw-bold mb-1">$50,000</h5>
                    <p class = "text-danger small mb-3">3 cuotas de $16,666 sin interes</p>
                    <button class = "btn btn-dark w-100 fw bold py-2">COMPRAR <i class = "bi bi-cart"></i></button>
                </div>
            </div>
        </div>

        <div class = "col-12 col-md-6 col-lg-3">
            <div class = "card h-100 border-0 shadow-sm text-center">
                <img src="{{ asset('images/remera-wilson.jpeg') }}" class = "card-img-top p-3" alt="Remera Wilson">
                <div class = "card-body">
                    <p class = "text-muted small mb-1">Remera Wilson</p>
                    <h5 class = "fw-bold mb-1">$36,000</h5>
                    <p class = "text-danger small mb-3">3 cuotas de $12,000 sin interes</p>
                    <button class = "btn btn-dark w-100 fw bold py-2">COMPRAR <i class = "bi bi-cart"></i></button>
                </div>
            </div>
        </div>

        <div class = "col-12 col-md-6 col-lg-3">
            <div class = "card h-100 border-0 shadow-sm text-center">
                <img src="{{ asset('images/grip-blanco.jpeg') }}" class = "card-img-top p-3" alt="grip blanco">
                <div class = "card-body">
                    <p class = "text-muted small mb-1">Pack de Grip Wilson</p>
                    <h5 class = "fw-bold mb-1">$15,000</h5>
                    <p class = "text-danger small mb-3">3 cuotas de $5,000 sin interes</p>
                    <button class = "btn btn-dark w-100 fw bold py-2">COMPRAR <i class = "bi bi-cart"></i></button>
                </div>
            </div>
        </div>

        <div class = "col-12 col-md-6 col-lg-3">
            <div class = "card h-100 border-0 shadow-sm text-center">
                <img src="{{ asset('images/grip-negro.jpeg') }}" class = "card-img-top p-3" alt="grips negros">
                <div class = "card-body">
                    <p class = "text-muted small mb-1">Pack de Grips Wilson</p>
                    <h5 class = "fw-bold mb-1">$9,000</h5>
                    <p class = "text-danger small mb-3">3 cuotas de $3,000 sin interes</p>
                    <button class = "btn btn-dark w-100 fw bold py-2">COMPRAR <i class = "bi bi-cart"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection