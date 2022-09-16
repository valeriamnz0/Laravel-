<!DOCTYPE htlm>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
        .font {
            font-size: 9;
        }
        .fontTipoCambio {
            font-size: 8;

        }
        .estiloTH {
            font-weight: normal;
        }

        .colorTD {
            background-color: #02054a;
            color: #fff;
            text-align: center;
        }

        .tamanoTDLabels {
            width: 25%;
        }

        .tamanoTDInfo {
            width: 18%;
        }

        .espacio {
            padding-left: 4%;
        }

        .espacioDireccionCodigo {
            padding-left: 1%;
        }

        .estiloFooter {
            font-weight: bold;
            text-decoration: underline;
            background-color: #adbdbd;
            padding: 4px 6px 4px 6px;
            text-align: center!important;
        }

        .estiloFooterTD {
            padding-bottom: 0px;
            padding-left: 0px;
            padding-right: 0px;
            margin: 0px
        }

        .estiloFooterTitulo {
            font-weight: bold;
            text-decoration: underline;
            padding: 4px 6px 4px 6px;
        }

        .table-borderless>tbody>tr>td,
        .table-borderless>tbody>tr>th,
        .table-borderless>tfoot>tr>td,
        .table-borderless>tfoot>tr>th,
        .table-borderless>thead>tr>td,
        .table-borderless>thead>tr>th {
            border: none;
        }

        .table-border {
            border: 1.0px solid !important;
            border-color: black !important
        }

        .tipoCambioFondo {
            background-color: #C8E2F2;
        }

        .InfoReduccionEspacio {
            padding: 0px !important;
            margin: 0px !important;
            text-align: center !important;
        }

        .InfoReduccionEspacioDos {
            padding: 2px !important;
            margin: 0px !important;
            text-align: center !important;
        }
    </style>
    <title>SPT</title>

</head>

<body>

    <div class='headerPDF'>
        <!--Panel Logo y Info de la Empresa-->
        <div class='logoSPT' style="width: 15%;display: inline-block; margin-top:0%; padding-left: 6%;">
            <img src="{{$pic}}" style="width: 150px; height: 150px; ">
        </div>
        <div class="infoSPT" style="width: 65%; display: inline-block; text-align: center;  margin-top:0%;">
            <p style="color: #02054a; margin-top:0%;">Especialidades Técnicas Digitales SPT<br>
                San José, Costa Rica<br>
                Ced. Juridica: 3-102-77896<br>
                tel: +506 4030 7630 / cel: +506 6415 6692</p>
        </div>
    </div>

    <div><!--Div para información General del cliente-->

        <table class="table " style="margin-top: 1%;">
            <thead>
                <td class="colorTD font tamanoTDLabels">Identificación</td>
                <td class=" font tamanoTDInfo espacio">{{$infoGeneral->ClienteID}}</td>
                <td class="colorTD font tamanoTDLabels">Nombre del cliente</td>
                <td class=" font espacio">{{$infoGeneral->ClienteNombre}}</td>
            </thead>
        </table>
        <table class="table ">
            <thead>

                <td class="colorTD font tamanoTDLabels">Num. de Teléfono</td>
                <td class=" font tamanoTDInfo espacio">{{$infoGeneral->telefono}}</td>
                <td class="colorTD font tamanoTDLabels">Correo electrónico</td>
                <td class=" font espacio">{{$infoGeneral->email}}</td>

            </thead>
        </table>
        <table class="table ">
            <thead>

                <td class="colorTD font tamanoTDLabels">Código de Proyecto</td>
                <td class=" font tamanoTDInfo espacio">{{$infoGeneral->codigoProyecto}}</td>
                <td class="colorTD font tamanoTDLabels">Tipo de Proyecto</td>
                <td class=" font espacio">{{$infoGeneral->nombre}}</td>

            </thead>
        </table>
       
        <table class="table  ">
            <thead>
                <td class="colorTD font tamanoTDLabels">Fecha</td>
                <td class=" font tamanoTDInfo espacio">{{ date('d/m/Y H:i',strtotime($infoGeneral->fecha))}}</td>
                <td class="colorTD font tamanoTDLabels">Cotizado por</td>
                <td class="font espacio">{{$infoGeneral->CotizadoPorNombre}}</td>

            </thead>
        </table>
        <table class="table ">
            <thead>
                <td class="colorTD font tamanoTDLabels">Cod de Cotización</td>
                <td class="font espacioDireccionCodigo">{{$infoGeneral->codigoCotizacion}}</td>
            </thead>
        </table>
        <table class="table ">
            <thead>
                <td class="colorTD font tamanoTDLabels">Direccion</td>
                <td class=" font espacioDireccionCodigo">{{$infoGeneral->provincia}}, {{$infoGeneral->canton}}, {{$infoGeneral->distrito}}, 
                    {{$infoGeneral->otraSenia}} </td>
            </thead>
        </table>
    </div>

    <table class="table font"> <!--Tabla para Materiales-->
        <thead style="background-color: red; color: #fff;">
            <tr>
                <th class="estiloTH InfoReduccionEspacioDos">Descripción de artículo</th>
                <th class="estiloTH InfoReduccionEspacioDos">Cant</th>
                <th class="estiloTH InfoReduccionEspacioDos">Precio</th>
                <th class="estiloTH InfoReduccionEspacioDos">IVA</th>
                <th class="estiloTH InfoReduccionEspacioDos">Precio Final</th>
            </tr>
        </thead>
        <tbody style="text-align: center;">
            @foreach ($materiales as $material)
           
            <tr>

                <td>{{$material->nombre}}</td>
                <td>{{$material->cantidad}}</td>
                <td>$ {{ number_format( $material->precio, 2) }}</td>
                <td>$ {{ number_format( $material->iva, 2) }}</td>
                <td>$ {{ number_format( $material->precioFinal, 2) }}</td>
                $filas=$filas+1
            </tr>
            @endforeach

            <tr>
                <td colspan="5" style="text-align: center;">
                    <i>-------------------- Última línea --------------------</i>
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2" style="text-align: right;">
                    <p class="estiloFooterTitulo">Total Equipos</p>
                </td>
                <td colspan="1" style="padding-bottom: 0px; padding-left: 0px; padding-right: 0px; margin: 0px">
                    <p class="estiloFooter">$ {{ number_format( $materialesTotales[0]->PRECIO_CALCULADO, 2) }}</p>
                </td>
                <td colspan="1" style="padding-bottom: 0px; padding-left: 0px; padding-right: 0px; margin: 0px">
                    <p class="estiloFooter">$ {{ number_format( $materialesTotales[0]->IVA_CALCULADO, 2) }}</p>
                </td>
                <td colspan="1" style="padding-bottom: 0px; padding-left: 0px; padding-right: 0px; margin: 0px">
                    <p class="estiloFooter">$ {{ number_format( $materialesTotales[0]->PRECIOFINAL_CALCULADO,2 )}}</p>
                </td>
            </tr>
        </tfoot>
    </table>

    <table class="table font  table-borderless "><!--Tabla para Rubros-->
        <thead style="background-color: red; color: #fff;">
            <tr>
                <th class="estiloTH InfoReduccionEspacioDos"># Rubro</th>
                <th class="estiloTH InfoReduccionEspacioDos">Rubro Adicional</th>
                <th class="estiloTH InfoReduccionEspacioDos">Precio</th>
                <th class="estiloTH InfoReduccionEspacioDos">IVA</th>
                <th class="estiloTH InfoReduccionEspacioDos">Precio Final</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rubros as $rubro )
            <tr>
                <td class="InfoReduccionEspacioDos">{{$rubro->fk_rubrosCotizacionID}}</td>
                <td class="InfoReduccionEspacioDos">{{$rubro->rubroNombre}}</td>
                <td class="InfoReduccionEspacioDos">$ {{ number_format( $rubro->precio, 2) }}</td>
                <td class="InfoReduccionEspacioDos">$ {{ number_format( $rubro->iva, 2) }}</td>
                <td class="InfoReduccionEspacioDos">$ {{ number_format( $rubro->precioFinal, 2) }}</td>
            </tr>
            @endforeach
            
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2" style="text-align: right;">
                    <p class="estiloFooterTitulo ">Total rubros adicionales</p>
                </td>
                <td colspan="1" style="padding-bottom: 0px; padding-left: 0px; padding-right: 0px; margin: 0px">
                    <p class="estiloFooter">$ {{ number_format( $rubrosTotales[0]->PRECIO_CALCULADO, 2)}}</p>
                </td>
                <td colspan="1" style="padding-bottom: 0px; padding-left: 0px; padding-right: 0px; margin: 0px">
                    <p class="estiloFooter">$ {{ number_format( $rubrosTotales[0]->IVA_CALCULADO, 2) }}</p>
                </td>
                <td colspan="1" style="padding-bottom: 0px; padding-left: 0px; padding-right: 0px; margin: 0px">
                    <p class="estiloFooter">$ {{ number_format( $rubrosTotales[0]->PRECIOFINAL_CALCULADO, 2) }}</p>
                </td>
            </tr>
        </tfoot>
    </table>

    <table class="table fontTipoCambio table-borderless "><!--Tabla para Tipo de Cambio y Total Cotizacion-->
        <thead>
            <tr>
                <th width="25%" style="padding:0px; margin:0px;"></th>
                <th width="25%" style="padding:0px; margin:0px;"></th>
                <th colspan="4" class="estiloTH estiloFooterTD" style="background-color: #02054a; color: #fff;text-align: center; 
                padding:0px; margin:0px;">
                    <p class="estiloFooterTD">Total Cotización</p>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td colspan="1" class="table-border InfoReduccionEspacio">Moneda</td>
                <td colspan="1" class="table-border InfoReduccionEspacio">Subtotal</td>
                <td colspan="1" class="table-border InfoReduccionEspacio">IVA</td>
                <td colspan="1" class="table-border InfoReduccionEspacio">Precio Total</td>
            </tr>
            <tr>
                <td style="text-align: right;padding:0px; margin:0px;" class="estiloFooterTitulo">Tipo de Cambio </td>
                <td style="text-align: left;padding:0px; padding-left: 15px; margin:0px;" class="estiloFooterTitulo">
                    $ {{$infoGeneral->ventaDolar}}</td>
                <td colspan="1" class="table-border tipoCambioFondo InfoReduccionEspacio">Dólares</td>
                <td colspan="1" class="table-border tipoCambioFondo InfoReduccionEspacio">$ {{ number_format(($materialesTotales[0]->PRECIO_CALCULADO + $rubrosTotales[0]->PRECIO_CALCULADO), 2)}}</td>
                <td colspan="1" class="table-border tipoCambioFondo InfoReduccionEspacio">$ {{ number_format(($materialesTotales[0]->IVA_CALCULADO + $rubrosTotales[0]->IVA_CALCULADO), 2)}}</td>
                <td colspan="1" class="table-border tipoCambioFondo InfoReduccionEspacio">$ {{ number_format(($materialesTotales[0]->PRECIOFINAL_CALCULADO + $rubrosTotales[0]->PRECIOFINAL_CALCULADO), 2)}}</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td colspan="1" class="table-border InfoReduccionEspacio">Colones</td>
                <td colspan="1" class="table-border InfoReduccionEspacio"><span style="font-family: DejaVu Sans;">&#x20A1; </span>{{ number_format(($materialesTotales[0]->PRECIO_CALCULADO + $rubrosTotales[0]->PRECIO_CALCULADO) * $infoGeneral->ventaDolar, 2)}}</td>
                <td colspan="1" class="table-border InfoReduccionEspacio"><span style="font-family: DejaVu Sans;">&#x20A1; </span>{{ number_format(($materialesTotales[0]->IVA_CALCULADO + $rubrosTotales[0]->IVA_CALCULADO) * $infoGeneral->ventaDolar, 2)}}</td>/
                <td colspan="1" class="table-border InfoReduccionEspacio"><span style="font-family: DejaVu Sans;">&#x20A1; </span>{{ number_format(($materialesTotales[0]->PRECIOFINAL_CALCULADO + $rubrosTotales[0]->PRECIOFINAL_CALCULADO) * $infoGeneral->ventaDolar, 2)}}</td>
            </tr>
        </tbody>
    </table>

    <p style="text-align: justify; font-weight: bold;" class="font"><i><!--Párrafo Condiciones Generales-->
        {{$infoGeneral->notas}}
    </i></p>

<hr style="border-color: black; height:0.5px" >
<table style="width:100%">  <!-- Tabla para las cuentas bancarias-->
    <tr>
        <th rowspan="2" style="text-align: center;"><img src="{{$pic2}}" style="width: 70px; height: 40px; "></th>
        <td>($) CR601020000 <span style="color: red;">944511070</span> 2</td>
        <th rowspan="2" style="text-align: center;"><img src="{{$pic1}}" style="width: 50px; height: 50px; "></th>
        <td>($) CR83015201001048879056</td>
    </tr>
    <tr>
        <td><span style="font-family: DejaVu Sans;">(&#x20A1;) </span>CR7101020000 <span style="color: red;">944511088</span> 9</td>
        <td><span style="font-family: DejaVu Sans;">(&#x20A1;) </span>CR73015201001048879139</td>
    </tr>
</table>
<hr style="border-color: black;">

<p style="text-align: justify; " class="font"><i><!--Párrafo Forma de Pago-->
      <b><u>Forma de pago:</u></b> Anticipo del 50%, 50% con la entrega. <b><u>Oferta válida por</u></b>
      15 días. <b><u>Garantía del Equipo: </u></b>12 Meses contra defectos de fabricación. 
      <b><u>Formalización: </u></b> Por medio de adelanto cancelado.
</i></p>

</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>>