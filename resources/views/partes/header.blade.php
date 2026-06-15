<nav class="navbar navbar-dark navbar">
    <div class="container-fluid">

    <div class="row w-100 align-items-center">

    <div class="col-12 col-md-3 text-center text-md-start mb-2 mb-md-0">
        <a href="/main">
            <img src="{{ asset('images/Icono.PNG') }}" class="img-fluid" style="max-height:60px;">
        </a>
    </div>

    <div class="col-12 col-md-6 mb-2 mb-md-0">
        <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Buscar productos...">
            <button class="btn btn-outline-light">Buscar</button>
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
                <a class="dropdown-item" href="/login">
                    Iniciar sesión
                </a>
            </li>

            <li>
                <a class="dropdown-item" href="/registro">
                    Registrarse
                </a>
            </li>
        @endguest

        @auth
            <li>
                <span class="dropdown-item-text">
                    {{ auth()->user()->nombre }}
                </span>
            </li>

            <li><hr class="dropdown-divider"></li>

            <li>
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item">
                        Cerrar sesión
                    </button>
                </form>
            </li>
        @endauth

    </ul>
</div>

        <a href="/shop" class="position-relative">
            <img src="{{ asset('images/shopping-cart.svg') }}" height="28">
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">0</span>
        </a>
        </div>
        </div>
    </div>
</nav>