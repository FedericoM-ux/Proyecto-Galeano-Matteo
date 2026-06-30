@extends('plantilla')
@section('contenido')
<div class="separador"></div>

@if(in_array(request('mensaje'), ['compra', 'carrito']))
    <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                    Debés iniciar sesión para utilizar esta función.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
@endif

@if($errors->any())
    <div class="container mt-3">
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow border-0 p-4">
                <div class="card-body">
                    <h3 class="text-center mb-4 fw-bold">Iniciar Sesión</h3>
                    
                    <form method="POST" action="{{ route('login.autenticar') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label text-secondary">Correo Electrónico</label>
                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                placeholder="nombre@ejemplo.com"
                                value="{{ old('email') }}"
                            >
                            <div class="form-text text-muted">
                                Nosotros nunca compartiremos tu email con nadie más.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-secondary">Contraseña</label>
                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                placeholder="••••••••"
                            >
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success btn-lg">
                                Iniciar Sesión
                            </button>
                        </div>

                        <div class="text-center mt-3">
                            No tienes una cuenta?
                            <a href="{{ route('registro') }}" class="text-decoration-none">
                                Regístrate aquí
                            </a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection