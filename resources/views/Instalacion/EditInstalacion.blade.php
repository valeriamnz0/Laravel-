<!-- Modal Editar -->
<div id="ModalFormularioInstalacionEdit" class="modal fade " role="dialog">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header ">
                <h4 class="modal-title ">Editar Visitas</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="/cita/" id="update_instalation" method="POST">
                @method('PUT')
                <div class="modal-body ">
                    @include('Instalacion.Formulario')
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <!--button type="button" class="btn btn-primary">Save changes</button-->
                        <div style="text-align: center;">
                            <button type="button" onclick="deleteAppointment()" class="btn btn-group btn-eliminar">
                                Eliminar Cita de Instalación
                            </button>
                        </div>
                        <div style="text-align: center;">
                            <button type="submit" id="btnActualizar" class="btn btn-group btn-primo">Actualizar Cita de Instalación
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<form id="delete_instalation" method="POST">
    @method('DELETE')
    @csrf
</form>
