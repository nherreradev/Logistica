{{> header}}

<div class="row login">
    <div class="col s12 m4 offset-m4">
        <div class="card">
            <div class="card-action gray accent-4 orange-text">
                <h3>Carga de combustible</h3>
            </div>
            <form method="POST" name="formCarga" id="formCarga" action="/chofer/procesarCargaCombustible">
                <div class="card-content">

                    <div class="form-field">
                        <label for="lugar">ID Proforma:</label>
                        <input type="text" class="white-text" disabled required value="{{id_proforma}}">
                    </div>

                    <div class="form-field">
                        <label for="cantidad_litros">Cantidad de litros:</label>
                        <input type="number" id="cantidad_litros" name="cantidad_litros" class="white-text" required>
                    </div>
                    <br>

                    <div class="form-field">
                        <label for="importe">Importe:</label>
                        <input type="number" id="importe" name="importe" class="white-text" required>
                    </div>
                    <br>

                    <div class="form-field">
                        <label for="lugar">Lugar:</label>
                            <input  type="text" id="lugar" name="lugar" class="white-text" required>

                    </div>
                    <input type="text" id="id_proforma" name="id_proforma" class="white-text" hidden required value="{{id_proforma}}">
                    <div class="form-field center-align">
                        <button type="submit" class="btn-large black accent-4">Cargar</button>
                        <input type="text" id="latitud" name="latitud" class="white-text" hidden  required value="">
                        <input type="text" id="longitud" name="longitud"  class="white-text" hidden  required value="">
            </form>
        </div>
        <script>
            (function(){
                var lon ;
                var lat ;

                if (navigator.geolocation)
                {
                    navigator.geolocation.getCurrentPosition(function(objPosition)
                    {
                         lon = objPosition.coords.longitude;
                         lat = objPosition.coords.latitude;

                     document.formCarga.latitud.value = lat
                     document.formCarga.longitud.value = lon

                        debugger
                        var lugar = document.getElementById("lugar");

                        fetch(`https://nominatim.openstreetmap.org/reverse?lat=${lat}&lon=${lon}&format=json`,{
                            method:"POST"
                        })
                            .then(res => res.json())
                            .then(data => {
                                if(data.address.suburb == null){
                                    lugar.placeholder = "Inserte un lugar"
                                }else{
                                    lugar.value = data.address.suburb;
                                }

                            })
                            .catch(e=>console.log(e))

                    }, function(objPositionError)
                    {
                        switch (objPositionError.code)
                        {
                            case objPositionError.PERMISSION_DENIED:
                                content.innerHTML = "No se ha permitido el acceso a la posición del usuario.";
                                break;
                            case objPositionError.POSITION_UNAVAILABLE:
                                content.innerHTML = "No se ha podido acceder a la información de su posición.";
                                break;
                            case objPositionError.TIMEOUT:
                                content.innerHTML = "El servicio ha tardado demasiado tiempo en responder.";
                                break;
                            default:
                                content.innerHTML = "Error desconocido.";
                        }
                    }, {
                        maximumAge: 75000,
                        timeout: 15000
                    });
                }
                else
                {
                    content.innerHTML = "Su navegador no soporta la API de geolocalización.";
                }


            })();
        </script>
{{> footer}}
