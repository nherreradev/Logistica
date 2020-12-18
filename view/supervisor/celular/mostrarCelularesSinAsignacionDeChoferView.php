{{> header}}

    <div class="row">
        <div class="col s12 m12">
            <div class="card black darken-1 ">
                <div class="card-content white-text">
                    <h4 for="username" class="orange-text">Lista de celulares sin asignar:</h4>

                    <table class="striped" width="100%" border="1" cellspacing="0" cellpadding="6" >
                        <thead>
                        <tr class="orange-text">
                            <th>Celular</th>
                            <th>Accion</th>
                        </tr>
                        </thead>

                        <tbody>
                        {{#mostrarCelularesSinAsignacionDeChofer}}
                        <tr>
                            <td>{{nro}}</td>
                            <td>
                                <form action="/supervisor/asignarCelularAChofer" method="post">
                                    <div class="input-field col s12">
                                        <select name="usuario" required>
                                            <option value="" disabled selected>Sin chofer asignado</option>
                                            {{#choferesSinCelularAsignado}}
                                            <option value="{{usuario}}">{{nombre_completo}}</option>
                                            {{/choferesSinCelularAsignado}}
                                        </select>
                                    </div>
                                    <input type="hidden" value="{{id_celular}}" name="idCelular">
                                    <button class="btn waves-effect waves-light yellow darken-2" type="submit"
                                            name="action">Asignar
                                        <i class="material-icons right">send</i>
                                    </button>
                                </form>
                            </td>

                        </tr>
                        {{/mostrarCelularesSinAsignacionDeChofer}}
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>



{{> footer}}
