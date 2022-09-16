<!-- Modal Editar Articulo -->
<div id="ModalFormularioEdit{{$articulos->articuloID }}" class="modal fade " role="dialog">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header ">
                <h4 class="modal-title ">Editar Artículo</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body " style="text-align:left"> 
                <div class="col-md-12">
                    <form action="/articulo/{{$articulos->articuloID}}" method="post">
                        @csrf
                         @method('PUT')
                        <h4>Actualizar Información del Artículo</h4>
                        <br />
                        @include('Articulo.FormularioArticulos')
                   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <!--button type="button" class="btn btn-primary">Save changes</button-->
                    <div style="text-align: center;">
                        <button type="submit" id="btnActualizar" class="btn btn-group btn-primo">Actualizar
                            Artículo</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>