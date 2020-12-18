{{> header}}
    <div class="row">
        <div class="col s12 m12">
            <div class="card black darken-1">
                <div class="card-content white-text">
                    <h4 for="username" class="orange-text">Lista de choferes:</h4>
                    <table class="striped" width="100%" border="1" cellspacing="0" cellpadding="6" >
                        <thead>
                        <tr class="orange-text">
                            <th>Chofer</th>
                            <th>Accion</th>
                        </tr>
                        </thead>

                        <tbody>
                        {{#traerChoferesQueNoTienenLicenciaValidada}}
                        <tr>
                            <td>{{nombre_completo}}</td>
                            <td>
                                <form action="/supervisor/validarLicenciaDeChoferSeleccionado" method="post">
                                    <select name="idTipoDeLicencia" required>
                                        <option value="" disabled selected>Sin validar</option>
                                        {{#traerTodosLosTiposDeLicencia}}
                                        <option value="{{id_tipo_licencia}}">{{tipo_de_licencia}} {{descripcion}}
                                        </option>
                                        {{/traerTodosLosTiposDeLicencia}}
                                    </select>

                </div>
                <input type="hidden" value="{{usuario}}" name="usuario">
                <button class="btn waves-effect waves-light grey darken-2" type="submit" name="action">
                    Validar<i
                            class="material-icons right">send</i></button>
                </form>
                            </td>

                        </tr>
                        {{/traerChoferesQueNoTienenLicenciaValidada}}
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>


{{> footer}}