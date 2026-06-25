@extends('plantilla')
@section('contenido')
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
        <div class="col-md-10 p-4 bg-light">


            <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-2">
                <div>
                    <h3 class="fw-bold m-0">Historial de Ventas</h3>
                </div>
            </div>

            <div class="row mb-4">

                <div class="col-md-6 mb-3">
                    <div class="card border-0 shadow-sm p-3 border-start border-success border-4">
                        <h6 class="text-muted">Total de ventas</h6>
                        <h3 class="fw-bold">{{ $totalVentas }}</h3>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="card border-0 shadow-sm p-3 border-start border-primary border-4">
                        <h6 class="text-muted">Monto total vendido</h6>
                        <h3 class="fw-bold text-success">
                            ${{ number_format($montoTotal, 2) }}
                        </h3>
                    </div>
                </div>

            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-body">

                    <h5 class="fw-bold mb-3">Listado de Ventas</h5>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle">

                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Cliente</th>
                                    <th>Fecha</th>
                                    <th>Total</th>
                                    <th>Acciones</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($ventas as $venta)
                                <tr>
                                    <td>#{{ $venta->id }}</td>

                                    <td>
                                        {{ $venta->usuario->nombre ?? 'Sin usuario' }}
                                    </td>

                                    <td>
                                        {{ $venta->fecha_venta }}
                                    </td>

                                    <td class="fw-bold text-success">
                                        ${{ number_format($venta->total, 2) }}
                                    </td>
                                    
                                    <td>
                                        <a href="{{ route('comprobante', $venta->id) }}" 
                                           class="btn btn-sm btn-primary">
                                            Ver comprobante
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">
                                        No hay ventas registradas
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