{{> header}}

<div class="row login">
    <div class="col s12 m4 offset-m4">
        <div class="card">
            <div class="card-action gray accent-4 orange-text">
                <h3>Registrar Cliente</h3>
            </div>
                <form method="POST" action="/supervisor/procesarFormularioCliente">
                    <div class="card-content">

                        <div class="form-field">
                            <label for="denominacion">Denominacion:</label>
                            <input type="text" id="denominacion" name="denominacion" class="white-text" required>
                        </div>
                        <br>

                        <div class="form-field">
                            <label for="email">Email:</label>
                            <input type="text" id="email" name="email" class="white-text" required>
                        </div>
                        <br>

                        <div class="form-field">
                            <label for="telefono">Telefono:</label>
                            <input type="text" id="telefono" name="telefono" class="white-text" required>
                        </div>
                        <br>

                        <div class="form-field">
                            <label for="contacto1">Contacto 1:</label>
                            <input type="text" id="contacto1" name="contacto1" class="white-text" required>
                        </div>
                        <br>

                        <div class="form-field">
                            <label for="contacto2">Contacto 2:</label>
                            <input type="text" id="contacto2" name="contacto2" class="white-text" required>
                        </div>
                        <br>

                        <div class="form-field">
                            <label for="cuit">Cuit:</label>
                            <input type="text" id="cuit" name="cuit" class="white-text" required>
                        </div>
                        <br>

                        <div class="form-field">
                            <label for="calle">Calle:</label>
                            <input type="text" id="calle" name="calle" class="white-text" required>
                        </div>
                        <br>

                        <div class="form-field">
                            <label for="nro">Nro:</label>
                            <input type="text" id="nro" name="nro" class="white-text" required>
                        </div>
                        <br>

                        <div class="form-field">
                            <label for="codigoPostal">Codigo postal:</label>
                            <input type="text" id="codigoPostal" name="codigoPostal" class="white-text" required>
                        </div>
                        <br>


                        <div class="form-field center-align">
                            <button type="submit" class="btn-large black accent-4">Enviar</button>
                        </div>
                </form>

            </div>
    </div>
</div>
</div>
        {{> footer}}