@extends('plantilla')
@section('contenido')
<div class="container-fluid my-5">
    <div class="row g-4">
        
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card h-100 border-0 shadow-sm text-center d-flex flex-column">
                <img src="{{ asset('images/paleta-hombre.jpeg') }}" class="card-img-top p-3" alt="Paleta Hombre">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <p class="text-muted small mb-1">Paleta Bullpadel Onyx Power 2.0 Rojo</p>
                        <h5 class="fw-bold mb-1">$210,000</h5>
                        <p class="text-danger small mb-3">3 cuotas de $70,000 sin interés</p>
                    </div>
                    
                    <form action="/carrito/agregar" method="POST" class="w-100 mt-auto">
                        @csrf
                        <input type="hidden" name="producto_id" value="1">
                        <button type="submit" class="btn btn-dark w-100 fw-bold py-2">
                            COMPRAR <i class="bi bi-cart"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card h-100 border-0 shadow-sm text-center d-flex flex-column">
                <img src="{{ asset('images/paleta-mujer.jpeg') }}" class="card-img-top p-3" alt="Paleta Mujer">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <p class="text-muted small mb-1">Paleta Bullpadel Indiga Woman 26</p>
                        <h5 class="fw-bold mb-1">$280,000</h5>
                        <p class="text-danger small mb-3">3 cuotas de $93,333 sin interés</p>
                    </div>
                    
                    <form action="/carrito/agregar" method="POST" class="w-100 mt-auto">
                        @csrf
                        <input type="hidden" name="producto_id" value="2">
                        <button type="submit" class="btn btn-dark w-100 fw-bold py-2">
                            COMPRAR <i class="bi bi-cart"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card h-100 border-0 shadow-sm text-center d-flex flex-column">
                <img src="{{ asset('images/pelotas-bull.jpeg') }}" class="card-img-top p-3" alt="Pelotas Bullpadel">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <p class="text-muted small mb-1">Tubo de Pelotas Bullpadel</p>
                        <h5 class="fw-bold mb-1">$13,000</h5>
                        <p class="text-danger small mb-3">3 cuotas de $4,333 sin interés</p>
                    </div>
                    
                    <form action="/carrito/agregar" method="POST" class="w-100 mt-auto">
                        @csrf
                        <input type="hidden" name="producto_id" value="3">
                        <button type="submit" class="btn btn-dark w-100 fw-bold py-2">
                            COMPRAR <i class="bi bi-cart"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card h-100 border-0 shadow-sm text-center d-flex flex-column">
                <img src="{{ asset('images/pelotas-xtrust.jpeg') }}" class="card-img-top p-3" alt="Pelotas X-Trust">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <p class="text-muted small mb-1">Tubo de Pelotas X-Trust</p>
                        <h5 class="fw-bold mb-1">$7,500</h5>
                        <p class="text-danger small mb-3">3 cuotas de $2,500 sin interés</p>
                    </div>
                    
                    <form action="/carrito/agregar" method="POST" class="w-100 mt-auto">
                        @csrf
                        <input type="hidden" name="producto_id" value="4">
                        <button type="submit" class="btn btn-dark w-100 fw-bold py-2">
                            COMPRAR <i class="bi bi-cart"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        </div>
</div>
@endsection