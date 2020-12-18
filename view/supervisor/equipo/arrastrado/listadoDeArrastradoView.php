{{> header}}
<div class="hscroll">
    <div class="row">
        <div class="col s12 m12">
            <div class="card black darken-1 hscroll">
                <div class="card-content white-text">
                    <h4 for="username" class="orange-text">Lista de arrastrado:</h4>

                    <table class="striped" width="100%" border="1" cellspacing="0" cellpadding="6" >
                        <thead>
                        <tr class="orange-text">
                            <th>Patente de arrastrado</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>

                        <tbody>
                        {{#listadoDeArrastrado}}
                        <tr>
                            <td>{{patente_arrastrado}}</td>
                            <td>
                                <form action="/supervisor/mostrarDetalleDeArrastrado" method="post">
                                    <input type="hidden" value="{{id_arrastrado}}" name="id_arrastrado">
                                    <button class="btn waves-effect waves-light blue darken-2" type="submit" name="action">
                                        Ver detalle<i
                                                class="material-icons right">send</i></button>
                                </form>
                            </td>
                            <td>
                                <form action="/supervisor/mostrarDatosDelArrastradoConcretoAModificar"
                                      method="post">
                                    <input type="hidden" value="{{id_arrastrado}}" name="id_arrastrado">
                                    <button class="btn waves-effect waves-light blue darken-2" type="submit"
                                            name="action">Modificar<i
                                                class="material-icons right">send</i></button>
                                </form>
                            </td>
                            <td>
                                <form action="/supervisor/eliminarArrastrado" method="post">
                                    <input type="hidden" value="{{id_arrastrado}}" name="id_arrastrado">
                                    <button class="btn waves-effect waves-light blue darken-2" type="submit"
                                            name="action">Eliminar<i
                                                class="material-icons right">send</i></button>
                                </form>
                            </td>

                        </tr>
                        {{/listadoDeArrastrado}}
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>

</div>

{{> footer}}
