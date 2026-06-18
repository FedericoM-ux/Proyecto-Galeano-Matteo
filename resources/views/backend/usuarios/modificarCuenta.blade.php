@extends('plantilla')

@section('contenido')

@if(session('success'))
    <div class="alert alert-success m-3">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger m-3">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">

            <div class="card shadow-sm border-0">
                <div class="card-body p-4">

                    <h3 class="fw-bold mb-4 text-center">Modificar Cuenta</h3>

                    <form method="POST" action="{{ route('usuarios.update', $usuario->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="text"
                                   name="nombre"
                                   class="form-control"
                                   value="{{ old('nombre', auth()->user()->nombre) }}"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   value="{{ old('email', auth()->user()->email) }}"
                                   required>
                        </div>

                        <hr>

                        <div class="mb-3">
                            <label class="form-label">Nueva contraseña (opcional)</label>
                            <input type="password"
                                   name="password"
                                   class="form-control"
                                   placeholder="Dejar vacío si no quieres cambiarla">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Confirmar contraseña</label>
                            <input type="password"
                                   name="password_confirmation"
                                   class="form-control"
                                   placeholder="Repite la nueva contraseña">
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary btn-lg">
                                Guardar cambios
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>

@endsection