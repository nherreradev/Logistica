{{> header}}

{{#verDetalleDeProformaConcretaAModificar}}

    <div class="row login">
    <div class="col s12 m6 offset-m3">
        <div class="card">
            <div class="card-action gray accent-4 orange-text">
                <h3>Corregir proforma</h3>
            </div>
            <form method="POST" action="/chofer/corregirProformaEnBD">
                <div class="card-action form-field">

                <br>

                <label>Nro proforma:</label>
                <input readonly="readonly" type="text" value="{{id_proforma}}" id="id_proforma" name="id_proforma"
                       class="white-text" required>

                <br>

                <label>Cliente:</label>
                <input readonly="readonly" type="text" value="{{denominacion}}" id="denominacion" name="denominacion"
                       class="white-text" required>


                <br>

                <label for="usuario">Chofer:</label>
                <input readonly="readonly" type="text" value="{{usuario}}" id="usuario" name="usuario"
                       class="white-text" required>

                <br><br><br>

                <label for="costeo_km_reales">Km reales:</label>
                <input type="number" value="{{costeo_km_reales}}" id="costeo_km_reales" name="costeo_km_reales"
                       class="white-text" required>


                <br>

                <label for="costeo_combustible_real">Combustible real:</label>
                <input type="number" readonly="readonly" value="{{costeo_combustible_real}}" id="costeo_combustible_real"
                       name="costeo_combustible_real" class="white-text" required>

                <br>

                <label for="fecha_partida_real">Fecha partida real:</label>
                <input type="date" value="{{fecha_partida_real}}" id="fecha_partida_real" name="fecha_partida_real"
                       class="white-text" required>

                <br>

                <label for="fecha_arribo_real">Fecha arribo real:</label>
                <input type="date" value="{{fecha_arribo_real}}" id="fecha_arribo_real" name="fecha_arribo_real"
                       class="white-text" required>

                <br>

                <label for="costeo_viaticos_real">Viaticos real:</label>
                <input type="number" value="{{costeo_viaticos_real}}" id="costeo_viaticos_real"
                       name="costeo_viaticos_real" class="white-text" required>

                <br>

                <label for="costeo_peajes_real">Peajes real:</label>
                <input type="number" value="{{costeo_peajes_real}}" id="costeo_peajes_real" name="costeo_peajes_real"
                       class="white-text" required>

                <br>

                <label for="costeo_pesajes_real">Pesajes real:</label>
                <input type="number" value="{{costeo_pesajes_real}}" id="costeo_pesajes_real" name="costeo_pesajes_real"
                       class="white-text" required>

                <br>

                <label for="costeo_extras_real">Extras real:</label>
                <input type="number" value="{{costeo_extras_real}}" id="costeo_extras_real" name="costeo_extras_real"
                       class="white-text" required>

                <br>

                <label for="costeo_hazard_real">Hazard real:</label>
                <input type="number" value="{{costeo_hazard_real}}" id="costeo_hazard_real" name="costeo_hazard_real"
                       class="white-text" required>

                <br>

                <label for="costeo_reefer_real">Reefer real:</label>
                <input type="number" value="{{costeo_reefer_real}}" id="costeo_reefer_real" name="costeo_reefer_real"
                       class="white-text" required>

                <br>

                <label for="costeo_fee_real">Fee real:</label>
                <input type="number" value="{{costeo_reefer_real}}" id="costeo_fee_real" name="costeo_fee_real"
                       class="white-text" required>


                <button type="submit" class="btn-large black accent-4">Modificar</button>
            </form>

        </div>
        <br>

    </div>
    </div>
</div>

{{/verDetalleDeProformaConcretaAModificar}}
{{> footer}}