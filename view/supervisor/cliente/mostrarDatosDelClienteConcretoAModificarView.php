{{> header}}
{{#mostrarDatosDelClienteConcretoAModificar}}
<div class="container">
    <div class="row">
        <div class="col s12 m12">
            <div class="card black darken-1">
                <div class="card-content white-text">
                    <form method="POST" action="/supervisor/modificarClienteConcreto">
                        <div class="card-content">
                            <h3 class="orange-text">Modificar Cliente</h3>
                            <div class="form-field">
                                <div class="form-field">
                                    <label>Denominacion</label>
                                    <input type="text" id="denominacion" name="denominacion" class="white-text"
                                           value="{{denominacion}}"
                                           required>
                                </div>
                                <br>

                                <div class="form-field">
                                    <label>Email</label>
                                    <input type="text" id="email" name="email" class="white-text" value="{{email}}"
                                           required>
                                </div>
                                <br>

                                <div class="form-field">
                                    <label>Telefono</label>
                                    <input type="text" id="telefono" name="telefono" class="white-text"
                                           value="{{telefono}}" required>
                                </div>
                                <br>

                                <div class="form-field">
                                    <label>Contacto 1</label>
                                    <input type="text" id="contacto1" name="contacto1" class="white-text"
                                           value="{{contacto1}}" required>
                                </div>
                                <br>

                                <div class="form-field">
                                    <label>Contacto 2</label>
                                    <input type="text" id="contacto2" name="contacto2" class="white-text"
                                           value="{{contacto2}}" required>
                                </div>
                                <br>

                                <div class="form-field">
                                    <label>Cuit</label>
                                    <input type="text" id="cuit" name="cuit" class="white-text" value="{{cuit}}"
                                           required>
                                </div>
                                <br>

                                <div class="form-field">
                                    <label>Calle</label>
                                    <input type="text" id="direccion_calle" name="direccion_calle" class="white-text"
                                           value="{{direccion_calle}}" required>
                                </div>
                                <br>

                                <div class="form-field">
                                    <label>Nro</label>
                                    <input type="text" id="direccion_nro" name="direccion_nro" class="white-text"
                                           value="{{direccion_nro}}" required>
                                </div>
                                <br>

                                <div class="form-field">
                                    <label>Codigo postal</label>
                                    <input type="text" id="direccion_cp" name="direccion_cp" class="white-text"
                                           value="{{direccion_cp}}"
                                           required>
                                </div>
                                <br>

                            </div>
                            <div class="card-action">
                                <input type="hidden" name="id_cliente" value="{{id_cliente}}">
                                <button class="btn waves-effect waves-light orange darken-2" type="submit"
                                        name="action">Modificar
                                    Cliente
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
{{/mostrarDatosDelClienteConcretoAModificar}}
{{> footer}}