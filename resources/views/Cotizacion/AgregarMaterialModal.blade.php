<!-- Modal Agregar Materiales -->
<div id="ModalAgregarMateriales" class="modal fade " role="dialog">
    <div class="modal-dialog modal-xl modal-dialog-centered">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header ">
                <h4 class="modal-title ">Agregar Materiales</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body ">
                <div class="form-group row">
                    <div class="table-responsive ">
                        <table class="table table-centered table-striped table-hover mb-0 alinear-centrado"
                            id="tbAgregarMaterial">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Proveedor</th>
                                    <th>Marca</th>
                                    <th>Costo ($)</th>
                                    <th>Unidad de medida</th>
                                    <th>Tipo</th>
                                </tr>
                            </thead>

                            <tbody>
                                    @isset($materiales)
                                        @foreach ($articulos as $articulo )
                                        <tr id="{{$articulo->articuloID}}">
                                            @php
                                                $existe = false;
                                                foreach ($materiales as $material) {
                                                    if($material->articuloID == $articulo->articuloID){
                                                        $existe = true;
                                                    }
                                                }
                                            @endphp
                                            @if ($existe)
                                            <td><input type="checkbox" id="rdMaterial" name="material"
                                                onclick="pasaArticulos(this)" class="form-check-input" checked></td>
                                            @else
                                            <td><input type="checkbox" id="rdMaterial" name="material"
                                                onclick="pasaArticulos(this)" class="form-check-input"></td>
                                            @endif
                                            <td>{{ $articulo->codigo}}</td>
                                            <td>{{ $articulo->nombre}}</td>
                                            <td>{{ $articulo->proveedor}}</td>
                                            <td>{{ $articulo->marca}}</td>
                                            <td>{{ $articulo->costo}}</td>
                                            <td>{{ $articulo->unidadMedida}}</td>
                                            <td>{{ $articulo->descripcion}}</td>
                                        </tr>
                                        @endforeach
                                    @else
                                        @foreach ($articulos as $articulo )
                                        <tr id="{{$articulo->articuloID}}">
                                            <td><input type="checkbox" id="rdMaterial" name="material"
                                                onclick="pasaArticulos(this)" class="form-check-input"></td>
                                            <td>{{ $articulo->codigo}}</td>
                                            <td>{{ $articulo->nombre}}</td>
                                            <td>{{ $articulo->proveedor}}</td>
                                            <td>{{ $articulo->marca}}</td>
                                            <td>{{ $articulo->costo}}</td>
                                            <td>{{ $articulo->unidadMedida}}</td>
                                            <td>{{ $articulo->descripcion}}</td>
                                        </tr>
                                        @endforeach
                                    @endisset
                                </fieldset>
                            </tbody>
                        </table>
                        <br>
                    </div> <!-- end .table-responsive-->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>

    </div>
</div>
</div>