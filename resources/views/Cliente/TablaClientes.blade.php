<div class="card-box">
    <h4>Lista de Clientes</h4>
    <br/>
    <div class="form-group row">
        <div class="table-responsive">
            <table class="table table-centered table-striped table-hover mb-0 alinear-centrado" id="tbClientes">
                <thead>
                <tr>
                    <th>Número de Cliente</th>
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
                <tbody id="body_client">
                </tbody>
            </table>
            <br>
        </div> <!-- end .table-responsive-->
    </div>
</div>
@include('Cliente.FormularioClientesEdit', ['aux'=>'edit_'])
