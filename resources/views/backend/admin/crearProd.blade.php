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
    <div class="row g-0">
        <div class="col-md-3 col-lg-2 sidebar-cool d-none d-md-block shadow">
            <div class="pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="bi bi-people me-2"></i> Usuarios</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#"><i class="bi bi-bar-chart-line me-2"></i> Productos</a></li>
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
                    <h3 class="fw-bold text-dark m-0">Gestión de Productos</h3>
                    <small class="text-secondary">Administrá el catálogo de artículos de la tienda.</small>
                </div>
                <div>
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalCrearProducto">
                        <i class="bi bi-plus-circle-fill me-1"></i> Nuevo Producto
                    </button>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-xl-3 col-md-6 mb-3">
                    <div class="card card-metric bg-white border-0 shadow-sm p-3 border-start border-success border-4">
                        <div class="card-body p-2">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="text-secondary small fw-bold text-uppercase">Modelos Totales</span>
                                <span class="badge bg-success-subtle text-success p-2"><i class="bi bi-box-seam"></i></span>
                            </div>
                            <h3 class="fw-bold m-0">{{ $totalProductos }}</h3>
                            <span class="text-success small fw-bold"><i class="bi bi-arrow-up-short"></i> En base de datos</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 mb-4">
                    <div class="card shadow-sm border-0 rounded-3 p-3 bg-white">
                        <div class="card-body">
                            <h5 class="fw-bold mb-3 text-dark"><i class="bi bi-list-stars me-2"></i>Stock de Artículos</h5>
                            <div class="table-responsive">
                                <table class="table table-hover align-middle m-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Descripción</th>
                                            <th>Precio</th>
                                            <th>Stock</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($productos as $prod)
                                        <tr>
                                            <td>{{ $prod->id }}</td>
                                            <td class="fw-semibold">{{ $prod->nombre }}</td>
                                            <td class="text-muted small">{{ $prod->descripcion }}</td>
                                            <td class="fw-bold">${{ number_format($prod->precio, 0, ',', '.') }}</td>
                                            <td>
                                                @if($prod->stock > 0)
                                                    <span class="badge bg-success-subtle text-success px-2 py-1">{{ $prod->stock }} unidades</span>
                                                @else
                                                    <span class="badge bg-danger-subtle text-danger px-2 py-1">Sin Stock</span>
                                                @endif
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="5" class="text-center text-muted py-3">No hay productos cargados actualmente.</td>
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
    </div>
</div>

<div class="modal fade" id="modalCrearProducto" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('admin.crearProd.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Cargar Nuevo Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nombre del Producto</label>
                        <input type="text" name="nombre" class="form-control" placeholder="Ej. Paleta Bullpadel Vertex" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descripción</label>
                        <textarea name="descripcion" class="form-control" rows="3" placeholder="Características técnicas o tipo de goma..." required></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Precio ($)</label>
                            <input type="number" name="precio" step="0.01" class="form-control" placeholder="0" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Stock Inicial</label>
                            <input type="number" name="stock" class="form-control" placeholder="Ej. 5" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar Producto</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection