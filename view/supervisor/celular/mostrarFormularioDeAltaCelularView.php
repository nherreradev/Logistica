{{> header}}
<div class="row login">
    <div class="col s12 m4 offset-m4">
        <div class="card">
            <div class="card-action gray accent-4 orange-text">
                <h3>Registrar Celular</h3>
            </div>
            <form method="POST" action="/supervisor/procesarFormularioCelular">
                <div class="card-content">

                    <div class="form-field">
                        <label for="numeroCelular">Numero Celular:</label>
                        <input type="tel" id="numeroCelular" name="numeroCelular" class="white-text" required>
                    </div>
                    <br>

                    <div class="form-field center-align">
                        <button type="submit" class="btn-large black accent-4">Registrar</button>
            </form>

        </div>
{{> footer}}