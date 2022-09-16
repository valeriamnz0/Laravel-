@extends('layouts.app')

@section('title')
    <h2 class="page-title-main">Instalación</h2>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <!-- Form row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <form action="{{route('instalacion.store')}}" method="POST">
                            @include('Instalacion.Formulario')

                            <div style="text-align: center;">
                                <button type="submit" id="btnGuardarInstalacion" class="btn btn-group btn-primo">Guardar
                                    Cita
                                </button>
                            </div>

                        </form>
                    </div>
                    <!--Fin de info de cita-->
                    <!--Tabla de citsa-->
                @include('Instalacion.TablaInstalacion')
                <!--Fin Tabla de citas-->
                </div>
            </div>
        </div>
    </div>
    @include('Instalacion.FiltarProyectoModal')
@endsection

@push('scripts')

    <script>
        const agendas = {!! json_encode($agendas->map(function ($product) {
            $carbon=\Carbon\Carbon::make($product->fechaHora);
            $product->fechaHora = $carbon->format('d-m-Y h:i A');
            $product->dateTime = $carbon->format('Y-m-d\TH:i');
            return $product;
        })) !!};
        const sellers = {1: 'Daniel Aponte', 2: 'Nelly', 3: 'Luis Danilo'};
        const updateRoute = '{!! route('instalacion.update','update_id') !!}';
        let project = '';
        fillTable();
        $(document).ready(function () {
            $('#tbInstalacion').DataTable({
                "paging": true,
            });
            $('#tbCitasTecnico').DataTable({
                "paging": true,
            });
            $('#tbMateriales').DataTable({
                "paging": true,
            });
            // $('#tbCotizacionesFiltro').DataTable({
            //     "paging": true,
            // });
            // $('#tbProyectoFiltro').DataTable({
            //     "paging": true,
            // });
            $("#tbProyectoFiltro").on("click", "input[type=radio]", function () {  //Esto se utiliza a la hora que se da click sobre el Radio button
                var $tds = $(this).closest('tr').find('td');
                var proyectoID = $tds.eq(1).text(); //Obtiene el ProyetoID, esto es un campo hidden
                var codigoProyecto = $tds.eq(2).text(); //Obtiene el Codigo Proyecto
                var nombreCliente = $tds.eq(4).text(); //Obtiene el Codigo Proyecto
                $(codigoProyecto).attr("value", codigoProyecto);
                $(nombreCliente).attr("value", nombreCliente);
                $("#" + project + "CodigoProyecto").val(codigoProyecto);  //Coloca el valor CodigoProyecto en el FormularioInstalacion
                $("#" + project + "nombre").val(nombreCliente); //Coloca el valor nombreCliente en el FormularioInstalacion

                traerDatosCotizacion(proyectoID); // Llama la funcion y le pasa el proyectoID seleccionado
                // $('#ModalListaCotizaciones').modal('show'); // Abre el modal de Lista de Cotizaciones
                // $('#ModalListaProyectos').modal('hide'); // Oculta el modal

            });
            $("#tbCotizacionesFiltro").on("click", "input[type=radio]", function () {
                var $tdsCot = $(this).closest('tr').find('td');
                var numCotizacion = $tdsCot.eq(1).text();
                var codigoCotizacion = $tdsCot.eq(2).text();
                $(numCotizacion).attr("value", numCotizacion);
                $(codigoCotizacion).attr("value", codigoCotizacion);
                $("#" + project + "fk_cotizacionID").val(numCotizacion);
                $("#" + project + "codigoCotizacion").val(codigoCotizacion);

                $('#ModalListaCotizaciones').modal('hide');
                $('.modal-backdrop').remove();

            });
        });

        function fillTable() {
            let html = '';
            for (const agenda of agendas) {
                html += '<tr><td>' + agenda.name + '</td><td>' + agenda.fechaHora + '</td><td>' + agenda.ubicacion + '</td><td>' + sellers[agenda.tecID] + '</td><td><button class="btn btn-group-middle btn-editar"><i class="fas fa-pencil-alt" onclick="clickEdit(' + agenda.agendaInstalacionID + ')"></i></button><button class="btn btn-group-middle btn-primo" onclick="showInfo(' + agenda.agendaInstalacionID + ')"><i class="fas fa-info-circle"></i></button></td></tr>';
            }
            $('#body_instalacion').html(html);
        }

        function showFilterProject(aux) {
            project = aux;
            $('#ModalListaProyectos').modal('show');
        }

        function showInfo(id) { //Esto es para el modal de Mostrar Info
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

        function enableDisable(bEnable, textBoxID) {
            document.getElementById(textBoxID).readonly = !bEnable
        }

        function traerDatosCotizacion(id) {
            $.ajax({
                url: 'datosCotizacion/' + id,
                type: 'get',
                dataType: 'json',
                success: function (response) {

                    $('#tbCotizacionesFiltro tbody').empty();

                    if (response['data'] != null) {
                        var tr_str = "<tr>" +
                            "<td><input type='radio'></td>" +
                            "<td style='display: none'>" + response['data'].cotizacionID + "</td>" +
                            "<td>" + response['data'].codigoCotizacion + "</td>" +
                            "<td>" + response['data'].fecha + "</td>" +
                            "<td>" + response['data'].exonerado + "</td>" +
                            "<td>" + response['data'].ventaDolar + "</td>" +
                            "</tr>";
                        $("#tbCotizacionesFiltro tbody").append(tr_str);
                        $('#ModalListaCotizaciones').modal('show'); // Abre el modal de Lista de Cotizaciones
                        $('#ModalListaProyectos').modal('hide'); // Oculta el modal
                    } else {
                        var tr_str = "<tr>" +
                            "<td align='center' colspan='4'>Sin Registros.</td>" +
                            "</tr>";
                        $("#tbCotizacionesFiltro tbody").append(tr_str);
                    }
                }
            });
        }

        function cerrarModal(modal) {

            $(modal).modal('hide');
            $('.modal-backdrop').remove();
            $("#CodigoProyecto").val("");  //Limpiar Valores.
            $("#nombre").val("");
            $("#fk_cotizacionID").val('');
        }

        function clickEdit(agendaId) {
            const agenda = agendas.find(agenda => agenda.agendaInstalacionID == agendaId);
            $('#update_instalation').attr('action', updateRoute.replace('update_id', agenda.agendaInstalacionID));
            $('#delete_instalation').attr('action', updateRoute.replace('update_id', agenda.agendaInstalacionID));
            $('#edit_nombre').val(agenda.name);
            $('#edit_CodigoProyecto').val(agenda.codigoProyecto);
            $('#edit_fk_cotizacionID').val(agenda.cotizacionID);
            $('#edit_fk_tecnicoID').val(agenda.tecID).change();
            $('#edit_fechaHora').val(agenda.dateTime).change();
            $('#edit_ubicacion').val(agenda.ubicacion);
            $('#ModalFormularioInstalacionEdit').modal('show');
        }

        function deleteAppointment() {
            $("#delete_instalation").submit();
        }

    </script>
@endpush

