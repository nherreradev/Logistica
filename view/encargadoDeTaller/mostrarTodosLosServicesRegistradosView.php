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
                            <th>Nro Service</th>
                            <th>Descripcion</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>

                        <tbody>
                        {{#mostrarTodosLosServicesRegistrados}}
                        <tr>
                            <td>{{id_service}}</td>
                            <td>{{descripcion}}</td>
                            <td>
                                <form method="POST" action="/encargadoDeTaller/verDetalleDeServices">
                                    <input type="text" id="id_service" name="id_service" value="{{id_service}}" class="white-text" hidden>
                                    <button class="btn waves-effect waves-light orange darken-2" type="submit" name="action">Ver detalle<i
                                                class="material-icons right">send</i></button>
                                </form>
                            </td>
                            <td>
                                <form method="POST" action="/encargadoDeTaller/mostrarFormularioModificarService">
                                    <input type="text" id="id_service" name="id_service" value="{{id_service}}" class="white-text" hidden>
                                    <button class="btn waves-effect waves-light orange darken-2" type="submit" name="action">Modificar<i
                                                class="material-icons right">send</i></button>
                                </form>
                            </td>

                        </tr>
                        {{/mostrarTodosLosServicesRegistrados}}
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>

</div>
{{> footer}}