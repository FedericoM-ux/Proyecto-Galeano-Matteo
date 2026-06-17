@extends('plantilla')
@section('contenido')
<div class="container-fluid my-5">
    <div class="row g-4">
        
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @foreach($productos as $producto)
        @if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
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
        @endforeach

    </div>
</div>
@endsection