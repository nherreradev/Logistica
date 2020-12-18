<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login system</title>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="/third-party/css/style.css" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<header>

<style>
    body {
        background-color: #b0a9a9;
        color: #fff;
    }

    .login {
        margin-top: 100px;
    }

    .login .card {
        background: rgba(0, 0, 0, .6);
    }

    .login label {
        font-size: 16px;
        color: #ccc;
    }

    .login input {
        font-size: 22px !important;
    }

    .login button:hover {
        padding: 0px 40px;
    }

    .login p {
        margin-top: 1em;
    }
</style>

<nav>
    <div style="padding: 0 10px !important" class="nav-wrapper black">
        <a href="/chofer" class="brand-logo">Chofer</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a class="btn red darken-2" href="/chofer/cerrarSesion">Cerrar sesión</a></li>
        </ul>
    </div>
</nav>
</header>

{{#faltaValidarLicenciaYORegistro}}
<div class="container">
    <div class="row">
        <div class="col s12 m12">
            <div class="card black darken-1">
                <div class="card-content white-text">
                    <span class="card-title"><strong>Licencia:</strong> {{tipo_de_licencia}}</span>
                    <p><strong>Celular:</strong> {{nro}}</p>
                    <p class="red-text">Aun faltan validar la licencia y/o asignar un celular, por favor, comuniquese
                        con su supervisor</p>
                </div>
            </div>
        </div>
    </div>
</div>
{{/faltaValidarLicenciaYORegistro}}
{{> footer}}