@extends('plantilla')
@section('contenido')
<div id="carouselPadel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('images/5450006.jpeg') }}" class="d-block w-100 h-auto" alt="Palas Bullpadel">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselPadel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselPadel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>

<div class = "container my-5">
    <div class = "row mb-4">
        <div class = "col-12 text-center">
            <h2 class = "fw-bold display-5">PRODUCTOS DESTACADOS</h2>
        </div>
    </div>

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
    </div>
</div>

<div class="separadorG"></div>

<div class="main-banner-section position-relative text-white overflow-hidden mb-5" style="background-image: url('{{ asset('images/babolat-main.jpg') }}');">
    <div class="position-absolute top-0 start-0 w-100 h-100 bg-black opacity-25"></div>

    <div class="container position-relative z-index-1 py-5">
        <div class="row align-items-center mb-5 mt-4">
            <div class="col-md-7 text-center text-md-start">
                <span class="navbarGreenWords display-6 fw-bold">COLECCIÓN BABOLAT</span>
            </div>
        </div>

        <div class="row g-4 g-lg-5 product-overlay-row justify-content-center">

            <div class="col-12 col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow text-center">
                    <img src="{{ asset('images/bolso-babolat.jpeg') }}" class="card-img-top p-3" alt="Paleta Babolat">
                    <div class="card-body">
                        <p class="text-muted small mb-1">Bolso Babolat Lite Negro</p>
                        <h5 class="fw-bold mb-1">$125,000</h5>
                        <p class="text-danger small mb-3">3 cuotas de $41,666 sin interes</p>
                        <button class="btn btn-dark w-100 fw-bold py-2">COMPRAR <i class="bi bi-cart"></i></button>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow text-center">
                    <img src="{{ asset('images/short-babolat.jpeg') }}" class="card-img-top p-3" alt="Paleta Babolat">
                    <div class="card-body">
                        <p class="text-muted small mb-1">Short Babolat Aero</p>
                        <h5 class="fw-bold mb-1">$40,000</h5>
                        <p class="text-danger small mb-3">3 cuotas de $13,333 sin interes</p>
                        <button class="btn btn-dark w-100 fw-bold py-2">COMPRAR <i class="bi bi-cart"></i></button>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow text-center">
                    <img src="{{ asset('images/remera-babolat-gris.jpeg') }}" class="card-img-top p-3" alt="Paleta Babolat">
                    <div class="card-body">
                        <p class="text-muted small mb-1">Remera Babolat</p>
                        <h5 class="fw-bold mb-1">$17,000</h5>
                        <p class="text-danger small mb-3">3 cuotas de $5,666 sin interes</p>
                        <button class="btn btn-dark w-100 fw-bold py-2">COMPRAR <i class="bi bi-cart"></i></button>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow text-center">
                    <img src="{{ asset('images/bolso-babolat.jpeg') }}" class="card-img-top p-3" alt="Paleta Babolat">
                    <div class="card-body">
                        <p class="text-muted small mb-1">Paleta Babolat Stima Energy</p>
                        <h5 class="fw-bold mb-1">$420,000</h5>
                        <p class="text-danger small mb-3">3 cuotas de $140,000 sin interes</p>
                        <button class="btn btn-dark w-100 fw-bold py-2">COMPRAR <i class="bi bi-cart"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="separadorG"></div>

<div class="main-banner-section position-relative text-white overflow-hidden mb-5" style="background-image: url('{{ asset('images/adidas-main.jpg') }}');">
    <div class="position-absolute top-0 start-0 w-100 h-100 bg-black opacity-25"></div>

    <div class="container position-relative z-index-1 py-5">
        <div class="row align-items-center mb-5 mt-4">
            <div class="col-md-7 text-center text-md-start">
                <span class="navbarGreenWords display-6 fw-bold">COLECCIÓN ADIDAS</span>
            </div>
        </div>

        <div class="row g-4 g-lg-5 product-overlay-row justify-content-center">

            <div class="col-12 col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow text-center">
                    <img src="{{ asset('images/zapatilla-adidas.jpeg') }}" class="card-img-top" alt="Paleta Babolat">
                    <div class="card-body">
                        <p class="text-muted small mb-1">Zapatillas Adidas Crazyquick Amarillo (Hombre)</p>
                        <h5 class="fw-bold mb-1">$180,000</h5>
                        <p class="text-danger small mb-3">3 cuotas de $60,000 sin interes</p>
                        <button class="btn btn-dark w-100 fw-bold py-2">COMPRAR <i class="bi bi-cart"></i></button>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow text-center">
                    <img src="{{ asset('images/paleta-adidas.jpeg') }}" class="card-img-top" alt="Paleta Babolat">
                    <div class="card-body">
                        <p class="text-muted small mb-1">Paleta Adidas RX Series Red</p>
                        <h5 class="fw-bold mb-1">$200,000</h5>
                        <p class="text-danger small mb-3">3 cuotas de $66,666 sin interes</p>
                        <button class="btn btn-dark w-100 fw-bold py-2">COMPRAR <i class="bi bi-cart"></i></button>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow text-center">
                    <img src="{{ asset('images/bolso-adidas.jpeg') }}" class="card-img-top" alt="Paleta Babolat">
                    <div class="card-body">
                        <p class="text-muted small mb-1">Bolso Adidas</p>
                        <h5 class="fw-bold mb-1">$150,000</h5>
                        <p class="text-danger small mb-3">3 cuotas de $50,000 sin interes</p>
                        <button class="btn btn-dark w-100 fw-bold py-2">COMPRAR <i class="bi bi-cart"></i></button>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow text-center">
                    <img src="{{ asset('images/paleta-adidas-1.jpeg') }}" class="card-img-top" alt="Paleta Babolat">
                    <div class="card-body">
                        <p class="text-muted small mb-1">Paleta Adids X-Treme Lima 2021</p>
                        <h5 class="fw-bold mb-1">$270,000</h5>
                        <p class="text-danger small mb-3">3 cuotas de $90,000 sin interes</p>
                        <button class="btn btn-dark w-100 fw-bold py-2">COMPRAR <i class="bi bi-cart"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="separadorG"></div>

<div class="main-banner-section position-relative text-white overflow-hidden mb-5" style="background-image: url('{{ asset('images/Palas-bullpadel---2026.png') }}');">
    <div class="position-absolute top-0 start-0 w-100 h-100 bg-black opacity-25"></div>

    <div class="container position-relative z-index-1 py-5">
        <div class="row align-items-center mb-5 mt-4">
            <div class="col-md-7 text-center text-md-start">
                <span class="navbarGreenWords display-6 fw-bold">COLECCIÓN BULLPADEL</span>
            </div>
        </div>

        <div class="row g-4 g-lg-5 product-overlay-row justify-content-center">

            <div class="col-12 col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow text-center">
                    <img src="{{ asset('images/bolso-bull.jpeg') }}" class="card-img-top p-3" alt="Paleta Babolat">
                    <div class="card-body">
                        <p class="text-muted small mb-1">Bolso Bullpadel</p>
                        <h5 class="fw-bold mb-1">$210,000</h5>
                        <p class="text-danger small mb-3">3 cuotas de $70,000 sin interes</p>
                        <button class="btn btn-dark w-100 fw-bold py-2">COMPRAR <i class="bi bi-cart"></i></button>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow text-center">
                    <img src="{{ asset('images/media-bull.jpeg') }}" class="card-img-top p-3" alt="Paleta Babolat">
                    <div class="card-body">
                        <p class="text-muted small mb-1">Media Bullpadel</p>
                        <h5 class="fw-bold mb-1">$8,500</h5>
                        <p class="text-danger small mb-3">3 cuotas de $2,833 sin interes</p>
                        <button class="btn btn-dark w-100 fw-bold py-2">COMPRAR <i class="bi bi-cart"></i></button>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow text-center">
                    <img src="{{ asset('images/remera-babolat-gris.jpeg') }}" class="card-img-top p-3" alt="Paleta Babolat">
                    <div class="card-body">
                        <p class="text-muted small mb-1">Pelotas Bullpadel</p>
                        <h5 class="fw-bold mb-1">$13,000</h5>
                        <p class="text-danger small mb-3">3 cuotas de $4,333 sin interes</p>
                        <button class="btn btn-dark w-100 fw-bold py-2">COMPRAR <i class="bi bi-cart"></i></button>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow text-center">
                    <img src="{{ asset('images/remera-bull.jpeg') }}" class="card-img-top p-3" alt="Paleta Babolat">
                    <div class="card-body">
                        <p class="text-muted small mb-1">Remera Bullpadel</p>
                        <h5 class="fw-bold mb-1">$45,000</h5>
                        <p class="text-danger small mb-3">3 cuotas de $15,000 sin interes</p>
                        <button class="btn btn-dark w-100 fw-bold py-2">COMPRAR <i class="bi bi-cart"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row g-3"> <div class="col-12 col-md-6 col-lg-3">
            <div class="card h-100 border-0 shadow-sm p-3">
                <div class="d-flex align-items-center">
                    <div class="circulo">
                    <img src="{{ asset('images/tarjeta2.svg') }}" alt="tajeta" width="15">
                    </div>
                    <div>
                        <h6 class="mb-0 fw-bold">Cuotas sin interés</h6>
                        <small class="text-muted">Con tarjetas bancarizadas</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-3">
            <div class="card h-100 border-0 shadow-sm p-3">
                <div class="d-flex align-items-center">
                    <div class="circulo">
                    <img src="{{ asset('images/candado.svg') }}" alt="candado" width="15">
                    </div>
                    <div>
                        <h6 class="mb-0 fw-bold">Comprá con seguridad</h6>
                        <small class="text-muted">Tus datos siempre protegidos</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-3">
            <div class="card h-100 border-0 shadow-sm p-3">
                <div class="d-flex align-items-center">
                    <div class="circulo">
                    <img src="{{ asset('images/camion.svg') }}" alt="camion" width="15">
                    </div>
                    <div>
                        <h6 class="mb-0 fw-bold">Envíos a todo el país</h6>
                        <small class="text-muted">Gratis superando los $99.000</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-3">
            <div class="card h-100 border-0 shadow-sm p-3">
                <div class="d-flex align-items-center">
                    <div class="circulo">
                        <img src="{{ asset('images/brand-whatsapp.svg') }}" alt="wpp" width="15">
                    </div>
                    <div>
                        <h6 class="mb-0 fw-bold">Comunicate con nosotros</h6>
                        <small class="text-muted">Asesoramiento y consultas</small>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="separadorG"></div>

<div class="container my-5">
    <div class="row justify-content-center mb-4">
        <div class="col-md-6 text-center border rounded p-4 shadow-sm bg-white">
            <img src="{{ asset('images/google-color.svg') }}" alt="Google" width="40" class="mb-2">
            <h3 class="h5 mb-0">Reviews</h3>
            <div class="display-6 fw-bold">4.8 <span class="text-warning">★★★★★</span></div>
            <p class="text-muted small">293 reviews</p>
            <a href="#" class="btn btn-primary rounded-pill px-4">Write a review</a>
        </div>

    <div class="row justify-content-center g-4">
        <div class="col-md-5">
            <div class="card border-0 shadow-sm bg-light text-center p-4 position-relative">
                <button class="btn position-absolute top-50 start-0 translate-middle-y border-0"><i class="bi bi-chevron-left"></i></button>
                <button class="btn position-absolute top-50 end-0 translate-middle-y border-0"><i class="bi bi-chevron-right"></i></button>

                <div class="card-body">
                    <div class="rounded-circle bg-secondary text-white d-inline-flex align-items-center justify-content-center mb-3" style="width: 50px; height: 50px; font-size: 1.2rem;">
                        S
                    </div>
                    <h5 class="card-title mb-0">Soledad Spangaro</h5>
                    <p class="text-muted small mb-2">January 14</p>
                    <div class="text-warning mb-3">★★★★★</div>
                    <p class="card-text italic">"Excelente compra! Pero más me sorprendió la rapidez con la que llegó! Voy a volver a comprar"</p>
                    <div class="mt-3">
                        <small class="text-muted">Posted on</small>
                        <br>
                        <strong class="text-primary">Google</strong>
                    </div>
                </div>
            </div>
    </div>

        <div class="col-md-5">
            <div class="card border-0 shadow-sm bg-light text-center p-4 position-relative">
                <button class="btn position-absolute top-50 start-0 translate-middle-y border-0"><i class="bi bi-chevron-left"></i></button>
                <button class="btn position-absolute top-50 end-0 translate-middle-y border-0"><i class="bi bi-chevron-right"></i></button>

                <div class="card-body">
                    <div class="rounded-circle bg-secondary text-white d-inline-flex align-items-center justify-content-center mb-3" style="width: 50px; height: 50px; font-size: 1.2rem;">
                        M
                    </div>
                    <h5 class="card-title mb-0">Miranda</h5>
                    <p class="text-muted small mb-2">March 7</p>
                    <div class="text-warning mb-3">★★★★★</div>
                    <p class="card-text italic">"El producto llegó en perfecto estado y tal como se veía en la página. La atención fue rápida y clara."</p>
                    <div class="mt-3">
                        <small class="text-muted">Posted on</small>
                        <br>
                        <strong class="text-primary">Google</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection