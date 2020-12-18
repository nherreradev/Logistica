{{> header}}
<div class="hscroll">
    <div class="row">
        <div class="col s12 m12">
            <div class="card black darken-1 hscroll">
                <div class="card-content white-text">
                    <h4 for="username" class="orange-text">Lista de celulares:</h4>

                    <table class="striped" width="100%" border="1" cellspacing="0" cellpadding="6" >
                        <thead>
                        <tr class="orange-text">
                            <th>Numero del celular</th>
                            <th>Chofer asignado</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>

                        <tbody>
                        {{#listadoDeCelulares}}
                        <tr>
                            <td>{{nro}}</td>
                            <td>{{nombre_completo}}</td>
                            <td>
                                <form action="/supervisor/mostrarDatosDelCelularConcretoAModificar" method="post">
                                    <input type="number" value="{{id_celular}}" name="idCelular" hidden>
                                    <button class="btn waves-effect waves-light yellow darken-2" type="submit"
                                            name="action">Modificar<i class="material-icons right">send</i></button>
                                </form>
                            </td>
                            <td>
                                <form action="/supervisor/quitarChoferAsignado" method="post">
                                    {{#id_chofer}}
                                    <input type="hidden" value="{{id_celular}}" name="idCelular">
                                    <button class="btn waves-effect waves-light yellow darken-3" type="submit"
                                            name="action">Quitar
                                        chofer asignado<i class="material-icons right">send</i></button>
                                    {{/id_chofer}}
                                </form>

                            </td>

                        </tr>
                        {{/listadoDeCelulares}}
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>

</div>

{{> footer}}