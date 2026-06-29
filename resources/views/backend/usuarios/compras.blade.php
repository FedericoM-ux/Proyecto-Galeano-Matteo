@extends('plantilla')

@section('contenido')

<div class="container-fluid p-0">

    <div class="row g-0">

            <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-2">
                <h3 class="fw-bold m-0">Mis Compras</h3>
            </div>

            <div class="row mb-4">

                <div class="col-md-6 mb-3">
                    <div class="card border-0 shadow-sm p-3 border-start border-success border-4">
                        <h6 class="text-muted">Total de compras</h6>
                        <h3 class="fw-bold">{{ $compras->count() }}</h3>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="card border-0 shadow-sm p-3 border-start border-primary border-4">
                        <h6 class="text-muted">Total gastado</h6>
                        <h3 class="fw-bold text-success">
                            ${{ number_format($compras->sum('total'), 2) }}
                        </h3>
                    </div>
                </div>

            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-body">

                    <h5 class="fw-bold mb-3">Historial de compras</h5>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle">

                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Fecha</th>
                                    <th>Total</th>
                                    <th>Acciones</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($compras as $compra)
                                <tr>
                                    <td>#{{ $compra->id }}</td>

                                    <td>
                                        {{ $compra->created_at }}
                                    </td>

                                    <td class="fw-bold text-success">
                                        ${{ number_format($compra->total, 2) }}
                                    </td>
                                    
                                    <td>
                                        <a href="{{ route('comprobante', $compra->id) }}" 
                                           class="btn btn-sm btn-primary">
                                            Ver comprobante
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted">
                                        No realizaste compras aún
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