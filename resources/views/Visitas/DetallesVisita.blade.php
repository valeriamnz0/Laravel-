<!-- Modal Dellate Cita para Visita -->
<div id="ModalDetallesVisita" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header ">
                <h4 class="modal-title ">Detalles de la Cita</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" style="text-align:left">
                <div class="col-md-12">
                    <h4 class="modal-title alinear-centrado">Cita</h4>
                    <!--Parte para la cita-->
                    <br>
                    <br>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <div class="form-group col-xs-6">
                                    <label for="txtFechaHora" class="col-form-label">Fecha y Hora</label>
                                    <input type="text" class="form-control" id="txtFechaHora" disabled>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="form-group col-xs-6">
                                    <label for="txtUbicacion" class="col-form-label">Ubicación</label>
                                    <input type="text" class="form-control" id="txtUbicacion" disabled>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="form-group col-xs-6">
                                    <label for="txtEncargado" class="col-form-label">Vendedor</label>
                                    <input type="text" class="form-control" id="txtEncargado" disabled>
                                </div>
                            </div>
                        </div>
                        <br>
                        <h4 class="modal-title alinear-centrado">Cliente</h4>
                        <!--Parte para el Cliente-->
                        <br>
                        <br>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="txtnumCliente" class="col-form-label">Número de cliente</label>
                                <input type="text" class="form-control" id="txtnumCliente" disabled>
                            </div>
                            <div class="form-group col-md-8">
                                <label for="txtNombreCliente" class="col-form-label">Nombre del Cliente:</label>
                                <input type="text" class="form-control" id="txtNombreCliente" disabled>
                            </div>
                        </div>
                        <br />
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <div class="form-group col-xs-6">
                                    <label for="txtidentificacion" class="col-form-label">Identificación</label>
                                    <input type="text" class="form-control" id="txtidentificacion" disabled>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="txtTelefono" class="col-form-label">Teléfono del Cliente</label>
                                <input type="text" class="form-control" id="txtTelefono" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="txtCorreo" class="col-form-label">Correo del Cliente</label>
                                <input type="text" class="form-control" id="txtCorreo" disabled>
                            </div>
                        </div>
                        <br />
                        <h4>Domicilio</h4>
                        <br />
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="ddProvincia" class="col-form-label">Provincia</label>
                                <input type="text" id="ddProvincia" class="form-control" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="ddCanton" class="col-form-label">Cantón</label>
                                <input type="text" id="ddCanton" class="form-control" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="ddDistrito" class="col-form-label">Distrito</label>
                                <input type="text" id="ddDistrito" class="form-control" disabled>

                            </div>
                        </div>
                        <br />
                        <h4>Otras Señas</h4>
                        <br />
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <textarea class="form-control" rows="3" id="txtNotas" disabled></textarea>
                            </div>
                        </div>
                        <br />
                        <!--Fin de info del cliente-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
