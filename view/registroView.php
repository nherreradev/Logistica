<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login system</title>

    <link href="/css/icon.css"  rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="/third-party/css/style.css">
    <style>
        body{
            background-color: #b0a9a9;
            color: #fff;
        }
        .login{
            margin-top: 100px;
        }
        .login .card{
            background: rgba(0,0,0,.6);
        }
        .login label{
            font-size: 16px;
            color:#ccc;
        }
        .login input{
            font-size: 22px !important;
        }
        .login button:hover{
            padding: 0px 40px;
        }

    </style>
</head>

<div class="row login">
    <div class="col s12 m4 offset-m4">
        <div class="card">
            <div class="card-action gray accent-4 orange-text">
                <h3>Registrar Usuario</h3>
            </div>
            <form method="POST" action="/registro/procesarFormulario">
                <div class="card-content">
                    <div class="form-field">
                        <label for="username">Ingrese Usuario:</label>
                        <input type="text" id="usuario" name="usuario" class="white-text">
                    </div><br>

                    <div class="form-field">
                        <label for="password">Ingrese contraseña:</label>
                        <input type="password" id="password" name="password" class="white-text">
                    </div><br>

                    <div class="form-field">
                        <label for="dni">D.N.I.:</label>
                        <input type="number" id="dni" name="dni" class="white-text">
                    </div><br>

                    <div class="form-field">
                        <label for="f_nac">Ingrese fecha nacimiento:</label>
                        <input type="text" id="f_nac" name="f_nac" class="white-text">
                    </div><br>

                    <div class="form-field center-align">
                        <button type="submit" class="btn-large black accent-4">Enviar</button>
            </form>

        </div><br>
        <div class="center-align">
            <a href="/login" class="btn-large orange accent-4 center-align">Volver al lobby</a>
        </div>
        {{#mensaje}}
        <p class="error center-align red-text ">{{mensaje}}</p>
        {{/mensaje}}
    </div>
</div>
</div>
</div>





<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</html>