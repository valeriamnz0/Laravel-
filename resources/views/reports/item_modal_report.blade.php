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
                        <h4>Artículos</h4>
                        <hr/>

                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="show_dates"
                                   onclick="toggleDates()">
                            <label class="custom-control-label" for="show_dates">Usar Filtro de
                                Fechas</label>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="category" class="col-form-label">Tipo de Artículos</label>
                            <select id="category" class="form-control" name="category">
                                <option value="">Todos los Tipos</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->tipoArticuloID}}">{{$category->descripcion}}</option>
                                @endforeach
                            </select>
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
                    <h4>Clasificación de Artículos</h4>
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
                                    <th>Código Producto</th>
                                    <th>Nombre Producto</th>
                                    <th>Cantidad de Proyectos</th>
                                    <th>Precio Máximo</th>
                                    <th>Precio Mínimo</th>
                                    <th>Costo de Adquisición</th>
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
    <script language="javascript">
        var table;

        function toggleDates() {
            $('.dates').toggle();
        }

        function enableDisable(bEnable, textBoxID) {
            document.getElementById(textBoxID).disabled = !bEnable
        }

        function getReport() {
            const dataReport = {_token: "{{csrf_token()}}"};
            let aux = $('#start_date').val();
            if (aux && aux != '') {
                dataReport['start_date'] = aux;
            }
            aux = $('#category').val();
            if (aux && aux != '') {
                dataReport['category'] = aux;
            }
            aux = $('#final_date').val();
            if (aux && aux != '') {
                dataReport['final_date'] = aux;
            }
            $.ajax({
                dataType: "json",
                type: 'post',
                url: "{{url('Reportes_Articulos')}}",
                data: dataReport,
                success: function (data) {
                    table.clear();
                    table.rows.add(data).draw(false);
                    const charts = [];
                    let total = 0;
                    const labels = [];
                    for (const datum of data) {
                        const label = datum.at(1);
                        charts.push(datum.at(2));
                        total += datum.at(-1);
                        labels.push(label)
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

        const ctx = document.getElementById("examChart").getContext("2d");
        const chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [],
                datasets: [{
                    label: 'Cantidad de Proyectos',
                    data: [],
                    borderWidth: 1
                }]
            }
        });

        $(document).ready(function () {
            table = $('#tbArticulos').DataTable({
                "paging": true,
            });
        });
    </script>
@endsection
