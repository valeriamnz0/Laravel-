@extends('layouts.app')

@section('title')
<h2 class="page-title-main">Instalación</h2>
@endsection

@section('content')

<!--Tabla de Listas de Instalacion-->
<div class="card-box">
    <div class="form-row">
        <div class="form-group col-md-10">
            <h4>Mis Citas de Instalación</h4>
        </div>
        <div class="form-group col-md-2">
            <!--button class="btn btn-group-middle btn-primo">Agregar Usuario
                <i class="fas fa-user-plus fa-lg" href="#AgregarUsuarios"></i>
            </button-->
        </div>
    </div>
    <br />
    <div class="form-group row">
        <div class="table-responsive">
            <table class="table table-centered table-striped table-hover mb-0 alinear-centrado" id="tbCitasTecnico">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Proyecto</th>
                        <th>Fecha</th>
                        <th>Ubicación</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    <!-- <tr>
                        <td><a href="" class="color-links" data-toggle="modal" data-target="#ModalMateriales">1</a></td>
                        <td>Valeria Matamoros</td>
                        <td>8888-8750</td>
                        <td>vale@correo.com</td>
                        <td>15 ago. 2021</td>
                        <td>16:30</td>
                        <td>https://goo.gl/maps/m5P2Z66aJEpWReEw8</td>
                        <td><button class="btn btn-group-middle btn-editar" data-toggle="modal" data-target="#ModalMateriales"><i class="fas fa-tools"></i></button>
                            <button class="btn btn-group-middle btn-primo" data-toggle="modal" data-target="#ModalConfirmar"><i class="fas fa-info-circle"></i></button>

                        </td>
                    </tr> -->
                    @foreach ($agendas as $agenda )
                    <tr>
                        <td><a href="" class="color-links" data-toggle="modal" onclick="traerlistaMateriales({{$agenda->cotizacionID}})">{{
                                $agenda->name}}</a></td>
                        <td>{{$agenda->codigoProyecto}}</td>
                        <td>{{ date('d/m/Y H:i',strtotime($agenda->fechaHora))}}</td>
                        <td>{{ $agenda->ubicacion}}</td>
                        <td>{{ $agenda->telefono}}</td>
                        <td>                         
                            <button class="btn btn-group-middle btn-editar" onclick="traerlistaMateriales({{$agenda->cotizacionID}})">
                                <i class="fas fa-tools"></i></button>
                            <button class="btn btn-group-middle btn" style="background-color: #3498DB"
                                data-toggle="modal" data-target="#ModalConfirmar{{$agenda->agendaInstalacionID}}"><i
                                    class="fas fa-comments"></i></button>
                            <button class="btn btn-group-middle btn-primo"
                                    onclick="showInfoTec({{$agenda->agendaInstalacionID}})"><i
                                    class="fas fa-info-circle"></i></button>
                            @include('Instalacion.ConfirmarModal',['agendas'=>[$agenda]])


                        </td>

                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@include('Instalacion.DetallesInstalacion')
@include('Instalacion.ListaMaterialesTecnico')


<script language="javascript">
     const agendas = {!! json_encode($agendas->map(function ($product) {
            $carbon=\Carbon\Carbon::make($product->fechaHora);
            $product->fechaHora = $carbon->format('d-m-Y h:i A');
            $product->dateTime = $carbon->format('Y-m-d\TH:i');
            return $product;
        })) !!};
        
    function enableDisable(bEnable, textBoxID) {
        document.getElementById(textBoxID).disabled = !bEnable
    }

    $(document).ready(function () {
        $('#tbCitasTecnico').DataTable({
            "paging": true,
        });
    });

    $(document).ready(function () {
        $('#tbMateriales').DataTable({
            "paging": true,
        });
    });

    function showInfoTec(id) { //Esto es para el modal de DetallesInstalacion
        const agenda = agendas.find(agenda => agenda.agendaInstalacionID == id)
            $('#txtFechaHora').val(agenda.fechaHora);
            $('#txtUbicacion').val(agenda.ubicacion);
            $('#txtEncargado').val(agenda.nombreTec);
            $('#txtCodigoProyecto').val(agenda.codigoProyecto);
            $('#txtTipoProyecto').val(agenda.nombre);
            $('#txtNroCotizacion').val(agenda.codigoCotizacion);
            $('#txtnumCliente').val(agenda.userID);
            $('#txtNombreCliente').val(agenda.name);
            $('#txtidentificacion').val(agenda.identificacion);
            $('#txtTelefono').val(agenda.telefono);
            $('#txtCorreo').val(agenda.email);
            $('#ddProvincia').val(agenda.provincia);
            $('#ddCanton').val(agenda.canton);
            $('#ddDistrito').val(agenda.distrito);
            $('#txtNotas').html(agenda.otraSenia);
            $('#ModalDetallesInstalacion').modal('show');
            
     }

     function traerlistaMateriales(id) {
       // alert('hola' + id);
        //debugger;
               $.ajax({
                url: '/listaMaterialesTecnico/' + id,
                type: 'get',
                dataType: 'json',
                success: function (response) {
                    $('#tbListaMateriales tbody').empty();

                    if (response['data1'] != null) {
                        for(let i=0; i<response['data1'].length; i++){
                            var tr_str = "<tr>" +
                            "<td >" + response['data1'][i].codigo + "</td>" +
                            "<td >" + response['data1'][i].nombre + "</td>" +                              
                            "<td >" + response['data1'][i].cantidad + "</td>" +                          
                            "<td >" + response['data1'][i].proveedor + "</td>" +                            
                            "<td >" + response['data1'][i].marca + "</td>" +                           
                            "</tr>";
                        $("#tbListaMateriales tbody").append(tr_str);
                        }
                      
                        $('#ModalMateriales').modal('show'); // Abre el modal de Lista de Cotizaciones
                      
                    } else {
                        var tr_str = "<tr>" +
                            "<td align='center' colspan='4'>Sin Registros.</td>" +
                            "</tr>";
                        $("#tbListaMateriales tbody").append(tr_str);
                    }
                }
            });
        }

</script>
@endsection

