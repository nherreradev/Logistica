{{> header}}
{{#mostrarDatosDelCelularConcretoAModificar}}
    <div class="container">
        <div class="row">
            <div class="col s12 m12">
                <div class="card black darken-1">
                    <div class="card-content white-text">
                        <form method="POST" action="/supervisor/modificarCelularConcreto">
                            <div class="card-content">
                                <h3 class="orange-text">Modificar Celular</h3>
                                <div class="form-field">
                                    <div class="form-field">
                                        <label for="numeroCelular">Numero Celular:</label>
                                        <input type="text" id="numeroCelular" name="numeroCelular"
                                               class="white-text" value="{{nro}}"
                                               required>
                                    </div>
                                    <br>
                                    <div class="card-action">
                                        <input type="hidden" name="idCelular" value="{{id_celular}}">
                                        <button class="btn waves-effect waves-light yellow darken-2"
                                                type="submit"
                                                name="action">Modificar Celular
                                            <i class="material-icons right">send</i>

                                        </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
{{/mostrarDatosDelCelularConcretoAModificar}}
{{> footer}}
