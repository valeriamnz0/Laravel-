@extends('layouts.app')

@section('title')
<h2 class="page-title-main">Proyectos</h2>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <!-- Form row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <form>
                        <h4>Información del proyecto</h4>
                        @if ($errors->has('numeroCliente'))
                        <small class="form-text text-danger">No se seleccionó un cliente existente en la Lista de Clientes
                            cuando se intentó crear o editar un proyecto
                        </small>
                        @endif
                        @if ($errors->has('name')||$errors->has('telefono')||$errors->has('email'))
                        <small class="form-text text-danger">El formulario de cliente nuevo está incompleto</small>
                        @endif
                        <br />
                        <div class="form-row alinear-centrado">

                            <div class="form-group col-md-6">
                                <div class="custom-control custom-radio ">
                                    <input type="radio" id="customRadio1" name="customRadio"
                                        class="custom-control-input" data-toggle="modal"
                                        data-target="#ModalClienteNuevo">
                                    @if ($errors->has('name')||$errors->has('telefono')||$errors->has('email'))
                                    <label class="custom-control-label text-danger" for="customRadio1">Cliente
                                        Nuevo</label>
                                    @else
                                    <label class="custom-control-label" for="customRadio1">Cliente Nuevo</label>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio2" name="customRadio"
                                        class="custom-control-input" data-toggle="modal"
                                        data-target="#ModalClienteExistente">
                                    @if ($errors->has('numeroCliente'))
                                    <label class="custom-control-label text-danger" for="customRadio2">Cliente
                                        Existente</label>
                                    @else
                                    <label class="custom-control-label" for="customRadio2">Cliente Existente</label>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal Cliente Nuevo -->
<div id="ModalClienteNuevo" class="modal fade " role="dialog">
    <div class="modal-dialog modal-xl modal-dialog-centered">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header ">
                <h4 class="modal-title ">Agregar Cliente</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body ">
                <div class="col-md-12">
                    <form action="/proyecto/{pasaCliente}" method="post">
                        @csrf
                        <h4>Crear un cliente nuevo</h4>
                        <br />
                        @include('Cliente.FormularioClientes')
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <!--button type="button" class="btn btn-primary">Save changes</button-->
                            <div style="text-align: center;">
                                <button type="submit" id="btnReservar" class="btn btn-group btn-primo">Guardar
                                    Cliente</button>
                            </div>
                        </div>
                    </form>
                    <!--Fin de info del cliente-->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Cliente Existente -->
<div id="ModalClienteExistente" class="modal fade" role="dialog">
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
                <div class="container">
                    {{ Form::open(['route' => 'escogeCliente', 'method' => 'POST'])}}
                    @csrf
                    @include('Proyecto.ListaClientes')
                    {{ Form::close() }}
                </div>
            </div>

        </div>

    </div>
</div>

<!--Tabla de Proyectos-->
<div class="card-box">
    <h4>Lista de Proyectos</h4>
    <br />
    <div class="form-group row">
        <div class="table-responsive">
            <table class="table table-centered table-striped table-hover mb-0 alinear-centrado" id="tbProyectos">
                <thead>
                    <tr>
                        <th>Codigo de Proyecto</th>
                        <th>Tipo de Proyecto</th>
                        <th>Cliente</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                @isset($proyectos)
                @foreach ($proyectos as $proyecto)
                <tbody>
                    <tr>
                        <td><a href="/proyecto/{{$proyecto->proyectoID}}" class="color-links">{{$proyecto->codigoProyecto}}</a></td>
                        <td>{{$proyecto->nombre}}</td>
                        <td>{{$proyecto->name}}</td>
                        <td>
                            @if ($errors->has('numeroCliente'))
                            <button class="btn btn-group-middle btn-editar btn-outline-danger" data-toggle="modal"
                                data-target="#ModalClienteExistente" onclick="pasaProyecto({{$proyecto->proyectoID}})">
                                <i class="fas fa-pencil-alt"></i></button>
                            @else
                            <button class="btn btn-group-middle btn-editar " data-toggle="modal"
                                data-target="#ModalClienteExistente" onclick="pasaProyecto({{$proyecto->proyectoID}})">
                                <i class="fas fa-pencil-alt"></i></button>
                            @endif
                            <a href="/proyecto/{{$proyecto->proyectoID}}"><button class="btn btn-group-middle btn-primo"   >
                                <i class="fas fa-info-circle"></i></button></a>

                        </td>
                    </tr>
                </tbody>
                @endforeach
                @endisset
            </table>
            <br>
        </div> <!-- end .table-responsive-->
    </div>
</div>

<!-- Modal Lista de Cotizaciones  -->
<div id="ModalListaCotizaciones" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xl modal-dialog-centered">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cotizaciones del Proyecto</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <!--Tabla de articulos-->

                <h4>Lista de Cotizaciones</h4>
                @if(session('estado'))
                    <small class="form-text text-danger">Este proyecto ya tiene una cotizacion aprobada
                    </small>
                @endif
                <br />
                @isset($proyectoPasado)
                <div class="form-group row">
                    <div class="table-responsive">
                        
                        <table class="table table-centered table-striped table-hover mb-0 alinear-centrado"
                            id="tbCotizaciones">
                            <thead>
                                <tr>
                                    <th>Número de Cotización</th>
                                    <th>Cotizado por</th>
                                    <th>Exonerado</th>
                                    <th>Fecha</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($cotizaciones)
                                        @foreach ($cotizaciones as $cotizacion)
                                            <tr>
                                                <td><a href="/cotizacion/editaCotizacion/{{$cotizacion->cotizacionID}}" class="color-links">{{$cotizacion->codigoCotizacion}}</a></td>
                                                <td>{{ $cotizacion->name}}</td>
                                                    @if ($cotizacion->exonerado === 1)
                                                        <td><i class="fas fa-check-circle" style="color: #343f40;"></i></td>
                                                    @else
                                                    <td></td>
                                                    @endif
                                                <td>{{ date('d/m/Y',strtotime($cotizacion->fecha )) }}</td>
                                                <td>
                                                    <form action="/cotizacion/{{$cotizacion->cotizacionID}}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="txtProyectoID" value="{{$proyectoPasado->proyectoID}}">
                                                        <select id="ddAprobado{{$cotizacion->cotizacionID}}" class="form-control" name="ddAprobado" onchange="this.form.submit()">
                                                            @if ($cotizacion->aprobado === 1)
                                                                <option value="{{$cotizacion->aprobado}}" selected>Aprobado</option>
                                                                <option value="0" >No aprobado</option>
                                                            @else
                                                                <option value="{{$cotizacion->aprobado}}" selected>No probado</option>
                                                                <option value="1" >Aprobado</option>
                                                            @endif
                                                        </select>
                                                    </form>
                                                </td>
                                                <td>
                                                    <a href="/cotizacion/editaCotizacion/{{$cotizacion->cotizacionID}}">
                                                    <button class="btn btn-group-middle btn-editar"><i
                                                            class="fas fa-pencil-alt"></i></button></a>
                                                    <a target="_blank" href="/PDF/{{$cotizacion->cotizacionID}}">
                                                    <button style="background-color:#750b14" class="btn btn-group-middle"><i
                                                            class="fas fa-file-pdf"></i></button></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                @endisset
                            </tbody>
                        </table>
                        <br>
                    </div> <!-- end .table-responsive-->
                </div>
                <!--Fin Tabla de articulos-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <a href="/cotizacion/cargaProyecto/{{$proyectoPasado->proyectoID}}">
                        <button type="button" class="btn btn-primo">Agregar Nueva Cotización </button></a>
                    </div>
                    @endisset
            </div>
            
        </div>
    </div>
</div>

<!-- Modal Tipo de Proyecto  -->
<div id="ModalTipoProyecto" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xl modal-dialog-centered">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Seleccione el tipo de proyecto</h4>
                <a href="{{ url('/proyecto') }}" class="close">
                    <button type="button" class="close">&times;</button>
                </a>
            </div>
            <div class="modal-body">
                <!--Tabla de articulos-->
                <br />
                @isset($proyectoID)
                <form action="/proyecto/{{$proyectoID}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @include('Proyecto.DropDownTipos')
                    {!! Form::hidden('proyectoID', $proyectoID) !!}
                    <div class="modal-footer">
                        <a href="{{ url('/proyecto') }}" class="close">
                            <button type="button" class="btn btn-secondary">Cerrar</button>
                        </a>
                        <button type="submit" id="btnCreaProyecto" class="btn btn-group btn-primo">Actualizar
                            Proyecto</button>
                    </div>
                </form>
@else
                <form action="/proyecto" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('Proyecto.DropDownTipos')
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" id="btnCreaProyecto" class="btn btn-group btn-primo">Crear
                            Proyecto</button>
                    </div>
                </form>
                @endisset
            </div>
            
        </div>
    </div>
</div>

    <!-- Modal Tipo de Proyecto Actualizar
    <div id="ModalTipoProyectoActualizar" class="modal fade" role="dialog">
        <div class="modal-dialog modal-md modal-dialog-centered ">

            <!-- Modal content-
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Seleccione el tipo de proyecto</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body ">
                    <!--Tabla de articulos
                    <br />
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Tipo Proyecto</label>
                        <div class="col-sm-9">
                            <select id="ddTipoProyecto" class="form-control alinear-centrado">
                                <option>Elegir</option>
                                @isset($tipoProyectos)
                                @foreach ($tipoProyectos as $tipo)
                                <option value="{{$tipo->tipoProyectoID}}">{{$tipo->nombre}}</option>
                                @endforeach
                                @endisset
                            </select>
                        </div>
                    </div>


                    <!--Fin Tabla de articulos-
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primo">Actualizar Proyecto</button>
                </div>
            </div>

        </div>
    </div>-->

    @push('scripts')
    <script src="{{ asset('js/domicilioapi.js') }}" defer></script>
    <script>
        let formularioCliente = 0;
        const users = {!! json_encode($users) !!};
        let provinces = {!! json_encode($provinces) !!};
        const _token = '{!! csrf_token() !!}';
        const provincesUrl = '{!!route('getProvinces') !!}';
        
        function filterByName(objects, name) {
            for (const key in objects) {
                if (objects[key].name == name)
                    return key;
            }
            return 0;
        }
    </script>
@endpush

    @if(!empty($crea_proyecto) && $crea_proyecto == true)
    <script>
        $(function () {
            $('#ModalTipoProyecto').modal('show');
        });
    </script>
    @endif

    @if(!empty($ve_cotizacion) && $ve_cotizacion == true)
    <script>
        $(function () {
            $('#ModalListaCotizaciones').modal('show');
        });
    </script>
    @endif

    <script language="javascript">
        function enableDisable(bEnable, textBoxID) {
            document.getElementById(textBoxID).disabled = !bEnable
        }

        $(document).ready(function () {
            $('#tbClientesExistente').DataTable({
                "paging": true,
            });
        });

        $(document).ready(function () {
            $('#tbClientesLista').DataTable({
                "paging": true,
            });
            $('#tbProyectos').DataTable({
                "paging": true,
            });
            
        });


        $(document).ready(function () {
            $('#tbCotizaciones').DataTable({
                "paging": true,
            });
        });
    </script>
    @endsection