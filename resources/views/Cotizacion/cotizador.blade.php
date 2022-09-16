@extends('layouts.app')

@section('title')
<h2 class="page-title-main">Cotizador de Artículos</h2>
@endsection

@section('content')
@include('Cotizacion.AgregarMaterialModal')

<div class="row justify-content-center">
    <div class="col-md-12">
        <!-- Form row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <h4>Información General</h4>
                    <br />
                    <form action="/cotizacion" method="post" enctype="multipart/form-data" name="cotizador">
                    @csrf
                    @isset($proyecto)
                    @isset($cliente)
                    @isset($tipoProyecto)
                    @isset($codigoCotizacion)
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="txtnumCliente" class="col-form-label">Número de cliente</label>
                            <input type="text" class="form-control" id="txtnumCliente"
                                placeholder="Número de cliente" value="{{$cliente->userID}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="form-group col-xs-6">
                                <label for="txtidentificacion" class="col-form-label">Identificación</label>
                                <input type="text" class="form-control" id="txtidentificacion"
                                    placeholder="Identificación" value="{{$cliente->identificacion}}" readonly>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="ddTipoProyecto" class="col-form-label">Tipo de proyecto</label>
                            <!--select id="ddTipoProyecto" class="form-control">
                                <option>Elegir</option>
                                <option value="1">Circuito cerrado de TV</option>
                                <option value="2">Alarma de robo</option>
                                <option value="3">Control de acceso</option>
                                <option value="4">Cerca electrica</option>
                                <option value="5">Cableado estructurado</option>
                                <option value="6">Routing & Switching</option>
                            </select-->
                            <input type="text" class="form-control" id="ddTipoProyecto"
                                value="{{$tipoProyecto->nombre}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="txtCotizadoPor" class="col-form-label">Cotizado por:</label>
                            <input type="text" class="form-control" id="txtCotizadoPor"
                                placeholder="Número de cliente" value="{{ auth()->user()->name }}" readonly>
                        </div>
                    </div>
                    <table>
                        <tbody class="tbodyMaterialesHidden" style="display:none">
                        </tbody>
                    </table>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label class="col-md-2 col-form-label" for="dFecha">Fecha</label>
                            <!--div class="col-md-12"-->
                            <input class="form-control" id="dFecha" type="date" name="dFecha" 
                            value="{{date("Y-m-d")}}"  readonly>
                            <!--/div-->
                        </div>

                        <div class="form-group col-md-3">
                            <label for="txtNoProyecto" class="col-form-label">Código del Proyecto</label>
                            <input type="text" class="form-control" id="txtNoProyecto"
                                value="{{$proyecto->codigoProyecto}}" readonly>
                                <input type="hidden" name="txtProyectoID" value="{{$proyecto->proyectoID}}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="txtCodCotizacion" class="col-form-label">Código de Cotización</label>
                            <input type="text" class="form-control" id="txtCodCotizacion" name="txtCodCotizacion"
                                value="{{$codigoCotizacion}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="ddExonerado" class="col-form-label">Es exonerado</label>
                            <select id="ddExonerado" class="form-control" name="ddExonerado">
                                @isset($esExonerado)
                                @foreach ($esExonerado as $booleano => $valor)
                                    <option value="{{$valor}}">{{$booleano}}</option>
                                @endforeach
                                @endisset
                            </select>
                        </div>

                    </div>
                    <!-- Info del cliente cargada automáticamente-->
                    <br />
                    <h4>Infomación del cliente</h4>
                    <br />
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="txtNombreCli" class="col-form-label">Nombre del Cliente</label>
                            <input type="text" class="form-control" id="txtNombreCli"
                                placeholder="Nombre del cliente" value="{{$cliente->name}}" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="txtNumeroCli" class="col-form-label">Número de Teléfono</label>
                            <input type="text" class="form-control" id="txtNumeroCli"
                                placeholder="Número de telefono" value="{{$cliente->telefono}}" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="txtCorreoCli" class="col-form-label">Correo electrónico</label>
                            <input type="text" class="form-control" id="txtCorreoCli"
                                placeholder="Correo del cliente" value="{{$cliente->email}}" disabled>
                        </div>
                    </div>
                    <div class="form-row">
                        <!-- Info del cliente cargada automáticamente-->
                        <div class="form-group col-md-12">
                            <label for="txtDireccionCli" class="col-form-label">Dirección</label>
                            <input type="text" class="form-control" id="txtDireccionCli"
                                placeholder="Dirección del cliente" value="{{$cliente->provincia.", ".
                            $cliente->canton.", ". $cliente->distrito}}" disabled>
                        </div>
                    </div>
                    @endisset
                    @endisset
                    @endisset
                    @else
                        <div class="form-group col-md-12">
                            <input type="text" class="form-control" id="txtMensajeCotizador"
                                placeholder="Correo del cliente"
                                value="Seleccione un proyecto en el módulo de proyectos para comenzar" disabled>
                        </div>
                    @endisset
            </div>
            <!--Fin de info del cliente-->
                <!--Tabla de articulos-->
                <div class="card-box">
                    <h4>Materiales</h4>
                    <br />
                    <div class="form-group row">
                        <div class="table-responsive">
                            <table class="table table-centered table-striped table-hover mb-0 alinear-centrado"
                                id="tbArticulos">
                                <thead>
                                    <tr>
                                        <th>#SKU</th>
                                        <th>Código</th>
                                        <th>Artículo</th>
                                        <th>Proveedor</th>
                                        <th>Cantidad</th>
                                        <th>un. / medida</th>
                                        <th>Costo ($)</th>
                                        <th>Margen ($)</th>
                                        <th>Precio ($)</th>
                                        <th>IVA ($)</th>
                                        <th>Precio Final ($)</th>
                                    </tr>
                                </thead>
                                <tbody class="tbodyMateriales">
                                </tbody>
                            </table>
                            <br>
                            <div style="text-align: center;">
                                <button type="button" class="btn-primo btn" data-toggle="modal"
                                    data-target="#ModalAgregarMateriales">Agregar Material</button>
                            </div>
                        </div> <!-- end .table-responsive  style="background-color:#02054a; border-color:#02054a"-->
                    </div>
                </div>
                <!--Fin Tabla de articulos-->
                <!-- Compra venta del dolar -->
                <div class="card-box">
                    <div class="row justify-content-md-center">
                        <div class="col-md-12 text-center">
                            <h4 class="">Tipo de cambio del dólar</h4>
                            @if(empty($dolares))
                            <small class="form-text text-danger">Error de comunicación: El cambio de dólar no pudo ser cargado</small>
                        @endif
                        </div>
                    </div>

                    <table class="table table-centered table-striped table-hover mb-0" id="tbChangeDollar">

                        <tbody>
                            <tr>
                                <td class="text-center col-md-5">Compra</td>
                                <td class="text-center">
                                    @isset($dolares)
                                    <input type=text id="txtChangeBuy" class="col-form-label " 
                                    value="{{$dolares["compraDolares"]}}" name="txtChangeBuy" readonly>
                                    @else
                                    <input type=text id="txtChangeBuy" class="col-form-label" name="txtChangeBuy"
                                    value="" placeholder="Introducir manualmente">
                                    @endisset</td>
                            </tr>
                            <tr>
                                <td class="text-center col-md-5">Venta</td>
                                <td class="text-center ">@isset($dolares)
                                    <input type=text id="txtChangeSell" class="col-form-label" name="txtChangeSell"
                                    value="{{$dolares["ventaDolares"]}}" readonly>
                                    @else
                                    <input type=text id="txtChangeSell" class="col-form-label" 
                                    value="" placeholder="Introducir manualmente" name="txtChangeSell">
                                    @endisset</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Fin - Compra venta del dolar -->
                <!-- Rubros-->
                <div class="card-box">
                    <h4>Rubros</h4>
                    <br />
                    <h5>Materiales complementarios de instalación </h5>
                    <div class="form-row">
                        <div class="form-group col-md-4"> 
                                <label for="txtCantidadMat" class="col-form-label {{ $errors->has('txtCantidadMat') ? ' text-danger' : ''}}">Cantidad de materiales</label>
                                <input type="number" class="form-control {{ $errors->has('txtCantidadMat') ? ' border-danger' : ''}}" id="txtCantidadMat" placeholder="Cantidad" name="txtCantidadMat"
                            onchange="calculaMateriales()">
                            @if ($errors->has('txtCantidadMat'))
                                <small class="form-text text-danger">La cantidad es inválida</small>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label for="txtCostoMat" class="col-form-label {{ $errors->has('txtCostoMat') ? ' text-danger' : ''}}">Costo de materiales</label>
                            <input type="number" class="form-control {{ $errors->has('txtCostoMat') ? ' border-danger' : ''}}" id="txtCostoMat" placeholder="Costo" name="txtCostoMat"
                            onchange="calculaMateriales()">
                            @if ($errors->has('txtCostoMat'))
                                <small class="form-text text-danger">El costo es inválido</small>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label for="txtMargenMat" class="col-form-label {{ $errors->has('txtMargenMat') ? ' text-danger' : ''}}">Margen</label>
                            <input type="number" class="form-control {{ $errors->has('txtMargenMat') ? ' border-danger' : ''}}" id="txtMargenMat" placeholder="Margen" name="txtMargenMat"
                            onchange="calculaMateriales()">
                            @if ($errors->has('txtMargenMat'))
                                <small class="form-text text-danger">El márgen es inválido</small>
                            @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="txtPrecioMat" class="col-form-label">Precio</label>
                            <input type="number" class="form-control" id="txtPrecioMat" placeholder="Precio" name="txtPrecioMat" readonly />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="txtivaMat" class="col-form-label">I.V.A.</label>
                            <input type="number" class="form-control" id="txtivaMat" placeholder="IVA" name="txtivaMat" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="txtPrecioFMat" class="col-form-label">Precio final</label>
                            <input type="number" class="form-control" id="txtPrecioFMat" placeholder="Precio Final" name="txtPrecioFMat"
                            readonly>
                        </div>
                    </div>
                    <h5>Mano de obra por instalación, programación y puesta en marcha</h5>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="txtCantidadMano" class="col-form-label {{ $errors->has('txtCantidadMano') ? ' text-danger' : ''}}">Cantidad de mano de obra</label>
                            <input type="number" class="form-control {{ $errors->has('txtCantidadMano') ? ' border-danger' : ''}}" id="txtCantidadMano" placeholder="Cantidad" name="txtCantidadMano"
                            onchange="calculaMano()">
                            @if ($errors->has('txtCantidadMano'))
                                <small class="form-text text-danger">La cantidad es inválida</small>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label for="txtCosto" class="col-form-label {{ $errors->has('txtCostoMano') ? ' text-danger' : ''}}">Costo de mano de obra</label>
                            <input type="number" class="form-control {{ $errors->has('txtCostoMano') ? ' border-danger' : ''}}" id="txtCostoMano" placeholder="Costo" name="txtCostoMano"
                            onchange="calculaMano()">
                            @if ($errors->has('txtCostoMano'))
                                <small class="form-text text-danger">El costo es inválido</small>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label for="txtMargen" class="col-form-label {{ $errors->has('txtMargenMano') ? ' text-danger' : ''}}">Margen</label>
                            <input type="number" class="form-control {{ $errors->has('txtMargenMano') ? ' border-danger' : ''}}" id="txtMargenMano" placeholder="Margen" name="txtMargenMano"
                            onchange="calculaMano()">
                            @if ($errors->has('txtMargenMano'))
                                <small class="form-text text-danger">El márgen es inválido</small>
                            @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="txtPrecio" class="col-form-label">Precio</label>
                            <input type="number" class="form-control" id="txtPrecioMano" placeholder="Precio" name="txtPrecioMano" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="txtiva" class="col-form-label">I.V.A.</label>
                            <input type="number" class="form-control" id="txtivaMano" placeholder="IVA" name="txtivaMano" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="txtPrecioFinal" class="col-form-label"> Precio final</label>
                            <input type="number" class="form-control" id="txtPrecioFMano" placeholder="Precio Final" name="txtPrecioFMano"
                            readonly>
                        </div>
                    </div>
                </div>
                <!-- Fin Rubros-->
                <div class="card-box">
                    <h4>Notas</h4>
                    <br />
                    <div class="form-row">
                        <div class="form-group col-md-12 " style=" justify-content: center">
                            <textarea class="form-control " rows="8" id="txtNotas" name="txtNotas">
                                Condiciones Generales: Forma de pago: Anticipo del 50%, 50% con la entrega. El pago de los costos de esta oferta será en 
                                Dólares oficiales de E.E.U.U. o en Colones Costarricenses, de acuerdo con el Tipo de Cambio establecido por el BAC San José 
                                en la fecha de pago. Tiempo de entrega: Entre 2 a 3 días posterior al inicio del trabajo, salvo condiciones imprevistas o de 
                                caso fortuito. Una vez vencido este plazo de la oferta podría ser modificada en sus condiciones y precios, sin previo aviso para 
                                el cliente. Formalización: Por medio de adelanto cancelado. Notas: Incluye: Suministro e instalación de equipos, con base en 
                                cantidades indicadas por el cliente. La Mano de Obra incluye: Instalación y conexionado de dispositivos, programación, 
                                asistencia técnica, inspección del proyecto y puesta en marcha del sistema. El horario considerado para laborar es diurno, 
                                entre las 08:00 a.m. y las 05:00 p.m. en días hábiles. Esta oferta no incluye:, tuberías ni canaletas ni trabajos adicionales 
                                producto de cambios en el diseño o por solicitud expresa del cliente, así como el suministro de equipos y accesorios extra que 
                                se requieran, debido a modificaciones en proceso o por solicitud del cliente, serán realizados y entregados, contra orden expresa
                                 del cliente debidamente emitida al aceptar el costo adicional. No se consideran trabajos de Obra Civil. No se incluyen costos de 
                                 destechados ni pasantes. Internet queda bajo responsabilidad del cliente asegurar que su servicio de internet soporte el cupo 
                                 mínimo requerido para el funcionamiento de los equipos.
                            </textarea>
                        </div>
                    </div>
                    <br />
                    <div style="text-align: center;">
                        <button type="submit" class="btn btn-primo">Guardar Cotizacion</button>
                    </div>
                </form>
                    <br />
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
</div>

@include('Cotizacion.pasaArticulos')
@isset($materiales)
@isset($rubros)
<script>
    window.addEventListener('DOMContentLoaded', (event) => {
        pasaMateriales({!! $materiales !!});
        cargaRubros({!! $rubros !!});
    });
</script>
@endisset
@endisset

<script language="javascript">
    function enableDisable(bEnable, textBoxID) {
        document.getElementById(textBoxID).disabled = !bEnable
    }

    $(document).ready(function () {
        $('#tbArticulos').DataTable({
            "paging": true,
        });
    });

    $(document).ready(function () {
        $('#tbAgregarMaterial').DataTable({
            "paging": true,
        });
    });


</script>
@endsection