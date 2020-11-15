<form method="POST" action="/administrador/obtenerUsuariosSinRol">

            <button type="submit" class="btn-large black accent-4">Listar usuarios sin rol</button>
</form>



{{#mensaje}}
<p class="error center-align red-text ">Id Usuario: {{id_usuario}}</p>
<p class="error center-align red-text ">Nombre Usuario: {{usuario}}</p>
<p class="error center-align red-text ">Dni: {{dni}}</p>
<p class="error center-align red-text ">Rol: {{id_rol}}</p>

{{/mensaje}}


