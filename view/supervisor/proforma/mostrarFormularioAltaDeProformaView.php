{{> header}}

<div class="row login">
    <div class="col s12 m6 offset-m3">
        <div class="card">
            <div class="card-action gray accent-4 orange-text">
                <h3>Cargar Proforma</h3>
            </div>
            <form method="POST" action="/proforma/procesarProforma">
                <div class="card-content">
                <div class="form-field">
                    <label for="fecha">Fecha:</label>
                    <input type="date" id="fecha" name="fecha" class="white-text" required>

                    <br><br>
                    <h5>Cliente</h5>

                    <br>
                    <label for="id_cliente">Denominacion:</label>
                    <select id="id_cliente" name="id_cliente">
                        <option value="" selected disabled>Seleccione un cliente</option>
                        {{#cargarSelectCliente}}
                        <option value="{{id_cliente}}">{{denominacion}}</option>
                        {{/cargarSelectCliente}}

                    </select>
                    <br>

                    <h5>Viaje</h5>

                    <br>

                    <label for="origen">Origen:</label>
                    <input type="text" id="origen" name="origen" class="white-text" required>

                    <br>

                    <label for="destino">Destino:</label>
                    <input type="text" id="destino" name="destino" class="white-text" required>

                    <br>

                    <label for="fecha_carga">Fecha carga:</label>
                    <input type="date" id="fecha_carga" name="fecha_carga" class="white-text" required>

                    <br>

                    <label for="ETD">ETD:</label>
                    <input type="date" id="ETD" name="ETD" class="white-text" required>

                    <br>

                    <label for="ETA">ETA:</label>
                    <input type="date" id="ETA" name="ETA" class="white-text" required>

                    <br><br>

                    <h5>Carga</h5>

                    <br>

                    <label for="tipo_carga">Tipo carga:</label>
                    <select id="tipo_carga" name="tipo_carga">
                        <option value="" disabled selected>Seleccione un tipo de carga</option>
                        <option value="granel">Granel</option>
                        <option value="liquida">Liquida</option>
                    </select>

                    <br>

                    <label for="peso_neto">Peso neto:</label>
                    <input type="number" id="peso_neto" name="peso_neto" class="white-text" required>

                    <br>

                    <label for="tipo_hazard">Tipo hazard:</label>
                    <select id="tipo_hazard" name="tipo_hazard">
                        <option value="" disabled selected>Seleccione un tipo de hazard</option>
                        <option value="class">Class</option>
                        <option value="Sclass">Sclass</option>
                    </select>

                    <br>

                    <label for="temperatura_reefer">Temperatura reefer:</label>
                    <input type="text" id="temperatura_reefer" name="temperatura_reefer" class="white-text" required>

                    <br><br>

                    <h5>Costeo</h5>

                    <br>

                    <label for="km_estimado">Km estimados:</label>
                    <input type="number" id="km_estimado" name="km_estimado" class="white-text" required>

                    <br>

                    <label for="combustible_estimado">Combustible estimado litros:</label>
                    <input type="number" id="combustible_estimado" name="combustible_estimado" class="white-text" required>


                    <br>

                    <label for="viaticos_estimado">Viaticos estimado:</label>
                    <input type="number" id="viaticos_estimado" name="viaticos_estimado" class="white-text" required>

                    <br>

                    <label for="peajes_estimado">Peajes estimado:</label>
                    <input type="number" id="peajes_estimado" name="peajes_estimado" class="white-text" required>

                    <br>

                    <label for="pesajes_estimado">Pesajes estimado:</label>
                    <input type="number" id="pesajes_estimado" name="pesajes_estimado" class="white-text" required>

                    <br>

                    <label for="extras_estimado">Extras:</label>
                    <input type="number" id="extras_estimado" name="extras_estimado" class="white-text" required>

                    <br>

                    <label for="hazard_estimado">Hazard estimado:</label>
                    <input type="number" id="hazard_estimado" name="hazard_estimado" class="white-text" required>

                    <br>

                    <label for="reefer_estimado">Reefer estimado:</label>
                    <input type="number" id="reefer_estimado" name="reefer_estimado" class="white-text" required>

                    <br>

                    <label for="fee_estimado">Fee estimado:</label>
                    <input type="number" id="fee_estimado" name="fee_estimado" class="white-text" required>

                    <br><br>

                    <h5>Personal</h5>
                    <br>
                    <label for="chofer_asignado">Chofer asignado:</label>
                    <select id="chofer_asignado" name="chofer_asignado">
                        <option value="" disabled selected>Seleccione un Chofer</option>
                        {{#cargarSelectChofer}}
                        <option value="{{usuario}}">{{nombre_completo}}</option>
                        {{/cargarSelectChofer}}
                    </select>
                    <br>
                    <label for="id_tractor">Tractor tipo:</label>
                    <select id="id_tractor" name="id_tractor">
                        <option value="" disabled selected>Seleccione un tractor</option>
                        {{#cargarSelectTractor}}
                        <option value="{{id_tractor}}">{{patente_tractor}}</option>
                        {{/cargarSelectTractor}}
                    </select>
                    <br>
                    <label for="id_arrastrado">Arrastrado tipo:</label>
                    <select id="id_arrastrado" name="id_arrastrado">
                        <option value="" disabled selected>Seleccione un arrastrado</option>
                        {{#cargarSelectArrastrado}}
                        <option value="{{id_arrastrado}}">{{patente_arrastrado}}</option>
                        {{/cargarSelectArrastrado}}
                    </select>
                    <br>
                    </div><br>

                    <div class="form-field center-align">
                    <button type="submit" class="btn-large black accent-4 ">Enviar</button>
                    </div>
            </form>
            </div>

        </div>
        <br>


    </div>
</div>


{{> footer}}