@extends('layouts.app')

@section('title')
    <h2 class="page-title-main">Citas</h2>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <!-- Form row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <form action="/cita" method="POST">
                            {!! csrf_field() !!}
                            <h4>Información de las citas</h4>
                            <br/>
                            @include('Visitas.Formulario')
                            <br/>
                            <div style="text-align: center;">
                                <button type="submit" id="btnActualizar" class="btn btn-group btn-primo">Guardar
                                    Cita
                                </button>
                            </div>
                        </form>
                    </div>
                    <!--Fin de info de cita-->
                    <!--Tabla de citsa-->
                @include('Visitas.TablaVisitas')
                <!--Fin Tabla de citas-->
                </div>
            </div>
        </div>
    </div>


@endsection
@push('scripts')
    <script language="javascript">
        const agendas = {!! json_encode($citas->map(function ($product) {
            $carbon=\Carbon\Carbon::make($product->fechaHora);
            $product->fechaHora = $carbon->format('d-m-Y h:i A');
            $product->dateTime = $carbon->format('Y-m-d\TH:i');
            return $product;
        })) !!};
        const users = {!! json_encode($users->toArray()) !!};
        const sellers = {!!json_encode($vendedores->pluck('name','userID')->toArray())!!};
        const updateRoute = '{!! route('cita.update','update_id') !!}';
        $(document).ready(function () {
            fillTable();
            $('#tbCitas').DataTable({
                "paging": true,
            });
        });

        function clickEdit(agendaId) {
            const agenda = agendas.find(agenda => agenda.agendaID == agendaId);
            $('#update_appointment').attr('action', updateRoute.replace('update_id', agenda.agendaID));
            $('#delete_appointment').attr('action', updateRoute.replace('update_id', agenda.agendaID));
            $('#edit_fk_clienteID').val(agenda.clienteID).trigger('change');
            $('#edit_fk_vendedorID').val(agenda.vendedorID).trigger('change');
            $('#edit_ubicacion').val(agenda.ubicacion).change();
            $('#edit_fechaHora').val(agenda.dateTime).change();
            $('#ModalFormularioCitasEdit').modal('show');
        }

        function deleteAppointment() {
            $("#delete_appointment").submit();
        }

        function showInfo(id) {
            const agenda = agendas.find(agenda => agenda.agendaID == id)
            const user = users.find(user => user.userID == agenda.clienteID)
            $('#txtFechaHora').val(agenda.fechaHora);
            $('#txtUbicacion').val(agenda.ubicacion);
            $('#txtEncargado').val(sellers[agenda.vendedorID]);
            $('#txtCodigoProyecto').val(agenda.codigoProyecto);
            $('#txtTipoProyecto').val(agenda.nombre);
            $('#txtNroCotizacion').val(agenda.cotizacionID);
            $('#txtnumCliente').val(user.userID);
            $('#txtNombreCliente').val(user.name);
            $('#txtidentificacion').val(user.identificacion);
            $('#txtTelefono').val(user.telefono);
            $('#txtCorreo').val(user.email);
            $('#ddProvincia').val(user.provincia);
            $('#ddCanton').val(user.canton);
            $('#ddDistrito').val(user.distrito);
            $('#txtNotas').html(user.otraSenia);
            $('#ModalDetallesVisita').modal('show');
        }

        function fillTable() {
            let html = '';
            for (const cita of agendas) {
                html += '<tr><td>' + cita.agendaID + '</td><td>' + cita.clienteID + '</td><td>' + cita.clienteNombre + '</td><td>' + cita.fechaHora + '</td><td>' + cita.ubicacion + '</td><td>' + sellers[cita.vendedorID] + '</td><td><button class="btn btn-group-middle btn-editar" onclick="clickEdit(' + cita.agendaID + ')"><i class="fas fa-pencil-alt"></i></button> <button class="btn btn-group-middle btn-primo" onclick="showInfo(' + cita.agendaID + ')"><i class="fas fa-info-circle"></i></button></td></tr>';
            }
            $('#appointment_table').html(html);
        }
    </script>
@endpush
