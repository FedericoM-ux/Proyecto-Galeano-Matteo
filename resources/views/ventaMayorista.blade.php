@extends('plantilla')
@section('contenido')
<div class="container my-5">
    <div class="row g-4">
        
        <!-- RENDERIZADO DINÁMICO DE PRODUCTOS ASIGNADOS A 'MAYORISTA' -->
        @forelse($productos as $producto)
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card h-100 border-0 shadow-sm text-center d-flex flex-column">
                
                <!-- Imagen Dinámica de la Base de Datos -->
                <img src="{{ $producto->url_imagen ? asset($producto->url_imagen) : asset('images/caja-bull.jpeg') }}" 
                     class="card-img-top p-3" 
                     alt="{{ $producto->nombre }}">
                
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <!-- Nombre dinámico -->
                        <p class="text-muted small mb-1">{{ $producto->nombre }}</p>
                        
                        <!-- Precio dinámico (Venta por Mayor) -->
                        <h5 class="fw-bold mb-1">${{ number_format($producto->precio, 0, ',', '.') }}</h5>
                        
                        <!-- Leyenda opcional para mercadería mayorista -->
                        <p class="text-secondary small mb-3">Precio exclusivo por bulto cerrado</p>
                    </div>
                    
                    <!-- Formulario de Carrito Funcional para Venta Mayorista -->
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

<!-- MODAL -->
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