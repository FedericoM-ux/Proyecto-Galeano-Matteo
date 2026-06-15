@extends('plantilla')
@section('contenido')
<div class="separador"></div>

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

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow border-0 p-4">
                <div class="card-body">
                    <h3 class="text-center mb-4 fw-bold">Registrarse</h3>

                    <form method="POST" action="{{ route('registro.guardar') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label text-secondary">Nombre y Apellido</label>
                            <input
                                type="text"
                                name="nombre"
                                class="form-control"
                                placeholder="Nombre y Apellido..."
                                value="{{ old('nombre') }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-secondary">Correo Electrónico</label>
                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                placeholder="nombre@ejemplo.com"
                                value="{{ old('email') }}">

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
                                placeholder="••••••••">
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-secondary">Confirmar Contraseña</label>
                            <input
                                type="password"
                                name="password_confirmation"
                                class="form-control"
                                placeholder="••••••••">
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success btn-lg">
                                Registrarse
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection