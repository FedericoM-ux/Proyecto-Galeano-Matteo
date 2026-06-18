@extends('plantilla')

@section('contenido')

@if($errors->any())
    <div class="alert alert-danger m-3">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container-fluid p-0">

    <!-- MENU MOBILE -->
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

        <!-- SIDEBAR -->
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

        <!-- CONTENIDO -->
        <div class="col-md-10 col-lg-10 p-4 bg-light">

            <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
                <h3 class="fw-bold m-0">Historial de Consultas</h3>
            </div>

            <!-- CARD TOTAL -->
            <div class="row mb-4">
                <div class="col-xl-3 col-md-6 mb-3">
                    <div class="card border-0 shadow-sm p-3 border-start border-primary border-4">
                        <div class="card-body p-2">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="text-secondary small fw-bold text-uppercase">Total Consultas</span>
                                <span class="badge bg-primary-subtle text-primary p-2">
                                    <i class="bi bi-chat-dots"></i>
                                </span>
                            </div>

                            <h3 class="fw-bold m-0">{{ $consultas->count() }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TABLA -->
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-hover align-middle m-0">

                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Motivo</th>
                                    <th>Mensaje</th>
                                    <th>Fecha</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($consultas as $consulta)
                                    <tr>
                                        <td>{{ $consulta->id }}</td>
                                        <td class="fw-semibold">{{ $consulta->nombre }}</td>
                                        <td>{{ $consulta->email }}</td>
                                        <td>{{ $consulta->motivo ?? 'Sin motivo' }}</td>

                                        <td>
                                            <button class="btn btn-sm btn-outline-primary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modalMensaje{{ $consulta->id }}">
                                                Ver mensaje
                                            </button>
                                        </td>

                                        <td>{{ $consulta->created_at }}</td>
                                    </tr>

                                    <!-- MODAL MENSAJE -->
                                    <div class="modal fade" id="modalMensaje{{ $consulta->id }}" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h5 class="modal-title">
                                                        Mensaje de {{ $consulta->nombre }}
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <p><strong>Email:</strong> {{ $consulta->email }}</p>

                                                    <p><strong>Motivo:</strong> {{ $consulta->motivo ?? 'Sin motivo' }}</p>

                                                    <hr>

                                                    <p style="white-space: pre-line;">
                                                        {{ $consulta->consulta }}
                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted py-3">
                                            No hay consultas aún.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection