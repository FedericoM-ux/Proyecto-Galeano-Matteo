@extends('plantilla')
@section('contenido')

@if(session('success_message'))
    <div class="alert alert-success" role="alert">
        {{ session('success_message') }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="card shadow-sm border-0 p-4">
                    <h2 class="text-center mb-4">Contáctanos</h2>
                    
                    <form method="POST" action="{{ route('contacto.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text"
                                   class="form-control"
                                   id="nombre"
                                   name="nombre"
                                   value="{{ old('nombre') }}"
                                   placeholder="Tu nombre completo">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input type="email"
                                   class="form-control"
                                   id="email"
                                   name="email"
                                   value="{{ old('email') }}"
                                   placeholder="nombre@ejemplo.com">
                        </div>

                        <div class="mb-3">
                            <label for="motivo" class="form-label">Motivo</label>
                            <input type="text"
                                   class="form-control"
                                   id="motivo"
                                   name="motivo"
                                   value="{{ old('motivo') }}"
                                   placeholder="Motivo de la consulta">
                        </div>

                        <div class="mb-3">
                            <label for="consulta" class="form-label">Mensaje</label>
                            <textarea class="form-control"
                                      id="consulta"
                                      name="consulta"
                                      rows="4"
                                      placeholder="Escribe tu consulta aquí...">{{ old('consulta') }}</textarea>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success btn-lg">
                                Enviar Mensaje
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>

<div class="separador"></div>

@endsection