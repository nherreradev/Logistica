{{> header}}
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
        .login p{
            margin-top: 1em;
        }
    </style>
</header>


<div class="row login">
    <div class="col s12 m4 offset-m4">
        <div class="card">
            <div class="card-action gray accent-4 orange-text">
                <h3>Ingresando al sistema</h3>
            </div>
            <form method="POST" action="/login/procesarFormulario">
                <div class="card-content">
                    <div class="form-field">
                        <label for="usuario">Ingrese Usuario:</label>
                        <input type="text" id="usuario" name="usuario" class="white-text">
                    </div><br>

                    <div class="form-field">
                        <label for="password">Ingrese contraseña:</label>
                        <input type="password" id="password" name="password" class="white-text">
                    </div><br>

                    <div class="form-field center-align">
                        <button type="submit" class="btn-large black accent-4">Ingresar</button>
            </form>

        </div><br>
        <div class="center-align">
            <a href="/registro" class="btn-large orange accent-4 center-align">Registrarse</a>

        </div>
        {{#mensaje}}
        <p class="error center-align red-text ">{{mensaje}}</p>
        {{/mensaje}}
    </div>
</div>
</div>



</div>




{{> footer}}

</html>
