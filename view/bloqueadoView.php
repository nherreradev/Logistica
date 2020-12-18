{{> header}}
<style>
    body {
        background-color: #b0a9a9;
    }

</style>
{{#mensaje}}
<nav >
    <div style="padding: 0 10px !important" class="nav-wrapper black">
        <a href="#" class="brand-logo">Bienvenido {{usuario}}</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a  class="red btn darken-2" href="/administrador/cerrarSesion">Cerrar sesión</a></li>
        </ul>

    </div>
</nav>
</header>

<div class="container">
    <div class="row">
        <div class="col s12 m12">
            <div class="card black darken-1">
                <div class="card-content white-text">
                    <span class="card-title">Usuario: {{usuario}}</span>
                    <p>Su cuenta ha sido bloqueada, por favor, comuniquese con un administrador</p>
                    <p><strong>Rol:</strong> {{descripcion}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
{{/mensaje}}


{{> footer}}