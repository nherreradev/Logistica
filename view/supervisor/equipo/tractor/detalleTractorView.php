{{> header}}
{{#detalleTractor}}
<div class="container">
    <div class="row">
        <div class="col s12 m12">
            <div class="card black darken-1">
                <div class="card-content white-text">
                    <ul class="collection with-header">
                        <li class="collection-header"><strong class="orange-text text-lighten-2">
                                <h4>Tractor:
                            </strong> {{marca}}</h4>
                        </li>
                        <li class="collection-item"><strong class="orange-text text-lighten-2">Modelo:</strong>
                            {{modelo}}
                        </li>
                        <li class="collection-item"><strong class="orange-text text-lighten-2">Patente:</strong>
                            {{patente_tractor}}
                        </li>
                        <li class="collection-item"><strong class="orange-text text-lighten-2">Año de
                                fabricacion:</strong> {{año_fabricacion}}
                        </li>
                        <li class="collection-item"><strong class="orange-text text-lighten-2">Numero de
                                motor:</strong> {{nro_motor}}
                        </li>
                        <li class="collection-item"><strong class="orange-text text-lighten-2">Numero de
                                chasis:</strong> {{nro_chasis}}
                        </li>
                        <li class="collection-item"><strong
                                class="orange-text text-lighten-2">Kilometraje:</strong>
                            {{kilometraje}}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
{{/detalleTractor}}
{{> footer}}