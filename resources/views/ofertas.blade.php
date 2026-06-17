@extends('plantilla')
@section('contenido')
<div class="container my-5">
    <div class="row g-4">
        
        <!-- RENDERIZADO DINÁMICO DE PRODUCTOS ASIGNADOS A 'OFERTAS' -->
        @forelse($productos as $producto)
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card h-100 border-0 shadow-sm text-center d-flex flex-column">
                
                <!-- Imagen Dinámica de la Base de Datos -->
                <img src="{{ $producto->url_imagen ? asset($producto->url_imagen) : asset('images/paleta-hombre.jpeg') }}" 
                     class="card-img-top p-3" 
                     alt="{{ $producto->nombre }}">
                
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <!-- Nombre dinámico -->
                        <p class="text-muted small mb-1">{{ $producto->nombre }}</p>
                        
                        <!-- Precio Tachado de Referencia (Simula el precio viejo sin oferta) -->
                        <p class="text-muted mb-0">
                            <del>${{ number_format($producto->precio * 1.15, 0, ',', '.') }}</del>
                        </p>
                        
                        <!-- Precio dinámico con la Oferta Real -->
                        <h5 class="fw-bold mb-1">${{ number_format($producto->precio, 0, ',', '.') }}</h5>
                    </div>
                    
                    <!-- Formulario de Carrito Funcional para Ofertas -->
                    <form action="{{ route('carrito.agregar') }}" method="POST" class="w-100 mt-auto">
                        @csrf
                        <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                        
                        @if($producto->stock > 0)
                            <button type="submit" class="btn btn-dark w-100 fw-bold py-2">
                                COMPRAR <i class="bi bi-cart"></i>
                            </button>
                        @else
                            <button type="button" class="btn btn-secondary w-100 fw-bold py-2" disabled>
                                SIN STOCK
                            </button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center text-muted py-5">
            Actualmente no hay artículos marcados en la sección de Ofertas.
        </div>
        @endforelse

    </div>
</div>
@endsection