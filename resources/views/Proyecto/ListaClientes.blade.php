<div class="table-responsive">
    <table class="table table-centered table-striped table-hover mb-0 alinear-centrado"
        id="tbClientesExistente">
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
            @foreach ($users as $cli)
            <tr>
                <td>{{ Form::radio('numeroCliente', $cli->userID) }}</td>
                <td>{{$cli->userID}}</td>
                <td>{{$cli->name}}</td>
                <td>{{$cli->telefono}}</td>
                <td>{{$cli->email}}</td>
                <td>{{$cli->provincia}}</td>
                <td>{{$cli->canton}}</td>
                <td>{{$cli->distrito}}</td>
            </tr>
            <tr>
                @endforeach
        </tbody>
    </table>
    <br>
    {!! Form::hidden("proyectoID", null, ['id'=>'proyectoExistente']) !!}
</div> <!-- end .table-responsive-->
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-primo">Cotizar a este cliente</button>
</div>