{{> header}}
<div class="hscroll">
    <div class="row">
        <div class="col s12 m12">
            <div class="card black darken-1 hscroll">
                <div class="card-content white-text">
                    <h4 for="username" class="orange-text">Lista de proformas:</h4>

                    <table class="striped" width="100%" border="1" cellspacing="0" cellpadding="6" >
                        <thead>
                        <tr class="orange-text">
                            <th>Numero</th>
                            <th>Fecha</th>
                            <th>Origen</th>
                            <th>Destino</th>
                            <th>Denominacion</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>

                        <tbody>
                        {{#mostrarListadoDeProformas}}
                        <tr>
                            <td>{{id_proforma}}</td>
                            <td>{{fecha}}</td>
                            <td>{{viaje_origen}}</td>
                            <td>{{viaje_destino}}</td>
                            <td>{{denominacion}}</td>
                            <td>{{estado}}</td>
                            <td>
                                <form action="/proforma/mostrarDetalle" method="post">
                                    <input type="hidden" value="{{id_proforma}}" name="id_proforma">
                                    <button class="btn waves-effect waves-light green darken-2" type="submit"
                                            name="action">Ver detalle<i
                                                class="material-icons right">send</i></button>
                                </form>
                            </td>
                            <td>
                                <form action="/proforma/generarPdf" method="post">
                                    <input type="hidden" value="{{id_proforma}}" name="id_proforma">
                                    <button class="btn waves-effect waves-light green darken-2" type="submit"
                                            name="action">Generar PDF<i
                                                class="material-icons right">send</i></button>
                                </form>
                            </td>
                            <td>
                                <form action="/proforma/eliminar" method="post">
                                    <input type="hidden" value="{{id_proforma}}" name="id_proforma">
                                    <button class="btn waves-effect waves-light green darken-2" type="submit"
                                            name="action">Eliminar<i
                                                class="material-icons right">send</i></button>
                                </form>
                            </td>
                            <td>
                                <form action="/proforma/mostrarDatosDeProformaAModificar" method="post">
                                    <input type="hidden" value="{{id_proforma}}" name="id_proforma">
                                    <button class="btn waves-effect waves-light green darken-2" type="submit"
                                            name="action">Modificar<i
                                                class="material-icons right">send</i></button>
                                </form>
                            </td>

                        </tr>
                        {{/mostrarListadoDeProformas}}
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>

</div>
{{> footer}}