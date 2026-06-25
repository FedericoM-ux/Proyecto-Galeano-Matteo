@extends('plantilla')
@section('contenido')
<div class="container my-5">
     <div class="row g-4">
                @forelse($productos as $producto)
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm text-center d-flex flex-column producto-card">
                        
                        <img src="{{ $producto->url_imagen ? asset($producto->url_imagen) : asset('images/imagenNoDisp.PNG') }}" 
                             class="card-img-top p-3 producto-img"
                             alt="{{ $producto->nombre }}">
                        
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <p class="text-muted small mb-1">{{ $producto->nombre }}</p>
                                <h5 class="fw-bold mb-1">${{ number_format($producto->precio, 0, ',', '.') }}</h5>
                                <p class="text-danger small mb-3">3 cuotas de ${{ number_format($producto->precio / 3, 0, ',', '.') }} sin interés</p>
                                <span class="badge bg-secondary text-dark mb-2 w-100">Stock: {{ $producto->stock }}</span>
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

          <div class="mb-3">
              <span class="badge bg-info text-dark">
                  Stock disponible: {{ $producto->stock }}
              </span>
          </div>

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
        <div class="col-12 text-center text-muted py-5">
            Actualmente no hay artículos cargados en la sección de Venta Mayorista.
        </div>
        @endforelse

    </div>
</div>
@endsection