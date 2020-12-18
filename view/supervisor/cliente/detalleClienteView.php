{{> header}}
{{#detalleCliente}}
<div class="container">
    <div class="row">
        <div class="col s12 m12">
            <div class="card black darken-1">
                <div class="card-content white-text">
                    <ul class="collection with-header">
                        <li class="collection-header"><strong class="orange-text text-lighten-2">
                                <h4>Denominacion:
                            </strong> {{denominacion}}</h4>
                        </li>
                        <li class="collection-item"><strong class="orange-text text-lighten-2">Email:</strong> {{email}}
                        </li>
                        <li class="collection-item"><strong class="orange-text text-lighten-2">Telefono:</strong>
                            {{telefono}}
                        </li>
                        <li class="collection-item"><strong class="orange-text text-lighten-2">Contacto 1:</strong>
                            {{contacto1}}
                        </li>
                        <li class="collection-item"><strong class="orange-text text-lighten-2">Contacto 2:</strong>
                            {{contacto2}}
                        </li>
                        <li class="collection-item"><strong class="orange-text text-lighten-2">Cuit:</strong> {{cuit}}
                        </li>
                        <li class="collection-item"><strong class="orange-text text-lighten-2">Calle:</strong>
                            {{direccion_calle}}
                        </li>
                        <li class="collection-item"><strong class="orange-text text-lighten-2">Nro:</strong>
                            {{direccion_nro}}
                        </li>
                        <li class="collection-item"><strong class="orange-text text-lighten-2">Codigo postal:</strong>
                            {{direccion_cp}}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
{{/detalleCliente}}
{{> footer}}
