{{> header}}
{{#mostrarDetalleDeProforma}}
<div class="container">
    <div class="row">
        <div class="col s12 m12">
            <div class="card black darken-1">
                <div class="card-content white-text">
                    <ul class="collection with-header">
                        <li class="collection-header"><strong class="orange-text text-lighten-2">
                                <h4>Proforma Numero:</strong> {{id_proforma}}</h4>
                        </li>
                        <li class="collection-item"><strong class="orange-text text-lighten-2">Fecha:</strong> {{fecha}}
                        </li>
                        <h5 class="collection-item">Cliente</h5>
                        <li class="collection-item"><strong class="orange-text text-lighten-2">Denominacion:</strong>
                            {{denominacion}}
                        </li>
                        <h5 class="collection-item">Viaje</h5>
                        <li class="collection-item"><strong class="orange-text text-lighten-2">Origen:</strong>
                            {{viaje_origen}}
                        </li>
                        <li class="collection-item"><strong class="orange-text text-lighten-2">Destino:</strong>
                            {{viaje_destino}}
                        </li>
                        <li class="collection-item"><strong class="orange-text text-lighten-2">Fecha carga:</strong> {{viaje_fecha_carga}}
                        </li>
                        <li class="collection-item"><strong class="orange-text text-lighten-2">ETD:</strong>
                            {{viaje_etd}}
                        </li>
                        <li class="collection-item"><strong class="orange-text text-lighten-2">ETA:</strong>
                            {{viaje_eta}}
                        </li>
                        <h5 class="collection-item">Carga</h5>
                        <li class="collection-item"><strong class="orange-text text-lighten-2">Tipo carga:</strong>
                            {{carga_tipo}}
                        </li>
                        <li class="collection-item"><strong class="orange-text text-lighten-2">Peso neto:</strong>
                            {{carga_peso}}
                        </li>
                        <li class="collection-item"><strong class="orange-text text-lighten-2">Tipo hazard:</strong>
                            {{carga_tipo_hazard}}
                        </li>
                        <li class="collection-item"><strong class="orange-text text-lighten-2">Temperatura reefer:</strong>
                            {{carga_temperatura_reefer}}
                        </li>
                        <h5 class="collection-item">Costeo</h5>
                        <li class="collection-item"><strong class="orange-text text-lighten-2">Km estimados:</strong>
                            {{costeo_km_estimados}}
                        </li>
                        <li class="collection-item"><strong class="orange-text text-lighten-2">Combustible estimado litros:</strong>
                            {{costeo_combustible_estimado}}
                        </li>
                        <li class="collection-item"><strong class="orange-text text-lighten-2">Viaticos estimado:</strong>
                            {{costeo_viaticos_estimado}}
                        </li>
                        <li class="collection-item"><strong class="orange-text text-lighten-2">Peajes estimado:</strong>
                            {{costeo_peajes_estimado}}
                        </li>
                        <h5 class="collection-item">Personal</h5>
                        <li class="collection-item"><strong class="orange-text text-lighten-2">Chofer asignado:</strong>
                            {{nombre_completo}}
                        </li>
                        <li class="collection-item"><strong class="orange-text text-lighten-2">Tractor tipo:</strong>
                            {{patente_tractor}}
                        </li>
                        <li class="collection-item"><strong class="orange-text text-lighten-2">Arrastrado tipo:</strong>
                            {{patente_arrastrado}}
                        </li>
                        <h5 class="collection-item">Costos estimativo y real</h5>
                        <li class="collection-item"><strong class="orange-text text-lighten-2">Total Real:</strong>
                            {{costeo_total_real}}
                        </li>
                        <li class="collection-item"><strong class="orange-text text-lighten-2">Total Estimado:</strong>
                            {{costeo_total_estimado}}
                        </li>
                        <br>
                        <h5 class="collection-item">Carga Combustible</h5>
                        <li class="collection-item">
                            <table class="striped">
                                <thead>
                                <tr class="orange-text">
                                    <th>Litros</th>
                                    <th>Importe</th>
                                    <th>Latitud</th>
                                    <th>Longitud</th>
                                    <th>Mapa</th>
                                </tr>
                                </thead>
                                <tbody>
                                {{#historialCargaCombustible}}
                                <tr>
                                    <td>{{cantidad_litros}}</td>
                                    <td>{{importe}}</td>
                                    <td>{{latitud}}</td>
                                    <td>{{longitud}}</td>
                                    <td ><a style="cursor:pointer;color: #03e554" onclick="mostrarMapa({{latitud}},{{longitud}})"><span  class="material-icons">location_on</span></a></td>
                                </tr>
                                {{/historialCargaCombustible}}
                                </tbody>
                            </table>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<style>

    /* The Modal (background) */
    .modal-custom {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content-custom {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
    }

    /* The Close Button */
    .close-custom {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close-custom:hover,
    .close-custom:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }
</style>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css">
<script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js"></script>

<!-- The Modal -->
<div id="myModal" class="modal-custom">

    <!-- Modal content -->
    <div class="modal-content-custom">
        <span class="close-custom">&times;</span>
        <div id="weathermap" class="map map-home" style="margin:12px 0 12px 0;height:600px;"></div>
    </div>

</div>

<script defer>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close-custom")[0];

    // When the user clicks the button, open the modal
    const mostrarMapa = (latitud,longitud) =>{
        modal.style.display = "block";
        document.getElementById('weathermap').innerHTML = "<div id='map' style='width: 100%; height: 100%;'></div>";
        var osmUrl = 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
            osmAttribution = 'Map data © <a href="http://openstreetmap.org">OpenStreetMap</a> contributors,' +
                ' <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
            osmLayer = new L.TileLayer(osmUrl, {maxZoom: 18, attribution: osmAttribution});
        var map = new L.Map('map');
        map.setView(new L.LatLng(latitud,longitud), 10 );
        map.addLayer(osmLayer);

        fetch(`https://nominatim.openstreetmap.org/reverse?lat=${latitud}&lon=${longitud}&format=json`,{
            method:"POST"
        })
        .then(res => res.json())
        .then(data => {
            if(data.address.suburb != null && data.address.road != null){
                L.marker([latitud,longitud])
                    .addTo(map)
                    .bindPopup(`${data.address.suburb}, ${data.address.road}`)
                    .openPopup();
            }else{
                L.marker([latitud,longitud])
                    .addTo(map)
            }

        })
        .catch(e=>console.log(e))


    }

    span.onclick = function() {
        modal.style.display = "none";
    }
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

{{/mostrarDetalleDeProforma}}
{{> footer}}
