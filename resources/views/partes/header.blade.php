<nav class="navbar navbar-dark navbar">
    <div class="container-fluid">
        <div class="row w-100 align-items-center">

            <div class="col-12 col-md-3 text-center text-md-start mb-2 mb-md-0">
                <a href="/main">
                    <img src="{{ asset('images/Icono.PNG') }}" class="img-fluid" style="max-height:60px;">
                </a>
            </div>

            <div class="col-12 col-md-6 mb-2 mb-md-0">
                <form action="/productos" method="GET" class="d-flex">
                    <input class="form-control me-2" 
                           type="search" 
                           name="buscar" 
                           placeholder="Buscar productos..." 
                           value="{{ request('buscar') }}">
                    <button type="submit" class="btn btn-outline-light">Buscar</button>
                </form>
            </div>

            <div class="col-12 col-md-3 d-flex justify-content-center justify-content-md-end gap-3">
            
                <div class="dropdown">
                    <a href="#" class="text-white text-decoration-none dropdown-toggle"
                       id="userMenu"
                       data-bs-toggle="dropdown"
                       aria-expanded="false">
                        <img src="{{ asset('images/user.svg') }}" height="28">
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">

                        @guest
                            <li>
                                <a class="dropdown-item text-center" href="/login">
                                    Iniciar sesión
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item text-center" href="/registro">
                                    Registrarse
                                </a>
                            </li>
                        @endguest

                        @auth
    <li>
        <span class="dropdown-item-text text-center fw-semibold">
            {{ auth()->user()->nombre }}
        </span>
    </li>

    @if(auth()->user()->rol->nombre == 'admin')
        <li>
            <a class="dropdown-item d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
                <i class="bi bi-speedometer2 me-2"></i> Panel de Admin
            </a>
        </li>
    @endif

    @if(auth()->user()->rol_id == 2)
    <li>
        <a class="dropdown-item d-flex align-items-center justify-content-center"
           href="{{ route('cuenta.edit') }}">
            <i class="bi bi-gear me-2"></i> Configurar perfil
        </a>
    </li>
    <li>
        <a class="dropdown-item d-flex align-items-center justify-content-center"
           href="{{ route('cuenta.compras') }}">
            <i class="bi bi-bag-check me-2"></i> Mis compras
        </a>
    </li>
@endif

    <li><hr class="dropdown-divider"></li>

    <li>
        <form action="/logout" method="POST" class="text-center">
            @csrf
            <button type="submit" class="dropdown-item text-center">
                Cerrar sesión
            </button>
        </form>
    </li>
@endauth

    </ul>
</div>  
            @if(auth()->check() && auth()->user()->rol->nombre != 'admin')
                <a href="/carrito" class="position-relative">
                    <img src="{{ asset('images/shopping-cart.svg') }}" height="28">
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        {{ $cartCount }}
                    </span>
                </a>

            @elseif(!auth()->check())
                <a href="{{ route('login') }}?mensaje=carrito" class="position-relative">
                    <img src="{{ asset('images/shopping-cart.svg') }}" height="28">
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        {{ $cartCount }}
                    </span>
                </a>
            @endif
            </div>

        </div>
    </div>
</nav>