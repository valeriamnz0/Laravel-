<!-- Modal Lista de Clientes -->
<div id="ModalListaClientes" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xl modal-dialog-centered">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Seleccione el cliente</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <h4>Lista de Clientes</h4>
                <br />
                <div class="form-group row">
                    <div class="table-responsive">
                        <!--Inicio Tabla de Clientes-->
                        <table class="table table-centered table-striped table-hover mb-0 alinear-centrado"
                            id="tbClientesFiltro">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Número de Cliente</th>
                                    <th>Nombre</th>
                                    <th>Identificación</th>
                                    <th>Teléfono</th>
                                    <th>Correo</th>
                                    <th>Provincia</th>
                                    <th>Cantón</th>
                                    <th>Distrito</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td><input type="radio" id="cita" name="cita"></td>
                                    <td>{{$user->userID}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->identificacion}}</td>
                                    <td>{{$user->telefono}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->provincia}}</td>
                                    <td>{{$user->canton}}</td>
                                    <td>{{$user->distrito}}</td>
                                </tr>
                                @endforeach
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
