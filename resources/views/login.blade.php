<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <title>Inicio de sesión</title>
</head>

<body>
<div class="container">
    <div class="img">
        <img src="{{ asset('img/portada.jpg') }}">
    </div>
    <div class="login-content">
        <form method="POST" autocomplete="off">
            @csrf
            <img src="{{ asset('img/avatar.svg') }}">
            <h2 class="title">BIENVENIDO</h2>
{{--            @include('models.validar') <!-- Ensure the view file path is correct -->--}}

            <br>

            <div class="input-div one">
                <div class="i">
                    <i class="fas fa-user"></i>
                </div>
                <div class="div">
                    <h5>Usuario</h5>
                    <input id="usuario" type="text" class="input" name="usuario" required>
                </div>
            </div>
            <div class="input-div pass">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>
                <div class="div">
                    <h5>Contraseña</h5>
                    <input type="password" id="input" class="input" name="password" required>
                </div>
            </div>
            <div class="view">
                <div class="fas fa-eye verPassword" onclick="vista()" id="verPassword"></div>
            </div>
            <input name="btningresar" class="btn" type="submit" value="INICIAR SESION">
        </form>
    </div>
</div>

<script src="{{ asset('js/fontawesome.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/main2.js') }}"></script>

</body>
</html>
