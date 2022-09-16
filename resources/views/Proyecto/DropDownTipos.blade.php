@csrf
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Tipo Proyecto</label>
                        <div class="col-sm-9">
                            <select id="ddTipoProyecto" name="ddTipoProyecto" class="form-control alinear-centrado {{ $errors->has('ddTipoProyecto') ? ' border-danger' : ''}}">
                                @isset($tipoProyectos)
                                @foreach ($tipoProyectos as $tipo)
                                    <option value="{{$tipo->tipoProyectoID}}">{{$tipo->nombre}}</option>  
                                @endforeach                            
                            @endisset
                            </select>
                        </div>
                    </div>
                <!--Fin Tabla de articulos-->
            </div>

            @isset($cliente)
            <input type="hidden" name="name" value="{{$cliente['name']}}">
            @isset($record)
            <input type="hidden" name="identificacion" value="{{$cliente['identificacion']}}">
            @endisset
            <input type="hidden" name="telefono" value="{{$cliente['telefono']}}">
            <input type="hidden" name="email" value="{{$cliente['email']}}">
            <input type="hidden" name="texto_provincia" value="{{$cliente['provincia']}}">
            <input type="hidden" name="texto_canton" value="{{$cliente['canton']}}">
            <input type="hidden" name="texto_distrito" value="{{$cliente['distrito']}}">
            <input type="hidden" name="otraSenia" value="{{$cliente['otraSenia']}}">
            <input type="hidden" name="rol" value="{{$cliente['rol']}}">
                @isset($cliente->userID)
                    {!! Form::hidden('esExistente', $cliente->userID) !!}
                @endisset
            @endisset