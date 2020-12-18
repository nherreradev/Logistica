{{> header}}
<div class="hscroll">
    <div class="row">
        <div class="col s12 m12">
            <div class="card black darken-1 hscroll">
                <div class="card-content white-text">
                    <h4 for="username" class="orange-text">Lista de tractores:</h4>

                    <table class="striped" width="100%" border="1" cellspacing="0" cellpadding="6" >
                        <thead>
                        <tr class="orange-text">
                            <th>Marca de tractor</th>
                            <th>Patente</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>

                        <tbody>
                        {{#listadoDeTractor}}
                        <tr>
                            <td>{{marca}}</td>
                            <td>{{patente_tractor}}</td>
                            <td>
                                <form action="/supervisor/mostrarDetalleDeTractor" method="post">
                                    <input type="hidden" value="{{id_tractor}}" name="id_tractor">
                                    <button class="btn waves-effect waves-light blue darken-2" type="submit" name="action">
                                        Ver detalle<i
                                                class="material-icons right">send</i></button>
                                </form>
                            </td>
                            <td>
                                <form action="/supervisor/eliminarTractor" method="post">
                                    <input type="hidden" value="{{id_tractor}}" name="id_tractor">
                                    <button class="btn waves-effect waves-light blue darken-2" type="submit"
                                            name="action">Eliminar<i
                                                class="material-icons right">send</i></button>
                                </form>
                            </td>
                            <td>
                                <form action="/supervisor/mostrarDatosDelTractorConcretoAModificar" method="post">
                                    <input type="hidden" value="{{id_tractor}}" name="id_tractor">
                                    <button class="btn waves-effect waves-light blue darken-2" type="submit"
                                            name="action">Modificar<i
                                                class="material-icons right">send</i></button>
                                </form>
                            </td>

                        </tr>
                        {{/listadoDeTractor}}
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>

</div>
{{> footer}}
