@extends('plantilla')
@section('contenido')
<div id="carouselPadel" class="carousel slide" data-bs-ride="carousel">

    <div class="carousel-inner">

        <div class="carousel-item active">
            <img src="{{ asset('images/5450006.PNG') }}" class="d-block w-100" alt="Imagen 1">
        </div>

        <div class="carousel-item">
            <img src="{{ asset('images/babolat-carrusel.PNG') }}" class="d-block w-100" alt="Imagen 2">
        </div>

    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselPadel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#carouselPadel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>

<div class="container my-5">
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h2 class="fw-bold display-5">PRODUCTOS DESTACADOS</h2>
        </div>
    </div>

    <div class="row g-4">
        @forelse($productos as $producto)
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card h-100 border-0 shadow-sm text-center d-flex flex-column">
                
                <img src="{{ $producto->url_imagen ? asset($producto->url_imagen) : asset('images/paleta-hombre.jpeg') }}" 
                     class="card-img-top p-3" 
                     alt="{{ $producto->nombre }}">
                
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <p class="text-muted small mb-1">{{ $producto->nombre }}</p>
                        
                        <h5 class="fw-bold mb-1">${{ number_format($producto->precio, 0, ',', '.') }}</h5>
                        
                        <p class="text-danger small mb-3">3 cuotas de ${{ number_format($producto->precio / 3, 0, ',', '.') }} sin interés</p>
                    </div>
                    
                    <form action="{{ route('carrito.agregar') }}" method="POST" class="w-100 mt-auto">
                        @csrf
                        <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                        
                        @if(auth()->check() && !auth()->user()->esAdmin())

    @if($producto->stock > 0)
        <button type="button"
                class="btn btn-dark w-100 fw-bold py-2"
                data-bs-toggle="modal"
                data-bs-target="#modalOferta{{ $producto->id }}">
            COMPRAR <i class="bi bi-cart"></i>
        </button>
    @else
        <button type="button" class="btn btn-secondary w-100 fw-bold py-2" disabled>
            SIN STOCK
        </button>
    @endif

@endif

<div class="modal fade" id="modalOferta{{ $producto->id }}" tabindex="-1">
  <div class="modal-dialog">

    <form action="{{ route('carrito.agregar') }}" method="POST">
      @csrf

      <input type="hidden" name="producto_id" value="{{ $producto->id }}">

      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title">Comprar {{ $producto->nombre }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">

          <span class="badge bg-info text-dark mb-2">
              Stock: {{ $producto->stock }}
          </span>

          <label class="form-label">Cantidad</label>

          <input type="number"
                 name="cantidad"
                 class="form-control"
                 min="1"
                 max="{{ $producto->stock }}"
                 value="1"
                 required>

        </div>

        <div class="modal-footer">

          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            Cancelar
          </button>

          <button type="submit" class="btn btn-success">
            Agregar al carrito
          </button>

        </div>

      </div>

    </form>

  </div>
</div>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center text-muted py-3">
            No hay productos destacados para mostrar en la página de inicio.
        </div>
        @endforelse
    </div>
</div>

<div class="separadorG"></div>

<div class="main-banner-section position-relative text-white overflow-hidden mb-5" style="background-image: linear-gradient(rgba(255,255,255,0.5), rgba(255,255,255,0.5)), url('{{ asset('images/babolat-main.jpg') }}');">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="separadorG"></div>

<div class="main-banner-section position-relative text-white overflow-hidden mb-5" style="background-image: linear-gradient(rgba(255,255,255,0.5), rgba(255,255,255,0.5)), url('{{ asset('images/adidas-main.jpg') }}');">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="separadorG"></div>

<div class="main-banner-section position-relative text-white overflow-hidden mb-5" style="background-image: linear-gradient(rgba(255,255,255,0.5), rgba(255,255,255,0.5)), url('{{ asset('images/Palas-bullpadel---2026.png') }}');">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row g-3"> 
        <div class="col-12 col-md-6 col-lg-3">
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

        <div class="row justify-content-center g-4 mt-2">
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