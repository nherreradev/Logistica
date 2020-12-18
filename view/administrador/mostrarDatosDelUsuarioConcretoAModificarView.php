{{> header}}
{{#mostrarDatosDelUsuarioConcretoAModificar}}
<div class="container">
    <div class="row">
        <div class="col s12 m12">
            <div class="card black darken-1">
                <div class="card-content white-text">
                    <form method="POST" action="/administrador/modificarUsuarioSeleccionado">
                        <div class="card-content">
                            <div class="form-field">
                                <h4 for="username" class="orange-text">Usuario a modificar:</h4>
                                <h5 for="username">{{usuario}}</h5>
                            </div><br>

                            <div class="form-field">
                                <label for="username">Ingrese Nombre completo:</label>
                                <input type="text" id="nombreCompleto" name="nombreCompleto" class="white-text" value="{{nombre_completo}}" required>
                            </div><br>


                            <div class="form-field">
                                <label for="dni">D.N.I.:</label>
                                <input type="number" id="dni" name="dni" class="white-text" value="{{dni}}"  required>
                            </div><br>

                            <div class="form-field">
                                <label for="f_nac">Ingrese fecha nacimiento:</label>
                                <input type="date" id="f_nac" name="f_nac" class="white-text" value="{{f_nac}}" required>
                            </div><br>

                        </div>
                        <div class="card-action">
                            <div class="input-field col s12">
                                <select name="rol" required>
                                    <option value="{{id_rol}}"  selected>{{descripcion}}</option>
                                    {{#roles}}
                                    <option value="{{id_rol}}">{{descripcion}}</option>
                                    {{/roles}}
                                </select>
                                <label>Seleccione un rol</label>
                            </div>
                            <input type="hidden" value="{{usuario}}" name="usuario">
                            <button class="btn waves-effect waves-light orange darken-2" type="submit" name="action">Modificar Usuario
                                <i class="material-icons right">send</i>
                    </form>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
{{/mostrarDatosDelUsuarioConcretoAModificar}}
{{> footer}}