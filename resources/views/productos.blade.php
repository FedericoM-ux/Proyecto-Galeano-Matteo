@extends('plantilla')
@section('contenido')
<div class="container-fluid my-5">
    <div class="row px-3">
        
        <div class="col-md-4 col-lg-3 mb-4">
            <div class="card border-0 shadow-sm p-4 bg-white sticky-top" style="top: 20px; z-index: 10;">
                <h5 class="fw-bold mb-3 text-dark"><i class="bi bi-sliders me-2"></i>Filtrar Catálogo</h5>
                <hr>
                
                @if($errors->any())
                    <div class="alert alert-danger p-2 small">
                        <ul class="mb-0 ps-3">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="/productos" method="GET">
                    
                    @if(request()->filled('buscar'))
                        <input type="hidden" name="buscar" value="{{ request('buscar') }}">
                    @endif
                    
                    <div class="mb-3">
                        <label class="form-label fw-semibold small text-uppercase text-muted">Género</label>
                        <select name="genero" class="form-select form-select-sm">
                            <option value="">Todos los géneros</option>
                            <option value="hombre" {{ request('genero') == 'hombre' ? 'selected' : '' }}>Hombre</option>
                            <option value="mujer" {{ request('genero') == 'mujer' ? 'selected' : '' }}>Mujer</option>
                            <option value="unisex" {{ request('genero') == 'unisex' ? 'selected' : '' }}>Unisex (Paletas/Bolsos)</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold small text-uppercase text-muted">Marca</label>
                        <select name="marca" class="form-select form-select-sm">
                            <option value="">Todas las marcas</option>
                            <option value="bullpadel" {{ request('marca') == 'bullpadel' ? 'selected' : '' }}>Bullpadel</option>
                            <option value="adidas" {{ request('marca') == 'adidas' ? 'selected' : '' }}>Adidas</option>
                            <option value="babolat" {{ request('marca') == 'babolat' ? 'selected' : '' }}>Babolat</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold small text-uppercase text-muted">Talle</label>
                        <select name="talle" class="form-select form-select-sm">
                            <option value="">Todos los talles</option>
                            <option value="s" {{ request('talle') == 's' ? 'selected' : '' }}>S</option>
                            <option value="m" {{ request('talle') == 'm' ? 'selected' : '' }}>M</option>
                            <option value="l" {{ request('talle') == 'l' ? 'selected' : '' }}>L</option>
                            <option value="xl" {{ request('talle') == 'xl' ? 'selected' : '' }}>XL</option>
                            <option value="xxl" {{ request('talle') == 'xxl' ? 'selected' : '' }}>XXL</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold small text-uppercase text-muted">Rango de Precio</label>
                        <div class="d-flex gap-2 align-items-center">
                            <input type="number" name="precio_min" class="form-control form-control-sm" placeholder="Mín" value="{{ request('precio_min') }}">
                            <span class="text-muted small">al</span>
                            <input type="number" name="precio_max" class="form-control form-control-sm" placeholder="Máx" value="{{ request('precio_max') }}">
                        </div>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-dark btn-sm fw-bold py-2">APLICAR FILTROS</button>
                        
                        @if(request()->hasAny(['buscar', 'genero', 'marca', 'talle', 'precio_min', 'precio_max']))
                            <a href="/productos" class="btn btn-outline-secondary btn-sm small py-2">Limpiar Filtros</a>
                        @endif
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-8 col-lg-9">
            
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="row g-4">
                @forelse($productos as $producto)
                <div class="col-12 col-sm-6 col-lg-4">
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

                                <div class="modal fade" id="modalComprar{{ $producto->id }}" tabindex="-1">
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

          {{-- STOCK --}}
          <div class="mb-3">
              <span class="badge bg-info text-dark">
                  Stock disponible: {{ $producto->stock }}
              </span>
          </div>

          {{-- CANTIDAD --}}
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
                                <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                                
                                @if(auth()->check() && !auth()->user()->esAdmin())

    @if($producto->stock > 0)
        <button type="button"
                class="btn btn-dark w-100 fw-bold py-2"
                data-bs-toggle="modal"
                data-bs-target="#modalComprar{{ $producto->id }}">
            COMPRAR <i class="bi bi-cart"></i>
        </button>
    @else
        <button type="button" class="btn btn-secondary w-100 fw-bold py-2" disabled>
            SIN STOCK
        </button>
    @endif

@endif
                            </form>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center text-muted py-5">
                    <i class="bi bi-search display-3 d-block mb-3 text-secondary"></i>
                    <h5 class="fw-bold">No se encontraron productos</h5>
                    <p class="small">Probá cambiando los criterios de los filtros a ver si aparece mercadería.</p>
                </div>
                @endforelse
            </div>
        </div>

    </div>
</div>
@endsection