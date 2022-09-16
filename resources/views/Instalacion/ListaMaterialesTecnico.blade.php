<!-- Modal Lista de Materialess -->
<div id="ModalMateriales" class="modal fade " role="dialog">
    <div class="modal-dialog modal-xl modal-dialog-centered">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header ">
                <h4 class="modal-title ">Lista de Materiales</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body ">
                <div class="col-md-12">
                    <table class="table table-centered table-striped table-hover mb-0 alinear-centrado"
                        id="tbListaMateriales">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Artículo</th>                                
                                <th>Cantidad</th>
                                <th>Proveedor</th>
                                <th>Marca</th>
                            </tr>
                        </thead>

                        <tbody>
                            <!--Esto se llena con la funcion de JS: traerlistaMateriales -->
                        </tbody>
                    </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <!--button type="button" class="btn btn-primary">Save changes</button-->

                </div>
            </div>

        </div>
    </div>
</div>