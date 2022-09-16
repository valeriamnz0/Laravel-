<!-- Modal Lista de Proyectos -->
<div id="ModalListaProyectos" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xl modal-dialog-centered">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Seleccione el Proyecto</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <h4>Lista de Proyectos</h4>
                <br />

                <div class="form-group row">
                    <div class="table-responsive">
                        <!--Inicio Tabla de Proyectos-->

                        <table class="table table-centered table-striped table-hover mb-0 alinear-centrado" id="tbProyectoFiltro">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Codigo de Proyectos</th>
                                    <th>Tipo de Proyectos</th>
                                    <th>Cliente</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($proyectos as $proyecto)
                                <tr>
                                    <td><input type="radio" id="cita" name="cita"></td>
                                    <td style="display: none;">{{$proyecto->proyectoID}}</td>
                                    <td>{{$proyecto->codigoProyecto}}</td>
                                    <td>{{$proyecto->nombre}}</td>
                                    <td>{{$proyecto->name}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <br>
                    </div> <!-- end .table-responsive-->
                </div>
                <!--Fin Tabla de Proyectos-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="cerrarModal('#ModalListaProyectos')">Cerrar</button>

            </div>
        </div>

    </div>
</div>

<!-- Modal Lista de Cotizaciones -->
<div id="ModalListaCotizaciones" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xl modal-dialog-centered">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detalle Cotización</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <h4>Cotización Activa</h4>
                <br />
                <div class="form-group row">
                    <div class="table-responsive">
                        <!--Inicio Tabla de Cotizaciones-->
                        <table class="table table-centered table-striped table-hover mb-0 alinear-centrado" id="tbCotizacionesFiltro">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Codigo de Cotización</th>
                                    <th>Fecha</th>
                                    <th>Exonerado</th>
                                    <th>Tipo Cambio</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <br>
                    </div> <!-- end .table-responsive-->
                </div>
                <!--Fin Tabla de Cotizaciones-->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="cerrarModal('#ModalListaCotizaciones')">Cerrar</button>
            </div>
        </div>

    </div>
</div>


<script language="javascript">
    $(document).ready(function() {
        // $('#tbCotizacionesFiltro').DataTable({
        //     "paging": true,
        // });
        $('#tbProyectoFiltro').DataTable({
            "paging": true,
        });
        $("#tbProyectoFiltro").on("click", "input[type=radio]", function() { //Esto se utiliza a la hora que se da click sobre el Radio button
            debugger;
            var $tds = $(this).closest('tr').find('td');
            var proyectoID = $tds.eq(1).text(); //Obtiene el ProyetoID, esto es un campo hidden
            var codigoProyecto = $tds.eq(2).text(); //Obtiene el Codigo Proyecto
            var nombreCliente = $tds.eq(4).text(); //Obtiene el Codigo Proyecto
            $(codigoProyecto).attr("value", codigoProyecto);
            $(nombreCliente).attr("value", nombreCliente);
            $("#txtCodigoProyecto").val(codigoProyecto); //Coloca el valor CodigoProyecto en el FormularioInstalacion 
            $("#nombre").val(nombreCliente); //Coloca el valor nombreCliente en el FormularioInstalacion

            traerDatosCotizacion(proyectoID); // Llama la funcion y le pasa el proyectoID seleccionado
            // $('#ModalListaCotizaciones').modal('show'); // Abre el modal de Lista de Cotizaciones
            // $('#ModalListaProyectos').modal('hide'); // Oculta el modal

        });
        $("#tbCotizacionesFiltro").on("click", "input[type=radio]", function() {
            var $tdsCot = $(this).closest('tr').find('td');
            var numCotizacion = $tdsCot.eq(1).text();
            $(numCotizacion).attr("value", numCotizacion);
            $("#txtNumeroCotizacion").val(numCotizacion);
            $('#ModalListaCotizaciones').modal('hide');
            $('.modal-backdrop').remove();

        });
    });

    function traerDatosCotizacion(id) {
        $.ajax({
            url: 'datosCotizacion/' + id,
            type: 'get',
            dataType: 'json',
            success: function(response) {
                debugger;
                $('#tbCotizacionesFiltro tbody').empty();

                if (response['data'] != null) {
                    var tr_str = "<tr>" +
                        "<td><input type='radio'></td>" +
                        "<td align='center'>" + response['data'].codigoCotizacion + "</td>" +
                        "<td align='center'>" + response['data'].fecha + "</td>" +
                        "<td align='center'>" + response['data'].exonerado + "</td>" +
                        "<td align='center'>" + response['data'].ventaDolar + "</td>" +
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
            },
            error: function(i) {
                alert('error');
            }
        });
    }

    function cerrarModal(modal) {

        $(modal).modal('hide');
        $('.modal-backdrop').remove();
        $("#txtCodigoProyecto").val(""); //Limpiar Valores.
        $("#nombre").val("");
        $("#txtNumeroCotizacion").val('');
    }
</script>