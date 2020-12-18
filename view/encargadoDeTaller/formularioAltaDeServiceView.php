{{> header}}
<div class="container">
    <div class="row">
        <div class="col s12 m12">
            <div class="card black darken-1">
                <div class="card-content white-text">
                    <form method="POST" action="/encargadoDeTaller/procesarService">
                        <div class="card-content">
                            <h3 class="orange-text">Cargar Service</h3>

                            <div class="form-field">
                                <label for="fecha">Fecha</label>
                                <input type="date" id="fecha" name="fecha" class="white-text"   required>
                            </div><br>


                            <div class="form-field">
                                <label for="costo">Costo:</label>
                                <input type="number" id="costo" name="costo" class="white-text" required>
                            </div><br>

                            <div class="form-field">
                                <label for="descripcion">Descripcion:</label>
                                <input type="text" id="descripcion" name="descripcion" class="white-text"  required>
                            </div><br>


                            <div class="form-field">
                                <label for="repuesto_utilizado">Repuestos Utilizados:</label>
                                <input type="text" id="repuesto_utilizado" name="repuesto_utilizado" class="white-text"  required>
                            </div><br>

                            <div class="form-field">
                                <label for="km_unidad">Kilometros de la unidad:</label>
                                <input type="text" id="km_unidad" name="km_unidad" class="white-text"  required>
                            </div><br>

                            <div class="form-field">
                                <label for="tipo_service">Seleccione tipo de service</label>
                                <select name="tipo_service" required>
                                    <option value="" selected disabled>Seleccionar tipo service</option>
                                    <option value="interno" >Interno</option>
                                    <option value="externo" >Externo</option>
                                </select>
                            </div><br>

                            <div class="form-field">
                                <label for="id_tractor">Seleccione Tractor</label>
                                <select name="id_tractor" required>
                                    <option value="" selected disabled>Seleccionar tractor</option>
                                    {{#cargarSelectTractor}}
                                    <option value="{{id_tractor}}">{{patente_tractor}}</option>
                                    {{/cargarSelectTractor}}
                                </select>
                            </div><br>


                            <div class="form-field">
                                <label for="id_mecanico">Seleccione Mecanico</label>
                                <select name="id_mecanico" required>
                                    <option value="" selected disabled>Selecciona mecanico</option>
                                    {{#cargarSelectMecanico}}
                                    <option value="{{id_mecanico}}">{{nombre}}</option>
                                    {{/cargarSelectMecanico}}
                                </select>
                            </div><br>

                            <div class="card-action">
                                <button class="btn waves-effect waves-light orange darken-2" type="submit" name="action">Cargar
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                    </form>
            </div>
        </div>
    </div>
</div>
{{> footer}}
