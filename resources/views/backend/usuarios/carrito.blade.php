@extends('plantilla')

@section('contenido')
<div class="container my-5">

    <h3 class="fw-bold mb-4">
        Mi Carrito
    </h3>

    @if($items->count() > 0)

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">

                    <thead class="table-dark">
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Subtotal</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($items as $item)
                        <tr>
                            <td class="fw-semibold">
                                {{ $item->producto->nombre }}
                            </td>

                            <td>
                                <span class="badge bg-secondary px-3 py-2">
                                    {{ $item->cantidad }}
                                </span>
                            </td>

                            <td>
                                ${{ number_format($item->precio_unitario, 2) }}
                            </td>

                            <td class="fw-bold text-success">
                                ${{ number_format($item->subtotal, 2) }}
                            </td>

                            <td class="text-center">

                                <form method="POST"
                                      action="{{ route('carrito.eliminar', $item->id) }}"
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-sm btn-outline-danger">
                                        Eliminar
                                    </button>
                                </form>

                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>

    {{-- TOTAL + BOTÓN --}}
    <div class="d-flex justify-content-between align-items-center mt-4">

        <div class="fs-5 fw-bold">
            Total:
            <span class="text-success">
                ${{ number_format($total, 2) }}
            </span>
        </div>

        <form method="POST" action="{{ route('carrito.confirmar') }}">
            @csrf

            <button type="submit" class="btn btn-success btn-lg px-4">
                Confirmar compra
            </button>
        </form>

    </div>

    @else

    {{-- Carrito vacío --}}
    <div class="text-center py-5">
        <h4 class="text-muted">Tu carrito está vacío</h4>
        <a href="/productos" class="btn btn-dark mt-3">
            Ir a comprar
        </a>
    </div>

    @endif

</div>
@endsection