{{#mostrarDetalleDeProforma}}
{{> pdf}}


                        <h1 class="collection-item">Resumen</h1>

                        <table>
                            <thead>
                            <tr>
                                <th data-field="id">Proforma Numero</th>
                                <th data-field="name">Fecha</th>
                                <th data-field="price">Cliente</th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <td>{{id_proforma}}</td>
                                <td>{{fecha}}</td>
                                <td>{{denominacion}}</td>
                            </tr>

                            </tbody>
                        </table>


                        <h2 class="collection-item">Viaje</h2>

                        <table>
                            <thead>
                            <tr>
                                <th data-field="id">Origen</th>
                                <th data-field="name">Destino</th>
                                <th data-field="price">Fecha carga</th>
                                <th data-field="price">ETD</th>
                                <th data-field="price">ETA</th>

                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <td>{{viaje_origen}}</td>
                                <td>{{viaje_destino}}</td>
                                <td>{{viaje_fecha_carga}}</td>
                                <td>{{viaje_ETD}}</td>
                                <td>{{viaje_ETA}}</td>

                            </tr>

                            </tbody>
                        </table>


                        <h2 class="collection-item">Carga</h2>

                        <table>
                            <thead>
                            <tr>
                                <th data-field="id">Tipo carga</th>
                                <th data-field="name">Peso neto</th>
                                <th data-field="price">Tipo hazard</th>
                                <th data-field="price">Temperatura reefer</th>


                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <td>{{carga_tipo}}</td>
                                <td>{{carga_peso}}</td>
                                <td>{{carga_tipo_hazard}}</td>
                                <td>{{carga_temperatura_reefer}}</td>


                            </tr>

                            </tbody>
                        </table>


                        <h2 class="collection-item">Costeo</h2>


                        <table>
                            <thead>
                            <tr>
                                <th data-field="id">Km estimados</th>
                                <th data-field="name">Combustible estimado litros</th>
                                <th data-field="price">Viaticos estimado</th>
                                <th data-field="price">Peajes estimado</th>
                                <th data-field="price">Pesajes estimado</th>


                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <td>{{costeo_km_estimados}}</td>
                                <td>{{costeo_combustible_estimado}}</td>
                                <td>{{costeo_viaticos_estimado}}</td>
                                <td>{{costeo_peajes_estimado}}</td>
                                <td>{{costeo_pesajes_estimado}}</td>


                            </tr>

                            </tbody>
                        </table>



                        <h2 class="collection-item">Personal</h2>

                        <table>
                            <thead>
                            <tr>
                                <th data-field="id">Chofer asignado</th>
                                <th data-field="name">Tractor</th>
                                <th data-field="price">Arrastrado</th>



                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <td>{{nombre_completo}}</td>
                                <td>{{patente_tractor}}</td>
                                <td>{{patente_arrastrado}}</td>



                            </tr>

                            </tbody>
                        </table>

                        <h2 class="collection-item">Cargas de combustible</h2>

                        <table>
                            <thead>
                            <tr>
                                <th>Litros</th>
                                <th>Importe</th>
                                <th>Latitud</th>
                                <th>Longitud</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{#historialCargaCombustible}}
                            <tr>
                                <td>{{cantidad_litros}}</td>
                                <td>{{importe}}</td>
                                <td>{{latitud}}</td>
                                <td>{{longitud}}</td>
                            </tr>
                            {{/historialCargaCombustible}}
                            </tbody>
                        </table>

<br><br>



<table>
    <thead>
    <tr>
        <th data-field="id">QR</th>

    </tr>
    </thead>

    <tbody>
    <tr>
        {{#codigoQR}}
        <td>  <img src='{{codigoQR}}'/>  </td>
        {{/codigoQR}}
    </tr>

    </tbody>
</table>

{{/mostrarDetalleDeProforma}}