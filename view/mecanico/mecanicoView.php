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
                    <p><strong>Rol:</strong> {{descripcion}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
{{/mensaje}}


{{> footer}}