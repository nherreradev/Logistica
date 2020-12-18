{{> header}}

    <style>
        body{
            background-color: #b0a9a9;
            color: #fff;
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
</header>

{{#notificacion}}
<div class="container">
    <div class="row">
        <div class="col s12 m12">
            <div class="card black darken-1">
                <div class="card-content white-text">
                    <p class="error center-align {{colorNotificacion}}-text ">{{notificacion}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
{{/notificacion}}


<div class="row login">
    <div class="col s12 m4 offset-m4">
        <div class="card">
            <div class="card-action gray accent-4 orange-text">
                <h3>Registrar Usuario</h3>
            </div>
            <form method="POST" action="/registro/procesarFormulario">
                <div class="card-content">

                    <div class="form-field">
                        <label for="username">Ingrese usuario:</label>
                        <input type="text" id="usuario" name="usuario" class="white-text" required>
                    </div><br>

                    <div class="form-field">
                        <label for="username">Ingrese nombre completo:</label>
                        <input type="text" id="nombreCompleto" name="nombreCompleto" class="white-text" required>
                    </div><br>

                    <div class="form-field">
                        <label for="password">Ingrese contraseña:</label>
                        <input type="password" id="password" name="password" class="white-text" required>
                    </div><br>

                    <div class="form-field">
                        <label for="dni">D.N.I.:</label>
                        <input type="number" id="dni" name="dni" class="white-text" required>
                    </div><br>

                    <div class="form-field">
                        <label for="f_nac">Ingrese fecha nacimiento:</label>
                        <input type="date" id="f_nac" name="f_nac" class="white-text" required>
                    </div><br>

                    <div class="form-field center-align">
                        <button type="submit" class="btn-large black accent-4">Enviar</button>
            </form>

        </div><br>
        <div class="center-align">
            <a href="../../index.php" class="btn-large red accent-5 center-align">Volver al lobby</a>
        </div>
    </div>

</div>
</div>
</div>

{{> footer}}

