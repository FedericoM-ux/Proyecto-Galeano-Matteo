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
    
        <a href="/user">
            <img src="{{ asset('images/user.svg') }}" height="28">
        </a>

        <a href="/shop" class="position-relative">
            <img src="{{ asset('images/shopping-cart.svg') }}" height="28">
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">0</span>
        </a>
        </div>
        </div>
    </div>
</nav>