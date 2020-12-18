{{> header}}
{{#mostrarDatosDeProformaAModificar}}
<div class="row login">
    <div class="col s12 m6 offset-m3">
        <div class="card">
            <div class="card-action gray accent-4 orange-text">
    <h3>Modificacion Proforma</h3>
</div>
<form method="POST" action="/proforma/modificarProforma">
    <div class="card-action form-field">
        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha" class="white-text" value="{{fecha}}">
        <br><br>
        <h5>Cliente</h5>
        <br>
        <label for="id_cliente">Denominacion:</label>
        <select id="id_cliente" name="id_cliente">
            <option value="{{id_cliente}}" selected>{{denominacion}}</option>
            {{#cargarSelectCliente}}
            <option value="{{id_cliente}}">{{denominacion}}</option>
            {{/cargarSelectCliente}}
        </select>
        <br>
        <h5>Viaje</h5>
        <br>
        <label for="origen">Origen:</label>
        <input type="text" id="origen" name="origen" class="white-text" value="{{viaje_origen}}">
        <br>
        <label for="destino">Destino:</label>
        <input type="text" id="destino" name="destino" class="white-text" value="{{viaje_destino}}">
        <br>
        <label for="fecha_carga">Fecha carga:</label>
        <input type="date" id="fecha_carga" name="fecha_carga" class="white-text" value="{{viaje_fecha_carga}}">
        <br>
        <label for="ETD">ETD:</label>
        <input type="date" id="ETD" name="ETD" class="white-text" value="{{viaje_ETD}}" required>
        <br>
        <label for="ETA">ETA:</label>
        <input type="date" id="ETA" name="ETA" class="white-text" value="{{viaje_ETA}}">
        <br><br>
        <h5>Carga</h5>
        <br>
        <label for="carga_tipo">Tipo carga:</label>
        <select id="carga_tipo" name="carga_tipo">
            <option value="{{carga_tipo}}" selected>{{carga_tipo}}</option>
            <option value="granel">Granel</option>
            <option value="liquida">Liquida</option>
        </select>
        <br>
        <label for="peso_neto">Peso neto:</label>
        <input type="number" id="peso_neto" name="peso_neto" class="white-text"
               value="{{carga_peso}}">
        <br>
        <label for="tipo_hazard">Tipo hazard:</label>
        <select id="tipo_hazard" name="tipo_hazard">
            <option value="{{carga_tipo_hazard}}" selected>{{carga_tipo_hazard}}</option>
            <option value="class">Class</option>
            <option value="Sclass">Sclass</option>
        </select>
        <br>
        <label for="temperatura_reefer">Temperatura reefer:</label>
        <input type="text" id="temperatura_reefer" name="temperatura_reefer" class="white-text"
               value="{{carga_temperatura_reefer}}">
        <br><br>
        <h5>Costeo</h5>
        <br>
        <label for="km_estimado">Km estimados:</label>
        <input type="number" id="km_estimado" name="km_estimado" class="white-text"
               value="{{costeo_km_estimados}}">
        <br>
        <label for="combustible_estimado">Combustible estimado litros:</label>
        <input type="number" id="combustible_estimado" name="combustible_estimado"
               class="white-text" value="{{costeo_combustible_estimado}}">
        <br>
        <label for="viaticos_estimado">Viaticos estimado:</label>
        <input type="number" id="viaticos_estimado" name="viaticos_estimado" class="white-text"
               value="{{costeo_viaticos_estimado}}" required>
        <br>
        <label for="peajes_estimado">Peajes estimado:</label>
        <input type="number" id="peajes_estimado" name="peajes_estimado" class="white-text"
               value="{{costeo_peajes_estimado}}" required>
        <br>
        <label for="pesajes_estimado">Pesajes estimado:</label>
        <input type="number" id="pesajes_estimado" name="pesajes_estimado" class="white-text"
               value="{{costeo_pesajes_estimado}}" required>
        <br>
        <label for="extras_estimado">Extras:</label>
        <input type="number" id="extras_estimado" name="extras_estimado" class="white-text"
               value="{{costeo_extras_estimado}}" required>
        <br>
        <label for="hazard_estimado">Hazard estimado:</label>
        <input type="number" id="hazard_estimado" name="hazard_estimado" class="white-text"
               value="{{costeo_hazard_estimado}}" required>
        <br>
        <label for="reefer_estimado">Reefer estimado:</label>
        <input type="number" id="reefer_estimado" name="reefer_estimado" class="white-text"
               value="{{costeo_reefer_estimado}}" required>
        <br>
        <label for="fee_estimado">Fee estimado:</label>
        <input type="number" id="fee_estimado" name="fee_estimado" class="white-text"
               value="{{costeo_fee_estimado}}" required>
        <br><br>
        <h5>Personal</h5>
        <br>
        <label for="chofer_asignado">Chofer asignado:</label>
        <select id="chofer_asignado" name="chofer_asignado">
            <option value="{{usuario}}" selected>{{nombre_completo}}</option>
            {{#cargarSelectChofer}}
            <option value="{{usuario}}">{{nombre_completo}}</option>
            {{/cargarSelectChofer}}
        </select>
        <br>
        <label for="id_tractor">Tractor tipo:</label>
        <select id="id_tractor" name="id_tractor" required>
            <option value="{{id_tractor}}" selected>{{patente_tractor}}</option>
            {{#cargarSelectTractor}}
            <option value="{{id_tractor}}">{{patente_tractor}}</option>
            {{/cargarSelectTractor}}
        </select>
        <br>
        <label for="id_arrastrado">Arrastrado tipo:</label>
        <select id="id_arrastrado" name="id_arrastrado">
            <option value="{{id_arrastrado}}" selected>{{patente_arrastrado}}</option>
            {{#cargarSelectArrastrado}}
            <option value="{{id_arrastrado}}">{{patente_arrastrado}}</option>
            {{/cargarSelectArrastrado}}
        </select>
        <br>
    </div>
    <br>
    <input type="hidden" value="{{id_proforma}}" name="id_proforma">
    <div class="center-align">
    <button type="submit" class="btn-large black accent-4">Enviar</button>
    </div>
    <br>
</form>
        </div>
        <br>
    </div>
</div>
{{/mostrarDatosDeProformaAModificar}}
{{> footer}}