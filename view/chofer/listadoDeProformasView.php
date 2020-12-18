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
                            <th>Id proforma</th>
                            <th>Nombre cliente</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>

                        <tbody>
                        {{#listadoDeProformas}}
                        <tr>
                            <td>{{id_proforma}}</td>
                            <td>{{denominacion}}</td>
                            <td>
                                <form action="/chofer/modificarProformaConcreta" method="post">
                                    <input type="hidden" value="{{id_proforma}}" name="id_proforma">
                                    <button class="btn waves-effect waves-light orange darken-2" type="submit" name="action">Finalizar<i class="material-icons right">send</i></button>
                                </form>
                            </td>
                            <td>
                                <form action="/chofer/verDetalleDeProformaConcretaAModificar" method="post">
                                    <input type="hidden" value="{{id_proforma}}" name="id_proforma">

                                    <button class="btn waves-effect waves-light orange darken-2" type="submit" name="action">
                                        Modificar<i class="material-icons right">send</i>
                                    </button>
                                </form>
                            </td>
                        {{/listadoDeProformas}}
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>

</div>


{{> footer}}