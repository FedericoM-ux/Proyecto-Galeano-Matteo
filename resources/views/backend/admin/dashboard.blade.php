@extends('plantilla')

@section('contenido')
<div class="container-fluid p-0">
    <style>
        .sidebar-cool {
            min-height: calc(100vh - 56px);
            background-color: #242939; /* El azul oscuro de la imagen */
        }
        .sidebar-cool .nav-link {
            color: #a4b0be;
            padding: 12px 20px;
            font-weight: 500;
        }
        .sidebar-cool .nav-link:hover, .sidebar-cool .nav-link.active {
            color: #ffffff;
            background-color: #32384e;
        }
        .card-metric {
            border-radius: 10px;
            transition: transform 0.2s;
        }
        .card-metric:hover {
            transform: translateY(-5px);
        }
    </style>

    <div class="row g-0">
        <div class="col-md-3 col-lg-2 sidebar-cool d-none d-md-block shadow">
            <div class="pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="bi bi-bar-chart-line me-2"></i> Charts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="bi bi-table me-2"></i> Tables</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="bi bi-journal-check me-2"></i> Forms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="bi bi-calendar3 me-2"></i> Calendar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="bi bi-geo-alt me-2"></i> Maps</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="bi bi-chat-left-text me-2"></i> Inbox</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="bi bi-folder me-2"></i> Documentation</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-md-9 col-lg-10 p-4 bg-light">
            
            <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
                <div>
                    <h3 class="fw-bold text-dark m-0">Dashboard</h3>
                    <small class="text-secondary">Welcome back — here's what's happening today.</small>
                </div>
                <div>
                    <button class="btn btn-outline-secondary btn-sm me-2"><i class="bi bi-arrow-clockwise"></i> Refresh</button>
                    <button class="btn btn-primary btn-sm"><i class="bi bi-plus-lg"></i> New Product</button>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-xl-3 col-md-6 mb-3">
                    <div class="card card-metric bg-white border-0 shadow-sm p-3 border-start border-primary border-4">
                        <div class="card-body p-2">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="text-secondary small fw-bold text-uppercase">Revenue</span>
                                <span class="badge bg-primary-subtle text-primary p-2"><i class="bi bi-currency-dollar"></i></span>
                            </div>
                            <h3 class="fw-bold m-0">$48,217</h3>
                            <span class="text-success small fw-bold"><i class="bi bi-arrow-up-short"></i> 12.5%</span> <small class="text-muted text-xs">vs last 30d</small>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-3">
                    <div class="card card-metric bg-white border-0 shadow-sm p-3 border-start border-success border-4">
                        <div class="card-body p-2">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="text-secondary small fw-bold text-uppercase">Orders</span>
                                <span class="badge bg-success-subtle text-success p-2"><i class="bi bi-cart"></i></span>
                            </div>
                            <h3 class="fw-bold m-0">1,284</h3>
                            <span class="text-danger small fw-bold"><i class="bi bi-arrow-down-short"></i> 3.2%</span> <small class="text-muted text-xs">vs last 30d</small>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-3">
                    <div class="card card-metric bg-white border-0 shadow-sm p-3 border-start border-info border-4">
                        <div class="card-body p-2">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="text-secondary small fw-bold text-uppercase">Active Users</span> [cite: 175]
                                <span class="badge bg-info-subtle text-info p-2"><i class="bi bi-people"></i></span>
                            </div>
                            <h3 class="fw-bold m-0">2</h3> [cite: 175]
                            <span class="text-success small fw-bold"><i class="bi bi-arrow-up-short"></i> 5.8%</span> <small class="text-muted text-xs">Usuarios en BD</small>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-3">
                    <div class="card card-metric bg-white border-0 shadow-sm p-3 border-start border-warning border-4">
                        <div class="card-body p-2">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="text-secondary small fw-bold text-uppercase">Conversion</span>
                                <span class="badge bg-warning-subtle text-warning p-2"><i class="bi bi-percent"></i></span>
                            </div>
                            <h3 class="fw-bold m-0">3.24%</h3>
                            <span class="text-success small fw-bold"><i class="bi bi-arrow-up-short"></i> 0.6pp</span> <small class="text-muted text-xs">vs last 30d</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 mb-4">
                    <div class="card shadow-sm border-0 rounded-3 p-3 bg-white">
                        <div class="card-body">
                            <h5 class="fw-bold mb-3 text-dark"><i class="bi bi-shield-lock me-2"></i>Control de Usuarios Registrados</h5> [cite: 176]
                            <div class="table-responsive">
                                <table class="table table-hover align-middle m-0"> [cite: 176]
                                    <thead class="table-light"> [cite: 176]
                                        <tr> [cite: 176]
                                            <th>#</th> [cite: 176]
                                            <th>Nombre</th> [cite: 176]
                                            <th>Email</th> [cite: 176]
                                            <th>Rol</th> [cite: 176]
                                            <th>Registro</th> [cite: 176]
                                        </tr> [cite: 176]
                                    </thead> [cite: 176]
                                    <tbody> [cite: 176]
                                        <tr> [cite: 176]
                                            <td>2</td> [cite: 176]
                                            <td class="fw-semibold">José</td> [cite: 176]
                                            <td>jose@gmail.com</td> [cite: 176]
                                            <td><span class="badge bg-secondary-subtle text-secondary px-3 py-2 rounded-pill">Cliente</span></td> [cite: 176]
                                            <td>09/05/2026</td> [cite: 176]
                                        </tr> [cite: 176]
                                        <tr> [cite: 176]
                                            <td>1</td> [cite: 176]
                                            <td class="fw-semibold">Lucía Salazar</td> [cite: 176]
                                            <td>lucy@gmail.com</td> [cite: 176]
                                            <td><span class="badge bg-danger-subtle text-danger px-3 py-2 rounded-pill">Admin</span></td> [cite: 176]
                                            <td>09/05/2026</td> [cite: 176]
                                        </tr> [cite: 176]
                                    </tbody> [cite: 176]
                                </table> [cite: 176]
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <div class="card shadow-sm border-0 rounded-3 p-3 bg-white">
                        <div class="card-body">
                            <h5 class="fw-bold mb-3 text-dark"><i class="bi bi-clock-history me-2"></i>Recent Activity</h5>
                            
                            <div class="d-flex align-items-start mb-3 pb-2 border-bottom">
                                <div class="bg-primary text-white rounded-circle p-2 me-3"><i class="bi bi-person-plus small"></i></div>
                                <div>
                                    <p class="m-0 small fw-bold text-dark">Nuevo cliente registrado</p>
                                    <small class="text-muted">José se unió a la plataforma</small>
                                </div>
                            </div>

                            <div class="d-flex align-items-start mb-3 pb-2 border-bottom">
                                <div class="bg-success text-white rounded-circle p-2 me-3"><i class="bi bi-bag-check small"></i></div>
                                <div>
                                    <p class="m-0 small fw-bold text-dark">Compra simulada</p>
                                    <small class="text-muted">Pedido #4287 ingresado con éxito</small>
                                </div>
                            </div>

                            <div class="d-flex align-items-start">
                                <div class="bg-warning text-dark rounded-circle p-2 me-3"><i class="bi bi-shield-check small"></i></div>
                                <div>
                                    <p class="m-0 small fw-bold text-dark">Cambio de roles (Tinker)</p>
                                    <small class="text-muted">Lucía Salazar asignada como Admin</small>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection