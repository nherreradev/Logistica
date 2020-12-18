{{> header}}
<div class="hscroll">
    <div class="row">
        <div class="col s12 m12">
            <div class="card black darken-1 hscroll">
                <div class="card-content white-text">
                    <h4 for="username" class="orange-text">Lista de usuarios:</h4>

                    <table class="striped" width="100%" border="1" cellspacing="0" cellpadding="6" >
                        <thead>
                        <tr class="orange-text">
                            <th>Denominacion</th>
                            <th>Cuit cliente</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>

                        <tbody>
                        {{#listadoDeClientes}}
                        <tr>
                            <td>{{denominacion}}</td>
                            <td>{{cuit}}</td>
                            <td>
                                <form action="/supervisor/mostrardetalledecliente" method="post">
                                    <input type="hidden" value="{{id_cliente}}" name="id_cliente">
                                    <button class="btn waves-effect waves-light orange darken-2" type="submit" name="action">Ver
                                        detalle<i class="material-icons right">send</i></button>
                                </form>
                            </td>
                            <td>
                                <form action="/supervisor/eliminarCliente" method="post">
                                    <input type="hidden" value="{{id_cliente}}" name="id_cliente">
                                    <button class="btn waves-effect waves-light orange darken-2" type="submit" name="action">
                                        Eliminar <i class="material-icons right">send</i>
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form action="/supervisor/mostrarDatosDelClienteConcretoAModificar" method="post">
                                    <input type="hidden" value="{{id_cliente}}" name="id_cliente">
                                    <button class="btn waves-effect waves-light orange darken-2" type="submit" name="action">
                                        Modificar<i
                                                class="material-icons right">send</i></button>
                                </form>
                            </td>
                        </tr>
                        {{/listadoDeClientes}}
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>

</div>

{{> footer}}