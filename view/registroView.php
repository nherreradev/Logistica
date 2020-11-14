{{> header}}
<div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="band">
    <h2 class="w3-wide">Registrate!</h2>
    <form action="index.php?module=registro&action=procesarFormulario" method="POST">
        <input type="text" name="usuario" placeholder="usuario">
        <input type="password" name="password" placeholder="password" >
        <input type="number" name="dni" placeholder="dni" >
        <input type="text" name="f_nac" placeholder="f_nac" >

        <input type="submit" value="Enviar">
        {{#mensaje}}
        <p>{{mensaje}}</p>
        {{/mensaje}}
    </form>
</div>
{{> footer}}
