@extends('layouts.app')

@section('title')
<h4 class="page-title-main">Reportes</h4>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <!-- Form row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <h4>Ventas</h4>
                    <br />
                    <div class="form-row ">
                        <div class="form-group col-md-6">
                            <label for="txtnumCliente" class="col-form-label">Fecha de Inicio</label>
                            <input type="date" id="birthday" class="form-control" name="fechaInicio">

                        </div>

                        <div class="form-group col-md-6">
                            <label for="txtNombreCliente" class="col-form-label">Fecha Final</label>
                            <input type="date" id="birthday" class="form-control" name="fechaFinal">
                        </div>
                    </div>
                    <br />
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <div class="form-group col-xs-6">
                                <label for="txtValorMin" class="col-form-label">Valor mínimo</label>
                                <input type="text" class="form-control" id="txtValorMin" placeholder="$25">
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="txtValorMax" class="col-form-label">Valor máximo</label>
                            <input type="text" class="form-control" id="txtValorMax" placeholder="$50">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="txtValorMax" class="col-form-label">Tipo de Proyecto</label>
                            <select id="ddTipoProyecto" class="form-control alinear-centrado">
                                <option>Elegir</option>
                                <option value="1">Routing & Switching</option>
                                <option value="2">Circuito Cerrado de TV</option>
                                <option value="3">Alarma de robo</option>
                                <option value="4">Alarma Incencio</option>
                                <option value="5">Control de Acceso</option>
                                <option value="6">Cerca electrica</option>
                                <option value="7">Domótica</option>
                            </select>
                        </div>

                    </div>
                    <div class="alinear-centrado">
                        <button type="submit" class="btn btn-group btn-primo" data-toggle="modal"
                            data-target="#ModalGenerarReporte">Generar Reporte</button>
                    </div>

                </div>
                <!--Fin de reportes Ventas-->
                <!--Inicio reporte Clientes-->
                <div class="card-box">
                    <h4>Clientes</h4>
                    <br />

                    <div class="form-row ">
                        <div class="form-group col-md-5">
                            <label for="txtnumCliente" class="col-form-label">Fecha de Inicio</label>
                            <input type="date" id="birthday" class="form-control" name="fechaInicio">

                        </div>

                        <div class="form-group col-md-5">
                            <label for="txtNombreCliente" class="col-form-label">Fecha Final</label>
                            <input type="date" id="birthday" class="form-control" name="fechaFinal">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="txtNombreCliente" class="col-form-label">Filtrar Clientes </label><br />
                            <button type="submit" class="btn col-md-12"
                                style="text-align: center; background-color: #F2A54E;" data-toggle="modal"
                                data-target="#ModalListaClientes">Clientes</button>
                        </div>
                    </div>
                    <br />
                    <div class="alinear-centrado">
                        <button type="submit" class="btn btn-group btn-primo" data-toggle="modal"
                            data-target="#ModalGenerarReporteCliente">Generar Reporte</button>
                    </div>
                </div>
                <!--Fin de reportes Clientes-->
                <!--Inicio reporte Artículos-->
                <div class="card-box">
                    <h4>Artículos</h4>
                    <br />

                    <div class="form-row ">
                        <div class="form-group col-md-6">
                            <label for="txtnumCliente" class="col-form-label">Fecha de Inicio</label>
                            <input type="date" id="birthday" class="form-control" name="fechaInicio">

                        </div>

                        <div class="form-group col-md-6">
                            <label for="txtNombreCliente" class="col-form-label">Fecha Final</label>
                            <input type="date" id="birthday" class="form-control" name="fechaFinal">
                        </div>
                    </div>
                    <br />
                    <div class="form-row">

                        <div class="form-group col-md-5">
                            <label for="txtnumCliente" class="col-form-label">Categoría de producto</label>
                            <select id="ddProvincia" class="form-control">
                                <option>Elegir</option>
                                <option value="1">Antena</option>
                                <option value="2">Audio</option>
                                <option value="3">Batería</option>
                                <option value="4">Botonera</option>
                                <option value="5">Cámara IP</option>
                                <option value="6">Patch Panel</option>
                                <option value="7">Sirenas</option>
                            </select>
                        </div>

                        <div class="form-group col-md-5">
                            <label for="txtNombreCliente" class="col-form-label">Marca</label>
                            <input type="text" class="form-control" id="marca" placeholder="Marca">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="txtNombreCliente" class="col-form-label">Filtrar Artículos </label><br />
                            <button type="submit" class="btn col-md-12"
                                style="text-align: center; background-color: #F2A54E;" data-toggle="modal"
                                data-target="#ModalListaArtículos">Artículos</button>
                        </div>
                    </div>
                    <br />
                    <div class="alinear-centrado">
                        <button type="submit" class="btn btn-group btn-primo" data-toggle="modal"
                            data-target="#ModalGenerarReporteArticulos">Generar Reporte</button>
                    </div>
                </div>
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
                <br />
                <div class="form-group row " style="padding-left: 10%;">
                    <div class="row">
                        <div class="col-md-4" style="margin-right: 8%;">
                            <svg height="280" version="1.1" width="346" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                style="overflow: hidden; position: relative; left: -0.775px; top: -0.4px;">
                                <desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.3.0
                                </desc>
                                <defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><text x="30.796875"
                                    y="240.59375" text-anchor="end" font-family="sans-serif" font-size="12px"
                                    stroke="none" fill="#888888"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                    font-weight="normal">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">0</tspan>
                                </text>
                                <path fill="none" stroke="#adb5bd" d="M43.296875,240.5H321" stroke-opacity="0.1"
                                    stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                <text x="30.796875" y="186.6953125" text-anchor="end" font-family="sans-serif"
                                    font-size="12px" stroke="none" fill="#888888"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                    font-weight="normal">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">25</tspan>
                                </text>
                                <path fill="none" stroke="#adb5bd" d="M43.296875,186.5H321" stroke-opacity="0.1"
                                    stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                <text x="30.796875" y="132.796875" text-anchor="end" font-family="sans-serif"
                                    font-size="12px" stroke="none" fill="#888888"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                    font-weight="normal">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">50</tspan>
                                </text>
                                <path fill="none" stroke="#adb5bd" d="M43.296875,132.5H321" stroke-opacity="0.1"
                                    stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                <text x="30.796875" y="78.8984375" text-anchor="end" font-family="sans-serif"
                                    font-size="12px" stroke="none" fill="#888888"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                    font-weight="normal">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">75</tspan>
                                </text>
                                <path fill="none" stroke="#adb5bd" d="M43.296875,78.5H321" stroke-opacity="0.1"
                                    stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                <text x="30.796875" y="25.00000000000003" text-anchor="end" font-family="sans-serif"
                                    font-size="12px" stroke="none" fill="#888888"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                    font-weight="normal">
                                    <tspan dy="4.000000000000028"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">100
                                    </tspan>
                                </text>
                                <path fill="none" stroke="#adb5bd" d="M43.296875,25.5H321" stroke-opacity="0.1"
                                    stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                <text x="321" y="253.09375" text-anchor="middle" font-family="sans-serif"
                                    font-size="12px" stroke="none" fill="#888888"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                    font-weight="normal" transform="matrix(1,0,0,1,0,7.2031)">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2015</tspan>
                                </text><text x="281.3591550156433" y="253.09375" text-anchor="middle"
                                    font-family="sans-serif" font-size="12px" stroke="none" fill="#888888"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                    font-weight="normal" transform="matrix(1,0,0,1,0,7.2031)">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2014</tspan>
                                </text><text x="241.71831003128665" y="253.09375" text-anchor="middle"
                                    font-family="sans-serif" font-size="12px" stroke="none" fill="#888888"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                    font-weight="normal" transform="matrix(1,0,0,1,0,7.2031)">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2013</tspan>
                                </text><text x="201.96885999217832" y="253.09375" text-anchor="middle"
                                    font-family="sans-serif" font-size="12px" stroke="none" fill="#888888"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                    font-weight="normal" transform="matrix(1,0,0,1,0,7.2031)">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2012</tspan>
                                </text><text x="162.32801500782165" y="253.09375" text-anchor="middle"
                                    font-family="sans-serif" font-size="12px" stroke="none" fill="#888888"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                    font-weight="normal" transform="matrix(1,0,0,1,0,7.2031)">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2011</tspan>
                                </text><text x="122.68717002346499" y="253.09375" text-anchor="middle"
                                    font-family="sans-serif" font-size="12px" stroke="none" fill="#888888"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                    font-weight="normal" transform="matrix(1,0,0,1,0,7.2031)">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2010</tspan>
                                </text><text x="83.04632503910832" y="253.09375" text-anchor="middle"
                                    font-family="sans-serif" font-size="12px" stroke="none" fill="#888888"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                    font-weight="normal" transform="matrix(1,0,0,1,0,7.2031)">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2009</tspan>
                                </text><text x="43.296875" y="253.09375" text-anchor="middle" font-family="sans-serif"
                                    font-size="12px" stroke="none" fill="#888888"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                    font-weight="normal" transform="matrix(1,0,0,1,0,7.2031)">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2008</tspan>
                                </text>
                                <path fill="none" stroke="#188ae2"
                                    d="M43.296875,240.59375C53.23423750977708,213.64453125,73.10896252933125,154.3857429890561,83.04632503910832,132.796875C92.95653628519749,111.26699298905609,112.77695877737582,68.11875,122.68717002346499,68.11875C132.59738126955415,68.11875,152.41780376173247,113.932421875,162.32801500782165,132.796875C172.23822625391082,151.661328125,192.05864874608915,216.343139748632,201.96885999217832,219.034375C211.9062225019554,221.73298349863202,231.78094752150957,165.15068399452804,241.71831003128665,154.35625C251.6285212773758,143.59130899452802,271.44894376955415,140.881640625,281.3591550156433,132.796875C291.26936626173244,124.712109375,311.08978875391085,100.45781250000002,321,89.67812500000002"
                                    stroke-width="3" class="line_1"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                </path>
                                <path fill="none" stroke="#10c469"
                                    d="M43.296875,132.796875C53.23423750977708,119.322265625,73.10896252933125,73.50122050273598,83.04632503910832,78.8984375C92.95653628519749,84.28090800273598,112.77695877737582,169.1783203125,122.68717002346499,175.915625C132.59738126955415,182.6529296875,152.41780376173247,144.9240234375,162.32801500782165,132.796875C172.23822625391082,120.6697265625,192.05864874608915,78.8984375,201.96885999217832,78.8984375C211.9062225019554,78.8984375,231.78094752150957,132.796875,241.71831003128665,132.796875C251.6285212773758,132.796875,271.44894376955415,92.37304687499999,281.3591550156433,78.8984375C291.26936626173244,65.423828125,311.08978875391085,38.47460937500002,321,25.00000000000003"
                                    stroke-width="3" class="line_0"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                </path>
                                <circle cx="43.296875" cy="240.59375" r="0" fill="#ffffff" stroke="#999999"
                                    stroke-width="1" class="circle_line_1"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="83.04632503910832" cy="132.796875" r="0" fill="#ffffff" stroke="#999999"
                                    stroke-width="1" class="circle_line_1"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="122.68717002346499" cy="68.11875" r="0" fill="#ffffff" stroke="#999999"
                                    stroke-width="1" class="circle_line_1"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="162.32801500782165" cy="132.796875" r="0" fill="#ffffff" stroke="#999999"
                                    stroke-width="1" class="circle_line_1"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="201.96885999217832" cy="219.034375" r="0" fill="#ffffff" stroke="#999999"
                                    stroke-width="1" class="circle_line_1"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="241.71831003128665" cy="154.35625" r="0" fill="#ffffff" stroke="#999999"
                                    stroke-width="1" class="circle_line_1"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="281.3591550156433" cy="132.796875" r="0" fill="#ffffff" stroke="#999999"
                                    stroke-width="1" class="circle_line_1"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="321" cy="89.67812500000002" r="0" fill="#ffffff" stroke="#999999"
                                    stroke-width="1" class="circle_line_1"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="43.296875" cy="132.796875" r="0" fill="#ffffff" stroke="#999999"
                                    stroke-width="1" class="circle_line_0"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="83.04632503910832" cy="78.8984375" r="0" fill="#ffffff" stroke="#999999"
                                    stroke-width="1" class="circle_line_0"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="122.68717002346499" cy="175.915625" r="0" fill="#ffffff" stroke="#999999"
                                    stroke-width="1" class="circle_line_0"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="162.32801500782165" cy="132.796875" r="0" fill="#ffffff" stroke="#999999"
                                    stroke-width="1" class="circle_line_0"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="201.96885999217832" cy="78.8984375" r="0" fill="#ffffff" stroke="#999999"
                                    stroke-width="1" class="circle_line_0"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="241.71831003128665" cy="132.796875" r="0" fill="#ffffff" stroke="#999999"
                                    stroke-width="1" class="circle_line_0"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="281.3591550156433" cy="78.8984375" r="0" fill="#ffffff" stroke="#999999"
                                    stroke-width="1" class="circle_line_0"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="321" cy="25.00000000000003" r="0" fill="#ffffff" stroke="#999999"
                                    stroke-width="1" class="circle_line_0"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                            </svg>
                        </div>
                        <div class="col-md-7">
                            <div class="table-responsive">
                                <table class="table table-centered table-striped table-hover mb-0 alinear-centrado"
                                    id="tbArticulos">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Codigo de Proyecto</th>
                                            <th>Tipo de Proyecto </th>
                                            <th>Ganancia del Proyecto</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <th>1</th>
                                            <td>RS-12</td>
                                            <td>Routing and Switching</td>
                                            <th>$2000</th>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>CE-20</td>
                                            <td>Cerca Eléctrica</td>
                                            <th>$800</th>
                                        </tr>
                                        <tr>
                                            <th>3</th>
                                            <td>CA-84</td>
                                            <td>Circuito Acceso</td>
                                            <th>$600</th>
                                        </tr>
                                    </tbody>
                                </table>
                                <br />
                                <div style="text-align: right;">
                                    <label>Total: $3400</label>
                                </div>
                            </div>
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

<!-- Modal Reporte Clientes  -->
<div id="ModalGenerarReporteCliente" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xl modal-dialog-centered">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Reportes</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <h4>Clasificación de Clientes</h4>
                <br />
                <div class="form-group row " style="padding-left: 9%;">
                    <div class="row">
                        <div class="col-md-4" style="margin-right: 2%;">
                            <svg height="280" version="1.1" width="346" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                style="overflow: hidden; position: relative; left: -0.775px; top: -0.4px;">
                                <desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.3.0
                                </desc>
                                <defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><text x="30.796875"
                                    y="240.59375" text-anchor="end" font-family="sans-serif" font-size="12px"
                                    stroke="none" fill="#888888"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                    font-weight="normal">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">0</tspan>
                                </text>
                                <path fill="none" stroke="#adb5bd" d="M43.296875,240.5H321" stroke-opacity="0.1"
                                    stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                <text x="30.796875" y="186.6953125" text-anchor="end" font-family="sans-serif"
                                    font-size="12px" stroke="none" fill="#888888"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                    font-weight="normal">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">25</tspan>
                                </text>
                                <path fill="none" stroke="#adb5bd" d="M43.296875,186.5H321" stroke-opacity="0.1"
                                    stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                <text x="30.796875" y="132.796875" text-anchor="end" font-family="sans-serif"
                                    font-size="12px" stroke="none" fill="#888888"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                    font-weight="normal">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">50</tspan>
                                </text>
                                <path fill="none" stroke="#adb5bd" d="M43.296875,132.5H321" stroke-opacity="0.1"
                                    stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                <text x="30.796875" y="78.8984375" text-anchor="end" font-family="sans-serif"
                                    font-size="12px" stroke="none" fill="#888888"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                    font-weight="normal">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">75</tspan>
                                </text>
                                <path fill="none" stroke="#adb5bd" d="M43.296875,78.5H321" stroke-opacity="0.1"
                                    stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                <text x="30.796875" y="25.00000000000003" text-anchor="end" font-family="sans-serif"
                                    font-size="12px" stroke="none" fill="#888888"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                    font-weight="normal">
                                    <tspan dy="4.000000000000028"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">100
                                    </tspan>
                                </text>
                                <path fill="none" stroke="#adb5bd" d="M43.296875,25.5H321" stroke-opacity="0.1"
                                    stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                <text x="321" y="253.09375" text-anchor="middle" font-family="sans-serif"
                                    font-size="12px" stroke="none" fill="#888888"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                    font-weight="normal" transform="matrix(1,0,0,1,0,7.2031)">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2015</tspan>
                                </text><text x="281.3591550156433" y="253.09375" text-anchor="middle"
                                    font-family="sans-serif" font-size="12px" stroke="none" fill="#888888"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                    font-weight="normal" transform="matrix(1,0,0,1,0,7.2031)">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2014</tspan>
                                </text><text x="241.71831003128665" y="253.09375" text-anchor="middle"
                                    font-family="sans-serif" font-size="12px" stroke="none" fill="#888888"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                    font-weight="normal" transform="matrix(1,0,0,1,0,7.2031)">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2013</tspan>
                                </text><text x="201.96885999217832" y="253.09375" text-anchor="middle"
                                    font-family="sans-serif" font-size="12px" stroke="none" fill="#888888"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                    font-weight="normal" transform="matrix(1,0,0,1,0,7.2031)">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2012</tspan>
                                </text><text x="162.32801500782165" y="253.09375" text-anchor="middle"
                                    font-family="sans-serif" font-size="12px" stroke="none" fill="#888888"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                    font-weight="normal" transform="matrix(1,0,0,1,0,7.2031)">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2011</tspan>
                                </text><text x="122.68717002346499" y="253.09375" text-anchor="middle"
                                    font-family="sans-serif" font-size="12px" stroke="none" fill="#888888"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                    font-weight="normal" transform="matrix(1,0,0,1,0,7.2031)">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2010</tspan>
                                </text><text x="83.04632503910832" y="253.09375" text-anchor="middle"
                                    font-family="sans-serif" font-size="12px" stroke="none" fill="#888888"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                    font-weight="normal" transform="matrix(1,0,0,1,0,7.2031)">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2009</tspan>
                                </text><text x="43.296875" y="253.09375" text-anchor="middle" font-family="sans-serif"
                                    font-size="12px" stroke="none" fill="#888888"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                    font-weight="normal" transform="matrix(1,0,0,1,0,7.2031)">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2008</tspan>
                                </text>
                                <path fill="none" stroke="#188ae2"
                                    d="M43.296875,240.59375C53.23423750977708,213.64453125,73.10896252933125,154.3857429890561,83.04632503910832,132.796875C92.95653628519749,111.26699298905609,112.77695877737582,68.11875,122.68717002346499,68.11875C132.59738126955415,68.11875,152.41780376173247,113.932421875,162.32801500782165,132.796875C172.23822625391082,151.661328125,192.05864874608915,216.343139748632,201.96885999217832,219.034375C211.9062225019554,221.73298349863202,231.78094752150957,165.15068399452804,241.71831003128665,154.35625C251.6285212773758,143.59130899452802,271.44894376955415,140.881640625,281.3591550156433,132.796875C291.26936626173244,124.712109375,311.08978875391085,100.45781250000002,321,89.67812500000002"
                                    stroke-width="3" class="line_1"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                </path>
                                <path fill="none" stroke="#10c469"
                                    d="M43.296875,132.796875C53.23423750977708,119.322265625,73.10896252933125,73.50122050273598,83.04632503910832,78.8984375C92.95653628519749,84.28090800273598,112.77695877737582,169.1783203125,122.68717002346499,175.915625C132.59738126955415,182.6529296875,152.41780376173247,144.9240234375,162.32801500782165,132.796875C172.23822625391082,120.6697265625,192.05864874608915,78.8984375,201.96885999217832,78.8984375C211.9062225019554,78.8984375,231.78094752150957,132.796875,241.71831003128665,132.796875C251.6285212773758,132.796875,271.44894376955415,92.37304687499999,281.3591550156433,78.8984375C291.26936626173244,65.423828125,311.08978875391085,38.47460937500002,321,25.00000000000003"
                                    stroke-width="3" class="line_0"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                </path>
                                <circle cx="43.296875" cy="240.59375" r="0" fill="#ffffff" stroke="#999999"
                                    stroke-width="1" class="circle_line_1"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="83.04632503910832" cy="132.796875" r="0" fill="#ffffff" stroke="#999999"
                                    stroke-width="1" class="circle_line_1"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="122.68717002346499" cy="68.11875" r="0" fill="#ffffff" stroke="#999999"
                                    stroke-width="1" class="circle_line_1"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="162.32801500782165" cy="132.796875" r="0" fill="#ffffff" stroke="#999999"
                                    stroke-width="1" class="circle_line_1"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="201.96885999217832" cy="219.034375" r="0" fill="#ffffff" stroke="#999999"
                                    stroke-width="1" class="circle_line_1"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="241.71831003128665" cy="154.35625" r="0" fill="#ffffff" stroke="#999999"
                                    stroke-width="1" class="circle_line_1"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="281.3591550156433" cy="132.796875" r="0" fill="#ffffff" stroke="#999999"
                                    stroke-width="1" class="circle_line_1"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="321" cy="89.67812500000002" r="0" fill="#ffffff" stroke="#999999"
                                    stroke-width="1" class="circle_line_1"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="43.296875" cy="132.796875" r="0" fill="#ffffff" stroke="#999999"
                                    stroke-width="1" class="circle_line_0"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="83.04632503910832" cy="78.8984375" r="0" fill="#ffffff" stroke="#999999"
                                    stroke-width="1" class="circle_line_0"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="122.68717002346499" cy="175.915625" r="0" fill="#ffffff" stroke="#999999"
                                    stroke-width="1" class="circle_line_0"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="162.32801500782165" cy="132.796875" r="0" fill="#ffffff" stroke="#999999"
                                    stroke-width="1" class="circle_line_0"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="201.96885999217832" cy="78.8984375" r="0" fill="#ffffff" stroke="#999999"
                                    stroke-width="1" class="circle_line_0"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="241.71831003128665" cy="132.796875" r="0" fill="#ffffff" stroke="#999999"
                                    stroke-width="1" class="circle_line_0"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="281.3591550156433" cy="78.8984375" r="0" fill="#ffffff" stroke="#999999"
                                    stroke-width="1" class="circle_line_0"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="321" cy="25.00000000000003" r="0" fill="#ffffff" stroke="#999999"
                                    stroke-width="1" class="circle_line_0"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                            </svg>
                        </div>
                        <div class="col-md-7">
                            <div class="table-responsive">
                                <div class="table-responsive">
                                    <table class="table table-centered table-striped table-hover mb-0 alinear-centrado"
                                        id="">
                                        <thead>
                                            <tr>
                                                <th>Número Cliente</th>
                                                <th>Nombre</th>
                                                <th>Teléfono</th>
                                                <th>Correo</th>
                                                <th>Servicio</th>
                                                <th>Total</th>

                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Valeria Matamorros</td>
                                                <td>8888-8888</td>
                                                <td>vale@correo.com</td>
                                                <th>Circuito Acceso</th>
                                                <th>$600</th>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Kevin Bermudez</td>
                                                <td>8888-8888</td>
                                                <td>kevin@correo.com</td>
                                                <th>Routing and Switching</th>
                                                <th>$2000</th>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Ana Laura Salas</td>
                                                <td>8888-8888</td>
                                                <td>ana@correo.com</td>
                                                <th>Cerca Eléctrica</th>
                                                <th>$800</th>
                                            </tr>

                                        </tbody>
                                    </table>
                                    <br>
                                </div>
                                <br />
                            </div>
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

<!-- Modal Reporte Artículo  -->
<div id="ModalGenerarReporteArticulos" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xl modal-dialog-centered">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Reportes</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <h4>Clasificación de Artículos</h4>
                <br />
                <div class="form-group row " style="padding-left: 9%;">
                    <div class="row">
                        <div class="col-md-4" style="margin-right: 2%;">
                            <svg height="280" version="1.1" width="346" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                style="overflow: hidden; position: relative; left: -0.775px; top: -0.4px;">
                                <desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.3.0
                                </desc>
                                <defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><text x="30.796875"
                                    y="240.59375" text-anchor="end" font-family="sans-serif" font-size="12px"
                                    stroke="none" fill="#888888"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                    font-weight="normal">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">0</tspan>
                                </text>
                                <path fill="none" stroke="#adb5bd" d="M43.296875,240.5H321" stroke-opacity="0.1"
                                    stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                <text x="30.796875" y="186.6953125" text-anchor="end" font-family="sans-serif"
                                    font-size="12px" stroke="none" fill="#888888"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                    font-weight="normal">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">25</tspan>
                                </text>
                                <path fill="none" stroke="#adb5bd" d="M43.296875,186.5H321" stroke-opacity="0.1"
                                    stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                <text x="30.796875" y="132.796875" text-anchor="end" font-family="sans-serif"
                                    font-size="12px" stroke="none" fill="#888888"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                    font-weight="normal">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">50</tspan>
                                </text>
                                <path fill="none" stroke="#adb5bd" d="M43.296875,132.5H321" stroke-opacity="0.1"
                                    stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                <text x="30.796875" y="78.8984375" text-anchor="end" font-family="sans-serif"
                                    font-size="12px" stroke="none" fill="#888888"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                    font-weight="normal">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">75</tspan>
                                </text>
                                <path fill="none" stroke="#adb5bd" d="M43.296875,78.5H321" stroke-opacity="0.1"
                                    stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                <text x="30.796875" y="25.00000000000003" text-anchor="end" font-family="sans-serif"
                                    font-size="12px" stroke="none" fill="#888888"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                    font-weight="normal">
                                    <tspan dy="4.000000000000028"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">100
                                    </tspan>
                                </text>
                                <path fill="none" stroke="#adb5bd" d="M43.296875,25.5H321" stroke-opacity="0.1"
                                    stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                <text x="321" y="253.09375" text-anchor="middle" font-family="sans-serif"
                                    font-size="12px" stroke="none" fill="#888888"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                    font-weight="normal" transform="matrix(1,0,0,1,0,7.2031)">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2015</tspan>
                                </text><text x="281.3591550156433" y="253.09375" text-anchor="middle"
                                    font-family="sans-serif" font-size="12px" stroke="none" fill="#888888"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                    font-weight="normal" transform="matrix(1,0,0,1,0,7.2031)">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2014</tspan>
                                </text><text x="241.71831003128665" y="253.09375" text-anchor="middle"
                                    font-family="sans-serif" font-size="12px" stroke="none" fill="#888888"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                    font-weight="normal" transform="matrix(1,0,0,1,0,7.2031)">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2013</tspan>
                                </text><text x="201.96885999217832" y="253.09375" text-anchor="middle"
                                    font-family="sans-serif" font-size="12px" stroke="none" fill="#888888"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                    font-weight="normal" transform="matrix(1,0,0,1,0,7.2031)">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2012</tspan>
                                </text><text x="162.32801500782165" y="253.09375" text-anchor="middle"
                                    font-family="sans-serif" font-size="12px" stroke="none" fill="#888888"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                    font-weight="normal" transform="matrix(1,0,0,1,0,7.2031)">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2011</tspan>
                                </text><text x="122.68717002346499" y="253.09375" text-anchor="middle"
                                    font-family="sans-serif" font-size="12px" stroke="none" fill="#888888"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                    font-weight="normal" transform="matrix(1,0,0,1,0,7.2031)">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2010</tspan>
                                </text><text x="83.04632503910832" y="253.09375" text-anchor="middle"
                                    font-family="sans-serif" font-size="12px" stroke="none" fill="#888888"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                    font-weight="normal" transform="matrix(1,0,0,1,0,7.2031)">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2009</tspan>
                                </text><text x="43.296875" y="253.09375" text-anchor="middle" font-family="sans-serif"
                                    font-size="12px" stroke="none" fill="#888888"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                    font-weight="normal" transform="matrix(1,0,0,1,0,7.2031)">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2008</tspan>
                                </text>
                                <path fill="none" stroke="#188ae2"
                                    d="M43.296875,240.59375C53.23423750977708,213.64453125,73.10896252933125,154.3857429890561,83.04632503910832,132.796875C92.95653628519749,111.26699298905609,112.77695877737582,68.11875,122.68717002346499,68.11875C132.59738126955415,68.11875,152.41780376173247,113.932421875,162.32801500782165,132.796875C172.23822625391082,151.661328125,192.05864874608915,216.343139748632,201.96885999217832,219.034375C211.9062225019554,221.73298349863202,231.78094752150957,165.15068399452804,241.71831003128665,154.35625C251.6285212773758,143.59130899452802,271.44894376955415,140.881640625,281.3591550156433,132.796875C291.26936626173244,124.712109375,311.08978875391085,100.45781250000002,321,89.67812500000002"
                                    stroke-width="3" class="line_1"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                </path>
                                <path fill="none" stroke="#10c469"
                                    d="M43.296875,132.796875C53.23423750977708,119.322265625,73.10896252933125,73.50122050273598,83.04632503910832,78.8984375C92.95653628519749,84.28090800273598,112.77695877737582,169.1783203125,122.68717002346499,175.915625C132.59738126955415,182.6529296875,152.41780376173247,144.9240234375,162.32801500782165,132.796875C172.23822625391082,120.6697265625,192.05864874608915,78.8984375,201.96885999217832,78.8984375C211.9062225019554,78.8984375,231.78094752150957,132.796875,241.71831003128665,132.796875C251.6285212773758,132.796875,271.44894376955415,92.37304687499999,281.3591550156433,78.8984375C291.26936626173244,65.423828125,311.08978875391085,38.47460937500002,321,25.00000000000003"
                                    stroke-width="3" class="line_0"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                </path>
                                <circle cx="43.296875" cy="240.59375" r="0" fill="#ffffff" stroke="#999999"
                                    stroke-width="1" class="circle_line_1"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="83.04632503910832" cy="132.796875" r="0" fill="#ffffff" stroke="#999999"
                                    stroke-width="1" class="circle_line_1"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="122.68717002346499" cy="68.11875" r="0" fill="#ffffff" stroke="#999999"
                                    stroke-width="1" class="circle_line_1"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="162.32801500782165" cy="132.796875" r="0" fill="#ffffff" stroke="#999999"
                                    stroke-width="1" class="circle_line_1"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="201.96885999217832" cy="219.034375" r="0" fill="#ffffff" stroke="#999999"
                                    stroke-width="1" class="circle_line_1"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="241.71831003128665" cy="154.35625" r="0" fill="#ffffff" stroke="#999999"
                                    stroke-width="1" class="circle_line_1"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="281.3591550156433" cy="132.796875" r="0" fill="#ffffff" stroke="#999999"
                                    stroke-width="1" class="circle_line_1"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="321" cy="89.67812500000002" r="0" fill="#ffffff" stroke="#999999"
                                    stroke-width="1" class="circle_line_1"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="43.296875" cy="132.796875" r="0" fill="#ffffff" stroke="#999999"
                                    stroke-width="1" class="circle_line_0"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="83.04632503910832" cy="78.8984375" r="0" fill="#ffffff" stroke="#999999"
                                    stroke-width="1" class="circle_line_0"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="122.68717002346499" cy="175.915625" r="0" fill="#ffffff" stroke="#999999"
                                    stroke-width="1" class="circle_line_0"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="162.32801500782165" cy="132.796875" r="0" fill="#ffffff" stroke="#999999"
                                    stroke-width="1" class="circle_line_0"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="201.96885999217832" cy="78.8984375" r="0" fill="#ffffff" stroke="#999999"
                                    stroke-width="1" class="circle_line_0"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="241.71831003128665" cy="132.796875" r="0" fill="#ffffff" stroke="#999999"
                                    stroke-width="1" class="circle_line_0"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="281.3591550156433" cy="78.8984375" r="0" fill="#ffffff" stroke="#999999"
                                    stroke-width="1" class="circle_line_0"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="321" cy="25.00000000000003" r="0" fill="#ffffff" stroke="#999999"
                                    stroke-width="1" class="circle_line_0"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                            </svg>
                        </div>
                        <div class="col-md-7">
                            <div class="table-responsive">
                                <div class="table-responsive">
                                    <table class="table table-centered table-striped table-hover mb-0 alinear-centrado"
                                        id="">
                                        <thead>
                                            <tr>
                                                <th>Código</th>
                                                <th>Nombre</th>
                                                <th>Cantidad Proyectos en el que ha sido utilizado</th>
                                                <th>Precio</th>
                                                <th>Costo de Adquisición</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td>R1000S</td>
                                                <td>SUBWOOFER KLIPSCH 10 PULGADAS</td>
                                                <td>25</td>
                                                <td>$60</td>
                                                <th>$45</th>
                                            </tr>
                                            <tr>
                                                <td>DS-7616NI-K1(B)</td>
                                                <td>NVR 16ch, 8MP H265+, 1 Sata</td>
                                                <td>5</td>
                                                <th>$100</th>
                                                <th>$70</th>
                                            </tr>
                                            <tr>
                                                <td>DSCPC5108</td>
                                                <td>MOD EXP, CABLE, 8 ZONAS, POWERSERIES</td>
                                                <td>3</td>
                                                <th>$3500</th>
                                                <th>$270</th>
                                            </tr>

                                        </tbody>
                                    </table>
                                    <br>
                                </div>
                                <br />
                            </div>
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

<!-- Modal Filtrar Clientes -->
<div id="ModalListaClientes" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xl modal-dialog-centered">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Filtrar Clientes</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <br />
                <div class="form-group row">
                    <div class="table-responsive">
                        <table class="table table-centered table-striped table-hover mb-0 alinear-centrado"
                            id="">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Número Cliente</th>
                                    <th>Nombre</th>
                                    <th>Teléfono</th>
                                    <th>Correo</th>
                                    <th>Provincia</th>
                                    <th>Cantón</th>
                                    <th>Distrito</th>                                 
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td><input type="checkbox" id="cliente" name="cliente"></td>
                                    <td>1</td>
                                    <td>Valeria Matamorros</td>
                                    <td>8888-8887</td>
                                    <td>vale@correo.com</td>
                                    <td>San Jose</td>
                                    <td>Goicoechea</td>
                                    <td>El Carmen</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" id="cliente" name="cliente"></td>
                                    <td>2</td>
                                    <td>Kevin Bermudez</td>
                                    <td>8888-8520</td>
                                    <td>kevin@correo.com</td>
                                    <td>Cartago</td>
                                    <td>El Guarco</td>
                                    <td>San Isidro</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" id="cliente" name="cliente"></td>
                                    <td>3</td>
                                    <td>Ana Laura Salas</td>
                                    <td>8888-3047</td>
                                    <td>ana@correo.com</td>
                                    <td>Heredia</td>
                                    <td>Santo Domingo</td>
                                    <td>San Vicente</td>
                                </tr>

                            </tbody>
                        </table>
                        <br>
                    </div> <!-- end .table-responsive-->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primo" data-toggle="modal" data-target="#ModalTipoProyecto"
                    data-dismiss="modal">Filtar</button>
            </div>
        </div>

    </div>
</div>

<!-- Modal Filtrar Artículos-->
<div id="ModalListaArtículos" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xl modal-dialog-centered">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Filtrar Artículos</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <br />
                <div class="form-group row">
                    <div class="table-responsive">
                        <table class="table table-centered table-striped table-hover mb-0 alinear-centrado"
                            id="">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Proveedor</th>
                                    <th>Marca</th>
                                    <th>Costo</th>
                                    <th>Unidad de medida</th>
                                    <th>Tipo</th>                             
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td><input type="checkbox" id="material" name="material"></td>
                                    <td>R1000S</td>
                                    <td>SUBWOOFER KLIPSCH 10 PULGADAS</td>
                                    <td>Proveedor 1</td>
                                    <td>Marca 1</td>
                                    <th>$45</th>
                                    <th>ea</th>
                                    <th>Interfaz</th>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" id="material" name="material"></td>
                                    <td>DSCPC5108</td>
                                    <td>MOD EXP, CABLE, 8 ZONAS, POWERSERIES</td>
                                    <td>Proveedor 2</td>
                                    <td>Marca 2</td>
                                    <th>$80</th>
                                    <th>ea</th>
                                    <th>Audio</th>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" id="material" name="material"></td>
                                    <td>DS-7616NI-K1(B)</td>
                                    <td>NVR 16ch, 8MP H265+, 1 Sata</td>
                                    <td>Proveedor 2</td>
                                    <td>Marca 2</td>
                                    <th>$60</th>
                                    <th>ea</th>
                                    <th>Grabador</th>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                    </div> <!-- end .table-responsive-->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primo" data-toggle="modal" data-target="#ModalTipoProyecto"
                    data-dismiss="modal">Filtrar</button>
            </div>
        </div>

    </div>
</div>

<script language="javascript">
    function enableDisable(bEnable, textBoxID) {
        document.getElementById(textBoxID).disabled = !bEnable
    }

    $(document).ready(function () {
        $('#tbClientes').DataTable({
            "paging": true,
        });
    });
</script>
@endsection