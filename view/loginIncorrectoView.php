{{> header}}
<div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="band">
    <h2 class="w3-wide">Login</h2>
    <form action="index.php?module=Login&action=procesarFormulario" method="POST">
        <input type="text" name="usuario" placeholder="usuario">
        <input type="text" name="password" placeholder="password" >
        <input type="submit" value="Enviar">
    </form>
</div>
{{> footer}}
