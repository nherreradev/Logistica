{{> header}}
<div class="hscroll">
    <div class="row">
        <div class="col s12 m12">
            <div class="card black darken-1 hscroll">
                <div class="card-content white-text">
                    <h4 for="username" class="orange-text">Lista de usuarios sin rol:</h4>

                    <table class="striped" width="100%" border="1" cellspacing="0" cellpadding="6" >
                        <thead>
                        <tr class="orange-text">
                            <th>Usuario</th>
                            <th>Nombre completo</th>
                            <th>Dni</th>
                            <th>Fecha de nacimiento</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>

                        <tbody>
                        {{#listadoDeUsuariosSinRol}}
                        <tr>
                            <td>{{usuario}}</td>
                            <td>{{nombre_completo}}</td>
                            <td>{{dni}}</td>
                            <td>{{f_nac}}</td>
                            <td>{{descripcion}}</td>
                            <td>
                                <form action="/administrador/asignarRolAUsuario" method="post">
                                    <div class="input-field col s12">
                                        <select name="rol" required>
                                            <option value="" disabled selected>Sin rol</option>
                                            {{#roles}}
                                            <option value="{{id_rol}}">{{descripcion}}</option>
                                            {{/roles}}
                                        </select>
                                        <label>Seleccione un rol</label>
                                    </div>
                                    <input type="hidden" value="{{usuario}}" name="usuario">
                                    <button class="btn waves-effect waves-light orange darken-2" type="submit" name="action">Asignar Rol
                                        <i class="material-icons right">send</i>
                                    </button>
                                </form>
                            </td>

                        </tr>
                        {{/listadoDeUsuariosSinRol}}
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>

</div>
{{> footer}}
