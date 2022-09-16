<!-- Modal Cita Existente -->
<div id="ModalConfirmar{{$agenda->agendaInstalacionID}}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xl modal-dialog-centered">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4>¿Se realizó instalación?</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="/updateProyecto/{{$agenda->proyectoID}}" post="post">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <!--Tabla de articulos-->
                    <br />
                    <div class="form-row alinear-centrado">

                        <div class="form-group col-md-6">
                            <div class="custom-control custom-radio ">
                                <input type="radio" id="completado{{$agenda->agendaInstalacionID}}" name="completado" class="custom-control-input" value='1' {{ ($agenda->completada=="1")? "checked" : "" }}>
                                <label class="custom-control-label" for="completado{{$agenda->agendaInstalacionID}}">Si</label>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="comple{{$agenda->agendaInstalacionID}}" name="completado" class="custom-control-input" value='0' {{ ($agenda->completada=="0")? "checked" : "" }}>
                                <label class="custom-control-label" for="comple{{$agenda->agendaInstalacionID}}">No</label>
                            </div>
                        </div>
                    </div>
                    <br />
                    <h4>Comentarios</h4>
                    <br />
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <textarea name="txtNotas1" id="txtNotas1" class='form-control' rows='5'>{{$agenda->comentarios}}</textarea>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primo" >Guardar</button>

                </div>
            </form>
        </div>

    </div>
</div>