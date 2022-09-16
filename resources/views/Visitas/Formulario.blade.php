@csrf
@php
if (!isset($aux))
$aux='';
@endphp
<div class="form-row ">
    <div class="form-group col-md-12">
        <label for="fk_clienteID" class="col-form-label{{ $errors->has('fk_clienteID') ? ' border-danger' : ''}}">Cliente</label>
        <select id="{{$aux}}fk_clienteID" name="fk_clienteID" class="form-control">
            <option value="" selected disabled>Elegir un Cliente</option>
            @foreach($users as $user)
            <option value="{{$user->userID}}">{{$user->name}}</option>
            @endforeach
        </select>
        @if ($errors->has('fk_clienteID'))
        <small class="form-text text-danger">El campo cliente es obligatorio</small>
        @endif
    </div>
</div>
<br />
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="fk_vendedorID" class="col-form-label{{ $errors->has('fk_vendedorID') ? ' border-danger' : ''}}">Vendedor</label>
        <select id="{{$aux}}fk_vendedorID" name="fk_vendedorID" class="form-control">
            <option selected disabled>Elegir</option>
            @foreach($vendedores as $vendedor)
            <option value="{{$vendedor->userID}}">{{$vendedor->name}}</option>
            @endforeach          
        </select>
        @if ($errors->has('fk_vendedorID'))
        <small class="form-text text-danger">El campo vendedor es obligatorio</small>
        @endif
    </div>
    <div class="form-group col-md-6">
        <label for="fechaHora" class="col-form-label{{ $errors->has('fechaHora') ? ' border-danger' : ''}}">Fecha</label>
        <input type="datetime-local" lang="es-CR" class="form-control" id="{{$aux}}fechaHora" name="fechaHora" value="">
        @if ($errors->has('fechaHora'))
            <small class="form-text text-danger">{{$errors->first('fechaHora')}}</small>
        @endif
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-12">
        <label for="ubicacion" class="col-form-label">Ubicación</label>
        <input type="text" class="form-control" id="{{$aux}}ubicacion" name="ubicacion" placeholder="Ubicación Waze">
        @if ($errors->has('ubicacion'))
        <small class="form-text text-danger">El campo ubicación es obligatorio</small>
        @endif
    </div>
</div>
