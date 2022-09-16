@extends('layouts.app')

@section('title')
<h4 class="page-title-main">Usuarios</h4>
@endsection

@section('content')
<div class="row justify-content-center color-fondo">
    <div class="col-md-12">
        <form action="{{ route('users.store') }}" method="POST" novalidate>
            @csrf
            <!-- Form row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">

                        <h4 id="AgregarUsuarios">Información del Usuario</h4>
                        <br />
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <div class="form-group col-xs-6">
                                    <label for="txtNombre" class="col-form-label" autocomplete="off">Nombre</label>
                                    <input type="text" class="form-control @error('txtNombre') is-invalid @enderror"
                                        value="{{old('txtNombre')}}" id="txtNombre" name="txtNombre"
                                        placeholder="Nombre del Usuario">
                                </div>
                                @error('txtNombre')
                                <span class="invalid-feedback d-block" role="alert"><strong>{{ $message
                                        }}</strong></span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <div class="form-group col-xs-6">
                                    <label for="txtApellido1" class="col-form-label">Primer Apellido</label>
                                    <input type="text" class="form-control @error('txtApellido1') is-invalid @enderror"
                                        value="{{old('txtApellido1')}}" id="txtApellido1" name="txtApellido1"
                                        placeholder="Primer Apellido">
                                </div>
                                @error('txtApellido1')
                                <span class="invalid-feedback d-block" role="alert"><strong>{{ $message
                                        }}</strong></span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="txtApellido2" class="col-form-label">Segundo Apellido</label>
                                <input type="text" class="form-control @error('txtApellido2') is-invalid @enderror"
                                    value="{{old('txtApellido2')}}" id="txtApellido2" name="txtApellido2"
                                    placeholder="Segundo Apellido">
                                @error('txtApellido2')
                                <span class="invalid-feedback d-block" role="alert"><strong>{{ $message
                                        }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <br />
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="txtCorreo" class="col-form-label">Correo del Usuario</label>
                                <input type="text" class="form-control @error('txtCorreo') is-invalid @enderror"
                                    value="{{old('txtCorreo')}}" id="txtCorreo" name="txtCorreo"
                                    placeholder="correo@electronico.com">
                                @error('txtCorreo')
                                <span class="invalid-feedback d-block" role="alert"><strong>{{ $message
                                        }}</strong></span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="rol" class="col-form-label">Rol</label>
                                <select id="rol" name="rol" class="form-control @error('rol') is-invalid @enderror">
                                    <option>Elegir</option>
                                    @foreach($roles as $rol)
                                    <option value="{{$rol->rolID}}" @if(old('rol')==$rol->rolID) selected
                                        @endif>{{$rol->descripcion}}</option>
                                    @endforeach
                                </select>
                                @error('rol')
                                <span class="invalid-feedback d-block" role="alert"><strong>{{ $message
                                        }}</strong></span>
                                @enderror
                            </div>
                            {{-- <div class="form-group col-md-4">
                                <label for="txtCorreo" class="col-form-label">Contraseña</label>
                                <input type="text" class="form-control" id="txtCorreo" value="" readonly>
                            </div> --}}
                        </div>
                        <br />
                        <div style="text-align: center;">
                            <button type="submit" class="btn btn-group btn-primo">Guardar Usuario</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--Fin de info del usuario-->

            <!--Tabla de usuarios-->

            <div class="card-box">
                <h4>Lista de Usuarios</h4>
                <br />
                <div class="form-group row">
                    <div class="table-responsive">
                        <table class="table table-centered table-striped table-hover mb-0 alinear-centrado"
                            id="tbUsuarios">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Correo Electrónico</th>
                                    <th>Rol</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($usuarios as $usuario)
                                <tr>
                                    <td>{{$usuario->name}}</td>
                                    <td>{{$usuario->email}}</td>
                                    <td>{{$usuario->descripcion}}</td>
                                    <td>
                                        <button type="button" class="btn btn-group-middle btn-editar"
                                            data-toggle="modal"
                                            data-target="#ModalFormularioEdit{{ $usuario->userID}}"><i
                                                class="fas fa-pencil-alt"></i></button>
                                        <button class="btn btn-group-middle btn-eliminar"><i
                                                class="dripicons-trash"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <br>
                    </div> <!-- end .table-responsive-->
                </div>
            </div>
    </div>
    </form>
</div>

@foreach($usuarios as $usuario)
<div id="ModalFormularioEdit{{$usuario->userID }}" class="modal fade " role="dialog">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header ">
                <h4 class="modal-title ">Editar Usuario</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body ">
                <form action="{{route('users.update', ['userID' => $usuario->userID])}}" method="post">
                    @csrf
                    @method('PUT')

                    <h4>Información del Usuario</h4>
                    <br />
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <div class="form-group col-xs-6">
                                <label for="txtNombreEditar" class="col-form-label" autocomplete="off">Nombre</label>
                                <input type="text" class="form-control @error('txtNombreEditar') is-invalid @enderror"
                                    value="{{old('txtNombreEditar', $usuario->name)}}" id="txtNombreEditar" name="txtNombreEditar"
                                    placeholder="Nombre del Usuario">
                            </div>
                            @error('txtNombreEditar')
                            <span class="invalid-feedback d-block" role="alert"><strong>{{ $message
                                    }}</strong></span>
                            @enderror
                        </div>
                        {{-- <div class="form-group col-md-4">
                            <div class="form-group col-xs-6">
                                <label for="txtApellido1" class="col-form-label">Primer Apellido</label>
                                <input type="text" class="form-control @error('txtApellido1') is-invalid @enderror"
                                    value="{{old('txtApellido1')}}" id="txtApellido1" name="txtApellido1"
                                    placeholder="Primer Apellido">
                            </div>
                            @error('txtApellido1')
                            <span class="invalid-feedback d-block" role="alert"><strong>{{ $message
                                    }}</strong></span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="txtApellido2" class="col-form-label">Segundo Apellido</label>
                            <input type="text" class="form-control @error('txtApellido2') is-invalid @enderror"
                                value="{{old('txtApellido2')}}" id="txtApellido2" name="txtApellido2"
                                placeholder="Opcional">
                            @error('txtApellido2')
                            <span class="invalid-feedback d-block" role="alert"><strong>{{ $message
                                    }}</strong></span>
                            @enderror
                        </div> --}}

                        <div class="form-group col-md-4">
                            <label for="txtCorreoEditar" class="col-form-label">Correo del Usuario</label>
                            <input type="text" class="form-control @error('txtCorreoEditar') is-invalid @enderror"
                                value="{{old('txtCorreoEditar', $usuario->email)}}" id="txtCorreoEditar" name="txtCorreoEditar"
                                placeholder="correo@electronico.com">
                            @error('txtCorreoEditar')
                            <span class="invalid-feedback d-block" role="alert"><strong>{{ $message
                                    }}</strong></span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="rolEditar" class="col-form-label">Rol</label>
                            <select id="rolEditar" name="rolEditar" class="form-control @error('rolEditar') is-invalid @enderror">
                                <option>Elegir</option>
                                @foreach($roles as $rol)
                                <option value="{{$rol->rolID}}" @if($usuario->fk_rolID ==$rol->rolID) selected @endif>{{$rol->descripcion}}</option>
                                @endforeach
                            </select>
                            @error('rolEditar')
                            <span class="invalid-feedback d-block" role="alert"><strong>{{ $message
                                    }}</strong></span>
                            @enderror
                        </div>
                        {{-- <div class="form-group col-md-4">
                            <label for="txtCorreo" class="col-form-label">Contraseña</label>
                            <input type="text" class="form-control" id="txtCorreo" value="" readonly>
                        </div> --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <!--button type="button" class="btn btn-primary">Save changes</button-->
                        <div style="text-align: center;">
                            <button type="submit" id="btnActualizar" class="btn btn-group btn-primo">Actualizar
                                usuario</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

<script language="javascript">
    function enableDisable(bEnable, textBoxID) {
        document.getElementById(textBoxID).disabled = !bEnable
    }

    $(document).ready(function () {
        $('#tbUsuarios').DataTable({
            "paging": true,
        });
    });
</script>
@endsection