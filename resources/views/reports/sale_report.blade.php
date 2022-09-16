@extends('layouts.app')

@section('title')
    <h2 class="page-title-main">Reportes</h2>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <!-- Form row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <h4>Ventas</h4>
                        <hr/>

                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="show_dates"
                                   onclick="toggleDates()">
                            <label class="custom-control-label" for="show_dates">Usar Filtro de
                                Fechas</label>
                        </div>
                        <div class="form-row dates" style="display: none;">
                            <div class="form-group col-md-6">
                                <label for="start_date" class="col-form-label">Fecha de Inicio</label>
                                <input type="date" id="start_date" class="form-control" name="start_date">

                            </div>

                            <div class="form-group col-md-6">
                                <label for="final_date" class="col-form-label">Fecha Final</label>
                                <input type="date" id="final_date" class="form-control" name="final_date">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <div class="form-group col-xs-6">
                                    <label for="txtValorMin" class="col-form-label">Valor mínimo</label>
                                    <input type="text" class="form-control" id="txtValorMin" name="min_amount"
                                           placeholder="$25">
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="txtValorMax" class="col-form-label">Valor máximo</label>
                                <input type="text" class="form-control" id="txtValorMax" name="max_amount"
                                       placeholder="$50">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="ddTipoProyecto" class="col-form-label">Tipo de Proyecto</label>
                                <select id="ddTipoProyecto" class="form-control alinear-centrado" name="project_type">
                                    <option selected value="">Todos los Proyectos</option>
                                    @foreach($projectTypes as $projectType)
                                        <option
                                            value="{{$projectType->tipoProyectoID}}">{{$projectType->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <h4>Otros filtros</h4>
                        <hr/>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="category" class="col-form-label">Categoría de producto</label>
                                <select id="category" class="form-control" name="category">
                                    <option value="">Todas las categorías</option>
                                    @foreach($itemTypes as $itemType)
                                        <option
                                            value="{{$itemType->tipoArticuloID}}">{{$itemType->descripcion}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="client" class="col-form-label">Clientes</label>
                                <select id="client" class="form-control" name="client">
                                    <option value="">Todos los clientes</option>
                                    @foreach($clients as $client)
                                        <option value="{{$client->userID}}">{{$client->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class="alinear-centrado">
                            <button type="button" class="btn btn-group btn-primo" data-toggle="modal"
                                    onclick="getReport()"
                                    data-target="#ModalGenerarReporte">Generar Reporte
                            </button>
                        </div>

                    </div>
                    <!--Fin de reportes Ventas-->
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Reporte Ventas  -->
    <div id="ModalGenerarReporte" class="modal fade" role="dialog">
        <div class="modal-dialog modal-xl modal-dialog-centered">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Reportes</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">
                    <!--Tabla de articulos-->
                    <h4>Clasificación de Ventas</h4>
                    <br/>
                    <div class="container">
                        <canvas id="examChart"></canvas>
                    </div>
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-centered table-striped table-hover mb-0 alinear-centrado"
                                   id="tbArticulos">
                                <thead>
                                <tr>
                                    <th>Número Cliente</th>
                                    <th>Nombre Cliente</th>
                                    <th>Cantidad de Cotizaciones</th>
                                    <th>Codigo de Proyecto</th>
                                    <th>Tipo de Proyecto</th>
                                    <th>Cantidad de Productos</th>
                                    <th>Ganancia del Proyecto</th>
                                </tr>
                                </thead>
                                <tbody id="body_table">
                                </tbody>
                            </table>
                            <br/>
                            <div style="text-align: right;">
                                <label>Total: <span id="total">0</span></label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script>
    <script>
        var table;

        function getReport() {
            const dataReport = {_token: "{{csrf_token()}}"};
            let aux = $('#start_date').val();
            if (aux && aux != '') {
                dataReport['start_date'] = aux;
            }
            aux = $('#final_date').val();
            if (aux && aux != '') {
                dataReport['final_date'] = aux;
            }
            aux = $('#txtValorMin').val();
            if (aux && aux != '') {
                dataReport['min_amount'] = aux;
            }
            aux = $('#txtValorMax').val();
            if (aux && aux != '') {
                dataReport['max_amount'] = aux;
            }
            aux = $('#ddTipoProyecto').val();
            if (aux && aux != '') {
                dataReport['project_type_id'] = aux;
            }
            aux = $('#category').val();
            if (aux && aux != '') {
                dataReport['category'] = aux;
            }
            aux = $('#client').val();
            if (aux && aux != '') {
                dataReport['client'] = aux;
            }
            $.ajax({
                dataType: "json",
                type: 'post',
                url: "{{url('Reportes_Ventas')}}",
                data: dataReport,
                success: function (data) {
                    table.clear();
                    table.rows.add(data).draw(false);
                    let total = 0;
                    const charts = [];
                    const labels = [];
                    for (const datum of data) {
                        const label = new Date(datum.at(-1));
                        total += datum.at(-2);
                        charts.push({x: label.toString(), y: datum.at(-2), t: "deito"});
                        labels.push(label.toDateString())
                    }
                    $('#total').html(total.toFixed(2));
                    chart.data.labels = labels;
                    chart.data.datasets[0].data = charts;
                    chart.update();
                },
                error: (e) => {
                    console.log(e)
                }
            });
        }

        function toggleDates() {
            $('.dates').toggle();
        }

        var ctx = document.getElementById("examChart").getContext("2d");
        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: 'Reporte de Ventas',
                    data: [],
                    borderWidth: 1
                }]
            }
        });

        function enableDisable(bEnable, textBoxID) {
            document.getElementById(textBoxID).disabled = !bEnable
        }

        $(document).ready(function () {

            table = $('#tbArticulos').DataTable({
                "paging": true,
            });
        });

    </script>
@endsection
