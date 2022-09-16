<div class="card-box">
    <h4>Lista de Clientes</h4>
    <br />
    <div class="form-group row">
        <div class="table-responsive">
            <table class="table table-centered table-striped table-hover mb-0 alinear-centrado" id="tbClientes">
            <thead>
                    <tr>
                        <th>Número Cliente</th>
                        <th>Nombre</th>
                        <th>Identificación</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th>Provincia</th>
                        <th>Cantón</th>
                        <th>Distrito</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->identificacion}}</td>
                        <td>{{$user->telefono}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->provincia}}</td>
                        <td>{{$user->canton}}</td>
                        <td>{{$user->distrito}}</td>
                        <td><a class="btn btn-group-middle btn-editar" 
                        href="/cliente/{{ $user->id}}/edit"><i class="fas fa-pencil-alt"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
        </div> <!-- end .table-responsive-->
    </div>
</div>
