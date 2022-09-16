@php
    if (!isset($aux))
        $aux='';
@endphp
@csrf
<div class="form-row">
    <div class="form-group col-md-4">
        <label for="userID" class="col-form-label">Número de cliente</label>
        <input type="number" class="form-control{{ $errors->has('userID') ? ' border-danger' : ''}}" name="userID"
               id="{{$aux}}userID" placeholder="Número de cliente" disabled
               value="@if(isset($user->userID)) {{$user->userID}} @endif">
    </div>
    <div class="form-group col-md-8">
        <label for="txtname" class="col-form-label">Nombre del Cliente:</label>
        <input type="text" class="form-control{{ $errors->has('name') ? ' border-danger' : ''}}" id="{{$aux}}name"
               name="name" placeholder="Nombre Cliente" value="@if(isset($user->name)) {{$user->name}} @endif">
        @if ($errors->has('name'))
        <small class="form-text text-danger">El campo nombre del cliente es obligatorio</small>
        @endif
    </div>
</div>
<br/>
<div class="form-row">
    <div class="form-group col-md-4">
        <div class="form-group col-xs-6">
            <label for="txtidentificacion" class="col-form-label">Identificación</label>
            <input type="text" class="form-control{{ $errors->has('identificacion') ? ' border-danger' : ''}}"
                   id="{{$aux}}identificacion" name="identificacion" placeholder="Identificación"
                   value="@if(isset($user->identificacion)) {{$user->identificacion}} @endif" disabled>
        </div>
        <div class="form-group col-xs-6">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="{{$aux}}chkidentificacion"
                       onclick="enableDisable(this.checked, '{{$aux}}identificacion');">
                <label class="custom-control-label" for="{{$aux}}chkidentificacion">Usar
                    identificación</label>
            </div>
        </div>
    </div>
    <div class="form-group col-md-4">
        <label for="txtelefono" class="col-form-label">Teléfono del Cliente</label>
        <input type="number" class="form-control{{ $errors->has('telefono') ? ' border-danger' : ''}}"
               id="{{$aux}}telefono" name="telefono" placeholder="Número de Telefono"
               value="@if(isset($user->telefono)) {{$user->telefono}} @endif">
            @if ($errors->has('telefono'))
            <small class="form-text text-danger">El campo teléfono del cliente es obligatorio</small>
            @endif
    </div>
    <div class="form-group col-md-4">
        <label for="txtemail" class="col-form-label">Correo del Cliente</label>
        <input type="email" class="form-control{{ $errors->has('email') ? ' border-danger' : ''}}" id="{{$aux}}email"
               name="email" placeholder="correo@electronico.com"
               value="@if(isset($user->email)) {{$user->email}} @endif">
               @if ($errors->has('email'))
               <small class="form-text text-danger">El campo correo del cliente es obligatorio</small>
               @endif
    </div>
</div>
<br/>
<h4>Domicilio</h4>
<br/>
<div class="form-row">
    <div class="form-group col-md-4">
        <label for="ddProvincia" class="col-form-label">Provincia</label>
        <select id='{{$aux}}provincia' name='provincia' class='provincia form-control'
                onchange='obtenerValorProvincia("{{$aux}}")'>
        </select>
        <input type="hidden" id="{{$aux}}texto_provincia" name="texto_provincia" value="">
        <!--Select provincia es = a user provincia imprimir con selected
            Aqui se carga el drop-down de Provincia-->
    </div>
    <div class="form-group col-md-4">
        <label for="canton" class="col-form-label" name="canton">Cantón</label>
        <select id='{{$aux}}canton' class='canton form-control' name="canton" onchange='obtenerValorCanton("{{$aux}}")'>
            <option value="" disabled selected>Seleccione una Provincia</option>
        </select>
        <input type="hidden" id="{{$aux}}texto_canton" name="texto_canton" value="">
    </div>
    <div class="form-group col-md-4">
        <label for="distrito" class="col-form-label" name="distrito">Distrito</label>
        <select id='{{$aux}}distrito' name='distrito' class='distrito form-control'
                onchange='nombreDistrito("{{$aux}}")'>
            <option value="" disabled selected>Seleccione una Provincia</option>
        </select>
        <input type="hidden" id="{{$aux}}texto_distrito" name="texto_distrito" value="">
    </div>
</div>
<br/>
<div class="form-row">
    <div class="form-group col-md-12">
        <input type="hidden" name="rol" id="rol" value="4">
        <label for="otraSenia" class="col-form-label">Otras Señas</label>
        <input type="otraSenia" class="form-control{{ $errors->has('otraSenia') ? ' border-danger' : ''}}"
               id="{{$aux}}otraSenia"
               name="otraSenia" placeholder="Otras señas"
               value="@if(isset($user->otraSenia)) {{$user->otraSenia}} @endif">
               <small class="form-text text-danger">{!! $errors->first('otraSenia') !!}</small>
    </div>
</div>

