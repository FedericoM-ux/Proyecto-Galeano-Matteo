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

    <button class="btn btn-dark d-md-none m-3"
            data-bs-toggle="offcanvas"
            data-bs-target="#sidebarMobile">☰ Menú</button>

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
            <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
                <div>
                    <h3 class="fw-bold m-0">Gestión de Productos</h3>
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
                                            <th>Acciones</th>
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
                                                    <span class="badge bg-success-subtle text-success px-2 py-1">
                                                        {{ $prod->stock }} unidades
                                                    </span>
                                                @else
                                                    <span class="badge bg-danger-subtle text-danger px-2 py-1">
                                                        Sin Stock
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-warning me-1" data-bs-toggle="modal" data-bs-target="#modalEditar{{ $prod->id }}">
                                                    <i class="bi bi-pencil"></i>
                                                </button>

                                                <form action="{{ route('productos.destroy', $prod->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Seguro que deseas eliminar este producto?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="modalEditar{{ $prod->id }}" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <form action="{{ route('productos.update', $prod->id) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title fw-bold">Editar Producto</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body text-start">
                                                            
                                                            <div class="mb-3 text-center bg-light p-2 rounded">
                                                                <label class="form-label d-block fw-semibold text-start">Imagen del Producto</label>
                                                                <img src="{{ $prod->url_imagen ? asset($prod->url_imagen) : asset('images/paleta-hombre.jpeg') }}" 
                                                                     alt="Vista previa" 
                                                                     class="img-thumbnail mb-2" 
                                                                     style="max-height: 80px;">
                                                                <input type="file" name="imagen" class="form-control" accept="image/*">
                                                                <div class="form-text text-muted small text-start">Dejar en blanco para conservar la imagen actual.</div>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label class="form-label">Nombre</label>
                                                                <input type="text" name="nombre" class="form-control" value="{{ $prod->nombre }}" required>
                                                            </div>
                                                            
                                                            <div class="mb-3">
                                                                <label class="form-label">Descripción</label>
                                                                <textarea name="descripcion" class="form-control" rows="3" required>{{ $prod->descripcion }}</textarea>
                                                            </div>
                                                            
                                                            <div class="row">
                                                                <div class="col-md-6 mb-3">
                                                                    <label class="form-label">Precio</label>
                                                                    <input type="number" step="0.01" name="precio" class="form-control" value="{{ $prod->precio }}" required>
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <label class="form-label">Stock</label>
                                                                    <input type="number" name="stock" class="form-control" value="{{ $prod->stock }}" required>
                                                                </div>
                                                            </div>

                                                            <div class="row border-top pt-3 mt-2 bg-light p-2 rounded">
                                                                <div class="col-md-4 mb-3">
                                                                    <label class="form-label fw-semibold small">Género</label>
                                                                    <select name="genero" class="form-select form-select-sm">
                                                                        <option value="" {{ $prod->genero == null ? 'selected' : '' }}>No aplica / Sin género</option>
                                                                        <option value="unisex" {{ $prod->genero == 'unisex' ? 'selected' : '' }}>Unisex</option>
                                                                        <option value="hombre" {{ $prod->genero == 'hombre' ? 'selected' : '' }}>Hombre</option>
                                                                        <option value="mujer" {{ $prod->genero == 'mujer' ? 'selected' : '' }}>Mujer</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-4 mb-3">
                                                                    <label class="form-label fw-semibold small">Marca</label>
                                                                    <select name="marca" class="form-select form-select-sm">
                                                                        <option value="" {{ $prod->marca == null ? 'selected' : '' }}>No aplica / Otra</option>
                                                                        <option value="bullpadel" {{ $prod->marca == 'bullpadel' ? 'selected' : '' }}>Bullpadel</option>
                                                                        <option value="adidas" {{ $prod->marca == 'adidas' ? 'selected' : '' }}>Adidas</option>
                                                                        <option value="babolat" {{ $prod->marca == 'babolat' ? 'selected' : '' }}>Babolat</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-4 mb-3">
                                                                    <label class="form-label fw-semibold small">Talle</label>
                                                                    <select name="talle" class="form-select form-select-sm">
                                                                        <option value="" {{ $prod->talle == null ? 'selected' : '' }}>No aplica / Sin talle</option>
                                                                        <option value="s" {{ $prod->talle == 's' ? 'selected' : '' }}>S</option>
                                                                        <option value="m" {{ $prod->talle == 'm' ? 'selected' : '' }}>M</option>
                                                                        <option value="l" {{ $prod->talle == 'l' ? 'selected' : '' }}>L</option>
                                                                        <option value="xl" {{ $prod->talle == 'xl' ? 'selected' : '' }}>XL</option>
                                                                        <option value="xxl" {{ $prod->talle == 'xxl' ? 'selected' : '' }}>XXL</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="mb-3 mt-3">
                                                                <label class="form-label fw-semibold d-block">¿Dónde se mostrará este producto?</label>
                                                                @php
                                                                    $seccionesActuales = $prod->secciones ?? [];
                                                                @endphp
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="secciones[]" value="inicio" id="edit_inicio{{ $prod->id }}" {{ in_array('inicio', $seccionesActuales) ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="edit_inicio{{ $prod->id }}">Página de Inicio</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="secciones[]" value="productos" id="edit_productos{{ $prod->id }}" {{ in_array('productos', $seccionesActuales) ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="edit_productos{{ $prod->id }}">Productos (Catálogo)</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="secciones[]" value="ofertas" id="edit_ofertas{{ $prod->id }}" {{ in_array('ofertas', $seccionesActuales) ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="edit_ofertas{{ $prod->id }}">Ofertas</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="secciones[]" value="mayorista" id="edit_mayorista{{ $prod->id }}" {{ in_array('mayorista', $seccionesActuales) ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="edit_mayorista{{ $prod->id }}">Venta Mayorista</label>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                            <button type="submit" class="btn btn-warning">Guardar Cambios</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-muted py-3">
                                                No hay productos cargados actualmente.
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
    </div>
</div>

<div class="modal fade" id="modalCrearProducto" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('admin.crearProd.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Cargar Nuevo Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-start">
                    
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Imagen del Producto</label>
                        <input type="file" name="imagen" class="form-control @error('imagen') is-invalid @enderror" accept="image/*">
                        <div class="form-text text-muted small">Formatos permitidos: jpeg, png, jpg. Máx: 5MB.</div>
                        @error('imagen')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nombre del Producto</label>
                        <input type="text" name="nombre" class="form-control" placeholder="Ej. Paleta Bullpadel Vertex" value="{{ old('nombre') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Descripción</label>
                        <textarea name="descripcion" class="form-control" rows="3" placeholder="Características técnicas o tipo de goma..." required>{{ old('descripcion') }}</textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Precio ($)</label>
                            <input type="number" name="precio" step="0.01" class="form-control" placeholder="0" value="{{ old('precio') }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Stock Inicial</label>
                            <input type="number" name="stock" class="form-control" placeholder="Ej. 5" value="{{ old('stock') }}" required>
                        </div>
                    </div>

                    <div class="row border-top pt-3 mt-2 bg-light p-2 rounded">
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-semibold small">Género (Opcional)</label>
                            <select name="genero" class="form-select form-select-sm">
                                <option value="">No aplica / Sin género (Ej. Pelotas)</option>
                                <option value="unisex">Unisex (Ej. Paletas)</option>
                                <option value="hombre">Hombre</option>
                                <option value="mujer">Mujer</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-semibold small">Marca (Opcional)</label>
                            <select name="marca" class="form-select form-select-sm">
                                <option value="">No aplica / Otra</option>
                                <option value="bullpadel">Bullpadel</option>
                                <option value="adidas">Adidas</option>
                                <option value="babolat">Babolat</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-semibold small">Talle (Opcional)</label>
                            <select name="talle" class="form-select form-select-sm">
                                <option value="">No aplica / Sin talle</option>
                                <option value="s">S</option>
                                <option value="m">M</option>
                                <option value="l">L</option>
                                <option value="xl">XL</option>
                                <option value="xxl">XXL</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 mt-3">
                        <label class="form-label fw-semibold d-block">¿Dónde se mostrará este producto?</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="secciones[]" value="inicio" id="crear_inicio">
                            <label class="form-check-label" for="crear_inicio">Página de Inicio</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="secciones[]" value="productos" id="crear_productos" checked>
                            <label class="form-check-label" for="crear_productos">Productos (Catálogo)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="secciones[]" value="ofertas" id="crear_ofertas">
                            <label class="form-check-label" for="crear_ofertas">Ofertas</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="secciones[]" value="mayorista" id="crear_mayorista">
                            <label class="form-check-label" for="crear_mayorista">Venta Mayorista</label>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar Producto</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>

@endsection