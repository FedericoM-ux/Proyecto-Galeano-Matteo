<!DOCTYPE html>
<html>

<head>
    <title>Productos</title>
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar">
    <div class="container-fluid px-0">

        <a class="navbar-brand ms-2" href="/main">
            <img src="{{ asset('images/icono.PNG') }}" alt="Icono" height="40">
        </a>
        
        <div class="navbar-brand mx-auto">
            <a class="nav-link" href="/">Buscar</a>
        </div>

        <a class="navbar-brand" href="/user">
        <img src="{{ asset('images/user.svg') }}" height="30">
        </a>
        
        <a class="navbar-brand" href="/shop">
        <img src="{{ asset('images/shopping-cart.svg') }}" height="30">
        </a>
    </div>
</nav>

<div style="text-align:center; margin-top:50px;">
    <h1>Productos:</h1>
</div>

<div style="text-align:left; margin-top:50px;">
    <div class>
        <img src="{{ asset('images/paleta-hombre.jpeg') }}" alt="Icono" height="200">
        <p>Paleta Bullpadel Onyx Power 2.0 Rojo</p>
        <p>$210000</p>
    </div>

    <div class>
    <img src="{{ asset('images/paleta-mujer.jpeg') }}" alt="Icono" height="200">
    <p>Paleta Bullpadel Indiga Woman 26</p>
    <p>$280000</p>
    </div>

    <div class>
    <img src="{{ asset('images/pelotas-bull.jpeg') }}" alt="Icono" height="200">
    <p>Pelotas X-Trust</p>
    <p>$13000</p>
    </div>

    <div class>
    <img src="{{ asset('images/pelotas-xtrust.jpeg') }}" alt="Icono" height="200">
    <p>Pelotas X-Trust</p>
    <p>$7500</p>
    </div>

    <div class>
    <img src="{{ asset('images/pelotas-odea.jpeg') }}" alt="Icono" height="200">
    <p>Pelotas Odea</p>
    <p>$8000</p>
    </div>

    <div class>
    <img src="{{ asset('images/remera-babolat.jpeg') }}" alt="Icono" height="200">
    <p>Remera Babolat</p>
    <p>$50000</p>
    </div>

    <div class>
    <img src="{{ asset('images/remera-wilson.jpeg') }}" alt="Icono" height="200">
    <p>Remera Wilson</p>
    <p>$30000</p>
    </div>
    
    <div class>
    <img src="{{ asset('images/grip-blanco.jpeg') }}" alt="Icono" height="200">
    <p>Pack grip Wilson blanco</p>
    <p>$15000</p>
    </div>
    
    <div class>
    <img src="{{ asset('images/grip-negro.jpeg') }}" alt="Icono" height="200">
    <p>Pack grip Wilson negro</p>
    <p>$12000</p>
    </div>
</div>
</body>

</html>