@php
if (!isset($aux))
$aux='';
@endphp
@csrf
<br />
<h4>Información de las citas de Instalación</h4>
<br />
<div class="form-row">
    <div class="form-group col-md-4">
        <label for="txtNombreCliente" class="col-form-label">Nombre Cliente</label>
        <input type="text" class="form-control" id="{{$aux}}nombre" name="nombre" placeholder="Cliente" readonly>

    </div>
    <div class="form-group col-md-3">
        <label for="txtCodigoProyecto" class="col-form-label">Código de Proyecto</label>
        <input type="text" class="form-control" id="{{$aux}}CodigoProyecto" name="txtCodigoProyecto" placeholder="Proyecto" readonly>
    </div>
    <div class="form-group col-md-3">
        <label for="fk_cotizacionID" class="col-form-label">Número de Cotización</label>
        <input type="text" class="form-control" id="{{$aux}}codigoCotizacion" name="codigoCotizacion" placeholder="Cotizacion" readonly>
        <input type="text" class="form-control" id="{{$aux}}fk_cotizacionID" name="fk_cotizacionID" style="display:none">
    </div>

    <div class="form-group col-md-2">
        <label for="txtNombreCliente" class="col-form-label">Filtrar Proyecto</label><br />
        <button type="button" class="btn col-md-12" id="btnFiltrar" onclick="showFilterProject('{{$aux}}')" style="text-align: center; background-color: #F2A54E;">Proyectos
        </button>

    </div>
</div>
<br />
<div class="form-row ">
    <div class="form-group col-md-8">
        <label for="fk_tecnicoID" class="col-form-label {{ $errors->has('fk_tecnicoID') ? ' border-danger' : ''}}">Técnico</label>
        <select id="{{$aux}}fk_tecnicoID" name="fk_tecnicoID">
        <option>Elegir</option>
            @foreach($tecnicos as $tecnico)
            <option value="{{$tecnico->userID}}">{{$tecnico->name}}</option>
            @endforeach            
        </select>
        @if ($errors->has('fk_tecnicoID'))
        <small class="form-text text-danger">El campo técnico es obligatorio</small>
        @endif
    </div>
    <div class="form-group col-md-4">
        <label for="fechaHora" class="col-form-label{{ $errors->has('fechaHora') ? ' border-danger' : ''}}">Fecha y Hora</label>
        <input type="datetime-local" lang="es-CR" class="form-control" id="{{$aux}}fechaHora" name="fechaHora" >
        @if ($errors->has('fechaHora'))
        <small class="form-text text-danger">{{$errors->first('fechaHora')}}</small>
        @endif
    </div>
</div>
<br />
<div class="form-row ">
    <div class="form-group col-md-12">
        <label for="ubicacion" class="col-form-label {{ $errors->has('ubicacion') ? ' border-danger' : ''}}">Ubicación</label>
        <input type="text" class="form-control" id="{{$aux}}ubicacion" name="ubicacion" placeholder="Ubicación Waze">
        @if ($errors->has('ubicacion'))
        <small class="form-text text-danger">El campo ubicación es obligatorio</small>
        @endif
    </div>
</div>
<br />
