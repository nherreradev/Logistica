{{> header}}
{{#mostrarDatosDelArrastradoConcretoAModificar}}
<div class="container">
    <div class="row">
        <div class="col s12 m12">
            <div class="card black darken-1">
                <div class="card-content white-text">
                    <form method="POST" action="/supervisor/modificarArrastradoConcreto">
                        <div class="card-content">
                            <h3 class="orange-text">Modificar Arrastrado</h3>
                            <div class="form-field">
                                <div class="form-field">
                                    <label for="marca">Patente:</label>
                                    <input type="text" id="patente" name="patente" class="white-text"
                                           value="{{patente_arrastrado}}"
                                           required>
                                </div>
                                <br>

                                <div class="form-field">
                                    <label for="modelo">Numero de chasis:</label>
                                    <input type="text" id="nroChasis" name="nroChasis"
                                           class="white-text" value="{{nro_chasis}}"
                                           required>
                                </div>
                                <br>

                                <div class="card-action">
                                    <input type="hidden" name="id_arrastrado" value="{{id_arrastrado}}">
                                    <button class="btn waves-effect waves-light blue darken-2"
                                            type="submit"
                                            name="action">Modificar Arrastrado
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


{{/mostrarDatosDelArrastradoConcretoAModificar}}
{{> footer}}