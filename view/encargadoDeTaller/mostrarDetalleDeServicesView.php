{{> header}}
{{#verDetalleDeServices}}
<div class="container">
    <div class="row">
        <div class="col s12 m12">
            <div class="card black darken-1">
                <div class="card-content white-text">
                    <ul class="collection with-header">
                        <li class="collection-header"><strong class="orange-text text-lighten-2">
                                <h4>Service:
                            </strong> {{id_service}}</h4>
                        </li>
                        <li class="collection-item"><strong class="orange-text text-lighten-2">costo:</strong> {{costo}}
                        </li>
                        <li class="collection-item"><strong class="orange-text text-lighten-2">descripcion:</strong>
                            {{descripcion}}
                        </li>
                        <li class="collection-item"><strong class="orange-text text-lighten-2">Fecha:</strong>
                            {{fecha}}
                        </li>
                        <li class="collection-item"><strong class="orange-text text-lighten-2">Repuesto Utilizado:</strong>
                            {{repuesto_utilizado}}
                        </li>
                        <li class="collection-item"><strong class="orange-text text-lighten-2">Tractor:</strong> {{patente_tractor}}
                        </li>
                        <li class="collection-item"><strong class="orange-text text-lighten-2">Mecanico:</strong>
                            {{nombre}}
                        </li>
                        <li class="collection-item"><strong class="orange-text text-lighten-2">Km de unidad:</strong>
                            {{km_unidad}}
                        </li>
                        <li class="collection-item"><strong class="orange-text text-lighten-2">Tipo de service:</strong>
                            {{tipo_service}}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
{{/verDetalleDeServices}}
{{> footer}}