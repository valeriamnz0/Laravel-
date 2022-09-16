<!--Tabla de Visitas-->
<div class="card-box">
    <div class="form-row">
        <div class="form-group col-md-10">
            <h4>Lista de Citas de Instalación</h4>
        </div>
        <div class="form-group col-md-2">
            <!--button class="btn btn-group-middle btn-primo">Agregar Usuario
                <i class="fas fa-user-plus fa-lg" href="#AgregarUsuarios"></i>
            </button-->
        </div>
    </div>
    <br/>
    <div class="form-group row">
        <div class="table-responsive">
            <table class="table table-centered table-striped table-hover mb-0 alinear-centrado" id="tbInstalacion">
                <thead>
                <tr>
                    <th>Nombre Cliente</th>
                    <th>Fecha <br><i style='text-decoration:underline'>(dd/mm/yyyy hh:mm)</i></th>
                    <th>Ubicación</th>
                    <th>Técnico</th>
                    <th>Acciones</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($agendas as $agenda )
                    <tr>
                        <td>{{ $agenda->name}}</td>
                        <td>{{ date('d/m/Y H:i',strtotime($agenda->fechaHora))}}</td>
                        <td>{{ $agenda->ubicacion}}</td>
                        <td>{{ $agenda->nombreTec}}</td>

                        <td>
                            <button class="btn btn-group-middle btn-editar"><i class="fas fa-pencil-alt" onclick="clickEdit({{$agenda->agendaInstalacionID}})"></i></button>
                            <button class="btn btn-group-middle btn-primo"
                                    onclick="showInfo({{$agenda->agendaInstalacionID}})"><i
                                    class="fas fa-info-circle"></i></button>
                        </td>

                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

@include('Instalacion.DetallesInstalacion')
@include('Instalacion.EditInstalacion',['aux'=>'edit_'])
