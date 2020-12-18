{{> header}}
{{#mostrarFormularioDeAltaDeTractor}}
<div class="row login">
    <div class="col s12 m4 offset-m4">
        <div class="card">
            <div class="card-action gray accent-4 orange-text">
                <h3>Registrar Tractor</h3>
            </div>
            <form method="POST" action="/supervisor/procesarFormularioTractor">
                <div class="card-content">

                    <div class="form-field">
                        <label for="marca">Marca:</label>
                        <input type="text" id="marca" name="marca" class="white-text" required>
                    </div>
                    <br>

                    <div class="form-field">
                        <label for="modelo">Modelo:</label>
                        <input type="text" id="modelo" name="modelo" class="white-text" required>
                    </div>
                    <br>

                    <div class="form-field">
                        <label for="anioFabricacion">Año de fabricacion:</label>
                        <input type="date" id="anioFabricacion" name="anioFabricacion" class="white-text"
                               required>
                    </div>
                    <br>

                    <div class="form-field">
                        <label for="nroMotor">Numero de motor:</label>
                        <input type="text" id="nroMotor" name="nroMotor" class="white-text" required>
                    </div>
                    <br>

                    <div class="form-field">
                        <label for="nroChasis">Numero de chasis:</label>
                        <input type="text" id="nroChasis" name="nroChasis" class="white-text" required>
                    </div>
                    <br>

                    <div class="form-field">
                        <label for="patente">Patente:</label>
                        <input type="text" id="patente" name="patente" class="white-text" required>
                    </div>
                    <br>

                    <div class="form-field">
                        <label for="kilometraje">Kilometraje:</label>
                        <input type="number" id="kilometraje" name="kilometraje" class="white-text" required>
                    </div>
                    <br>

                    <div class="form-field center-align">
                        <button type="submit" class="btn-large black accent-4">Enviar</button>
            </form>

        </div>
{{/mostrarFormularioDeAltaDeTractor}}
{{> footer}}