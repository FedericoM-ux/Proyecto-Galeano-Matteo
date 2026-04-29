@extends('plantilla')
@section('contenido')
<div class="separador"></div>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5"> <div class="card shadow border-0 p-4">
                <div class="card-body">
                    <h3 class="text-center mb-4 fw-bold">Iniciar Sesión</h3>
                    
                    <form>
                        <div class="mb-3">
                            <label class="form-label text-secondary">Correo Electrónico</label>
                            <input type="email" class="form-control" placeholder="nombre@ejemplo.com">
                            <div class="form-text text-muted">
                                Nosotros nunca compartiremos tu email con nadie más.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-secondary">Contraseña</label>
                            <input type="password" class="form-control" placeholder="••••••••">
                            <a href="#" class="text-decoration-none small-link">¿Olvidaste tu contraseña?</a>
                        </div>

                        <div class="mb-4 form-check">
                            <input type="checkbox" class="form-check-input" id="recordar">
                            <label class="form-check-label" for="recordar">Recuérdame</label>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success btn-lg">Iniciar Sesión</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection