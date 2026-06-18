@extends('plantilla')
@section('contenido')

@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container-fluid p-0">

    <button class="btn btn-dark d-md-none m-3"
            data-bs-toggle="offcanvas"
            data-bs-target="#sidebarMobile">
        ☰ Menú
    </button>

    <div class="offcanvas offcanvas-start d-md-none" id="sidebarMobile">

        <div class="offcanvas-header">
            <h5>Menú Admin</h5>
            <button class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>

        <div class="offcanvas-body">
            <ul class="nav flex-column">
                <li><a class="nav-link" href="{{ route('admin.dashboard') }}">Usuarios</a></li>
                <li><a class="nav-link" href="{{ route('admin.crearProd.index') }}">Productos</a></li>
                <li><a class="nav-link" href="{{ route('admin.visVentas.index') }}">Ventas</a></li>
                <li><a class="nav-link" href="{{ route('admin.visConsultas.index') }}">Consultas</a></li>
            </ul>
        </div>

    </div>

    <div class="row g-0">

        <div class="col-md-2 d-none d-md-block sidebar-cool shadow min-vh-100">

            <div class="pt-3">
                <ul class="nav flex-column">
                    <li><a class="nav-link" href="{{ route('admin.dashboard') }}">Usuarios</a></li>
                    <li><a class="nav-link" href="{{ route('admin.crearProd.index') }}">Productos</a></li>
                    <li><a class="nav-link" href="{{ route('admin.visVentas.index') }}">Ventas</a></li>
                    <li><a class="nav-link" href="{{ route('admin.visConsultas.index') }}">Consultas</a></li>
                </ul>
            </div>

        </div>

        <div class="col-md-9 col-lg-10 p-4 bg-light">
            
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            
            <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
                <div>
                    <h3 class="fw-bold text-dark m-0">Gestión de Usuarios</h3>
                </div>
                <div>
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalCrearUsuario">
                        <i class="bi bi-person-plus-fill me-1"></i> Nuevo Usuario
                    </button>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-xl-3 col-md-6 mb-3">
                    <div class="card card-metric bg-white border-0 shadow-sm p-3 border-start border-info border-4">
                        <div class="card-body p-2">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="text-secondary small fw-bold text-uppercase">Usuarios Activos</span>
                                <span class="badge bg-info-subtle text-info p-2"><i class="bi bi-people"></i></span>
                            </div>
                            <h3 class="fw-bold m-0">{{ $totalUsuarios }}</h3>
                            <span class="text-success small fw-bold"><i class="bi bi-arrow-up-short"></i> En base de datos</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 mb-4">
                    <div class="card shadow-sm border-0 rounded-3 p-3 bg-white">
                        <div class="card-body">
                            <h5 class="fw-bold mb-3 text-dark"><i class="bi bi-shield-lock me-2"></i>Control de Usuarios Registrados</h5>
                            <div class="table-responsive">
                                <table class="table table-hover align-middle m-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Email</th>
                                            <th>Rol</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($usuarios as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td class="fw-semibold">{{ $user->nombre }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if($user->rol->nombre == 'admin')
                                                    <span class="badge bg-danger-subtle text-danger px-3 py-2 rounded-pill">Admin</span>
                                                @else
                                                    <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill">Cliente</span>
                                                @endif
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-warning me-1" data-bs-toggle="modal" data-bs-target="#modalEditar{{ $user->id }}">
                                                    <i class="bi bi-pencil"></i>
                                                </button>
                                                
                                                <form action="{{ route('usuarios.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Seguro que deseas eliminar este usuario?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="modalEditar{{ $user->id }}" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form action="{{ route('usuarios.update', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title fw-bold">Editar Usuario</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label class="form-label">Nombre</label>
                                                                <input type="text" name="nombre" class="form-control" value="{{ $user->nombre }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Email</label>
                                                                <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Rol</label>
                                                                <select name="rol_id" class="form-select" required>
                                                                    <option value="2" {{ $user->rol_id == 2 ? 'selected' : '' }}>Cliente</option>
                                                                    <option value="1" {{ $user->rol_id == 1 ? 'selected' : '' }}>Admin</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Nueva Contraseña (Opcional)</label>
                                                                <input type="password" name="password" class="form-control" placeholder="Dejar en blanco si no cambia">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                            <button type="submit" class="btn btn-warning">Actualizar Cambios</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="modalCrearUsuario" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('usuarios.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Registrar Nuevo Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nombre Completo</label>
                        <input type="text" name="nombre" class="form-control" placeholder="Ej. Juan Pérez" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Correo Electrónico</label>
                        <input type="email" name="email" class="form-control" placeholder="ejemplo@correo.com" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Rol del Sistema</label>
                        <select name="rol_id" class="form-select" required>
                            <option value="2">Cliente</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Contraseña</label>
                        <input type="password" name="password" class="form-control" placeholder="Mínimo 6 caracteres" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Confirmar Contraseña</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Repite la contraseña" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar Usuario</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection