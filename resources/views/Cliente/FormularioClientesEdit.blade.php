<!-- Modal Editar -->
<div id="ModalFormularioEdit" class="modal fade "
     role="dialog">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header ">
                <h4 class="modal-title ">Editar Cliente</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body ">
                <form id="form_client" method="POST">
                    <div class="col-md-12">
                        @csrf
                        @method('PUT')
                        <h4>Actualizar Información del Cliente</h4>
                        <br/>
                        @include('Cliente.FormularioClientes')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <!--button type="button" class="btn btn-primary">Save changes</button-->
                        <div style="text-align: center;">
                            <button type="submit" id="btnActualizar" class="btn btn-group btn-primo">Actualizar
                                Cliente
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
