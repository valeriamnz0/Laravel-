<div class="card-box">
    <h4>Lista de Artículos</h4>
    <br />
    <div class="form-group row">
        <div class="table-responsive ">
            <table class="table table-centered table-striped table-hover mb-0 alinear-centrado" id="tbArticulos">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Proveedor</th>
                        <th>Marca</th>
                        <th>Costo ($)</th>
                        <th>Unidad de medida</th>
                        <th>Tipo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articulos as $articulo )
                    <tr>
                        <td>{{ $articulo->codigo}}</td>
                        <td>{{ $articulo->nombre}}</td>
                        <td>{{ $articulo->proveedor}}</td>
                        <td>{{ $articulo->marca}}</td>
                        <td>{{ $articulo->costo}}</td>
                        <td>{{ $articulo->unidadMedida}}</td>
                        <td>{{ $articulo->descripcion}}</td>
                        <td>
                            <button data-toggle="modal" data-target="#ModalFormularioEdit{{ $articulo->articuloID}}"
                            class="btn btn-group-middle btn-editar"><i class="fas fa-pencil-alt"></i></button>
                            @include('Articulo.FormularioArticulosEdit', ['articulos'=>$articulo])
                        </td>
                    </tr>
                    @endforeach



                </tbody>
            </table>
            <br>
        </div> <!-- end .table-responsive-->
    </div>
</div>