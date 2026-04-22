<!DOCTYPE html>
<html>

<head>
    <title>Contacto</title>
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar">
    <div class="container-fluid px-0">

        <a class="navbar-brand ms-2" href="/main">
            <img src="{{ asset('images/icono.PNG') }}" alt="Icono" height="40">
        </a>

        <a class="navbar-brand ms-auto" href="/user">
        <img src="{{ asset('images/user.svg') }}" height="30">
        </a>
        
        <a class="navbar-brand" href="/shop">
        <img src="{{ asset('images/shopping-cart.svg') }}" height="30">
        </a>
    </div>
</nav>

<div style="text-align:center; margin-top:50px;">
    <h1>Contactanos:</h1>
</div>

<form>
  <div class="mb-3">
    <label for="exampleInputName" class="form-label">Nombre</label>
    <input type="name" class="form-control" id="exampleInputName" aria-describedby="nameHelp">
  <div class="mb-3">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Correo Electrónico</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  <div class="mb-3">
  <div class="mb-3">
    <label for="exampleInputPhone" class="form-label">Teléfono</label>
    <input type="phone" class="form-control" id="exampleInputPhone" aria-describedby="phoneHelp">
  <div class="mb-3">

    <!-- extender la barra de mensaje -->
    <label for="exampleInputPassword1" class="form-label">Mensaje:</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>

</body>

</html>