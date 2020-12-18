{{> header}}
{{#mostrarDatosDelTractorConcretoAModificar}}
<div class="container">
    <div class="row">
        <div class="col s12 m12">
            <div class="card black darken-1">
                <div class="card-content white-text">
                    <form method="POST" action="/supervisor/modificarTractorConcreto">
                        <div class="card-content">
                            <h3 class="orange-text">Modificar Tractor</h3>
                            <div class="form-field">
                                <div class="form-field">
                                    <label for="marca">Marca:</label>
                                    <input type="text" id="marca" name="marca" class="white-text"
                                           value="{{marca}}" required>
                                </div>
                                <br>

                                <div class="form-field">
                                    <label for="modelo">Modelo:</label>
                                    <input type="text" id="modelo" name="modelo" class="white-text"
                                           value="{{modelo}}" required>
                                </div>
                                <br>

                                <div class="form-field">
                                    <label for="anioFabricacion">Año de fabricacion:</label>
                                    <input type="date" id="anioFabricacion" name="anioFabricacion"
                                           class="white-text"
                                           value="{{año_fabricacion}}" required>
                                </div>
                                <br>

                                <div class="form-field">
                                    <label for="nroMotor">Numero de motor:</label>
                                    <input type="text" id="nroMotor" name="nroMotor" class="white-text"
                                           value="{{nro_motor}}"
                                           required>
                                </div>
                                <br>

                                <div class="form-field">
                                    <label for="nroChasis">Numero de chasis:</label>
                                    <input type="text" id="nroChasis" name="nroChasis"
                                           class="white-text" value="{{nro_chasis}}"
                                           required>
                                </div>
                                <br>

                                <div class="form-field">
                                    <label for="patente">Patente:</label>
                                    <input type="text" id="patente" name="patente" class="white-text"
                                           value="{{patente_tractor}}"
                                           required>
                                </div>
                                <br>

                                <div class="form-field">
                                    <label for="kilometraje">Kilometraje:</label>
                                    <input type="number" id="kilometraje" name="kilometraje"
                                           class="white-text"
                                           value="{{kilometraje}}" required>
                                </div>
                                <br>

                            </div>
                            <div class="card-action">
                                <input type="hidden" name="id_tractor" value="{{id_tractor}}">
                                <button class="btn waves-effect waves-light blue darken-2" type="submit"
                                        name="action">Modificar
                                    Tractor
                                    <i class="material-icons right">send</i>
                    </form>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>


{{/mostrarDatosDelTractorConcretoAModificar}}
{{> footer}}
