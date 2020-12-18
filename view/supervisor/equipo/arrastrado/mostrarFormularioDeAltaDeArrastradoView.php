{{> header}}
<div class="row login">
    <div class="col s12 m4 offset-m4">
        <div class="card">
            <div class="card-action gray accent-4 orange-text">
                <h3>Registrar Arrastrado</h3>
            </div>
            <form method="POST" action="/supervisor/procesarFormularioArrastrado">
                <div class="card-content">

                    <div class="form-field">
                        <label for="marca">Patente:</label>
                        <input type="text" id="patente" name="patente" class="white-text" required>
                    </div>
                    <br>

                    <div class="form-field">
                        <label for="nroChasis">Numero de chasis:</label>
                        <input type="text" id="nroChasis" name="nroChasis" class="white-text" required>
                    </div>
                    <br>

                    <div class="form-field center-align">
                        <button type="submit" class="btn-large black accent-4">Enviar</button>
            </form>

        </div>

{{> footer}}