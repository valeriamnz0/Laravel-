<div class="form-row">
    <div class="form-group col-md-4">
        <label for="codigo" class="col-form-label">Código</label>
        <input type="text" class="form-control{{ $errors->has('codigo') ? ' border-danger' : ''}}" id="codigo" name="codigo" placeholder="Código" value="@if(isset($articulos->codigo)) {{$articulos->codigo}} @endif">
        <small class="form-text text-danger">{!! $errors->first('codigo') !!}</small>
    </div>
    <div class="form-group col-md-4">
        <div class="form-group col-xs-6">
            <label for="txtProveedor" class="col-form-label">Proveedor</label>
            <input type="text" class="form-control{{ $errors->has('proveedor') ? ' border-danger' : ''}}" id="proveedor" name="proveedor" placeholder="Proveedor" value="@if(isset($articulos->proveedor)) {{$articulos->proveedor}} @endif">
            <small class="form-text text-danger">{!! $errors->first('proveedor') !!}</small>
        </div>
    </div>
    <div class="form-group col-md-4">
        <label for="txtMarca" class="col-form-label">Marca</label>
        <input type="text" class="form-control{{ $errors->has('marca') ? ' border-danger' : ''}}" id="marca" name="marca" placeholder="Nombre de la Marca" value="@if(isset($articulos->marca)) {{$articulos->marca}} @endif">
        <small class="form-text text-danger">{!! $errors->first('marca') !!}</small>
    </div>
</div>
<br />
<div class="form-row">
    <div class="form-group col-md-4">
        <label for="txtCosto" class="col-form-label">Costo ($)</label>
        <input type="text" class="form-control{{ $errors->has('costo') ? ' border-danger' : ''}}" id="costo" name="costo" placeholder="Costo del Artículo" value="@if(isset($articulos->costo)) {{$articulos->costo}} @endif">
        <small class="form-text text-danger">{!! $errors->first('costo') !!}</small>
    </div>
    <div class="form-group col-md-4">
        <label for="txtMedida" class="col-form-label">Unidad de medida</label>
        <input type="text" class="form-control{{ $errors->has('unidadMedida') ? ' border-danger' : ''}}" id="unidadMedida" name="unidadMedida" placeholder="Nombre de la Marca" value="@if(isset($articulos->unidadMedida)) {{$articulos->unidadMedida}} @endif">
        <small class="form-text text-danger">{!! $errors->first('unidadMedida') !!}</small>
    </div>
    <div class="form-group col-md-4">
        <label for="tipoID" class="col-form-label">Tipo de Articulo</label>
        <select id="tipoID" name="tipoID" class="form-control">
            @isset($dropDownArticulos)
            @isset($articulo)
            @foreach($dropDownArticulos as $dpArticulos)
            @if($dpArticulos->tipoArticuloID == $articulos->fk_tipoArticuloID)
            <option value="{{$dpArticulos->tipoArticuloID}}" selected>{{$dpArticulos->descripcion}}
            </option>
            @else
            <option value="{{$dpArticulos->tipoArticuloID}}">{{$dpArticulos->descripcion}}
            </option>
            @endif
            @endforeach
            @else
            <option>Elegir
            </option>
            @foreach($dropDownArticulos as $dpArticulos)
            <option value="{{$dpArticulos->tipoArticuloID}}">{{$dpArticulos->descripcion}}
            </option>
            @endforeach
            @endisset
            @endisset
        </select>
        @if ($errors->has('fk_tipoArticuloID'))
        <small class="form-text text-danger">El campo vendedor es obligatorio</small>
        @endif
    </div>
</div>
<br />
<div class="form-row">
    <div class="form-group col-md-12">
        <label for="txtNombreArticulo" class="col-form-label">Nombre</label>
        <input type="text" class="form-control{{ $errors->has('nombre') ? ' border-danger' : ''}}" id="nombre" name="nombre" placeholder="Nombre del Artículo" value="@if(isset($articulos->nombre)) {{$articulos->nombre}} @endif">
        <small class="form-text text-danger">{!! $errors->first('nombre') !!}</small>
    </div>
</div>
<br />
<script language="javascript">
    function ValidarDecimales(event) {
        if (event.which >= 48 && event.which <= 57) {
            return true;
        } else if (event.which == 46) {
            return true;
        } else {
            event.preventDefault();
        }
    }
    $(document).ready(function() {
        $("#costo").on("keypress keyup blur", function(event) {
            ValidarDecimales(event);
        });
    });
</script>