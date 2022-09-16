<div class="card-box">
    <div class="form-row">
        <div class="form-group col-md-10">
            <h4>Lista de Citas Ventas</h4>
        </div>
        <div class="form-group col-md-2">
            <!--button class="btn btn-group-middle btn-primo">Agregar Usuario
                <i class="fas fa-user-plus fa-lg" href="#AgregarUsuarios"></i>
            </button-->
        </div>
    </div>
    <br />
    <div class="form-group row">
        <div class="table-responsive">
            <table class="table table-centered table-striped table-hover mb-0 alinear-centrado" id="tbCitas">
                <thead>
                    <tr>
                        <th>Número Cita</th>
                        <th>Número Cliente</th>
                        <th>Nombre</th>
                        <th>Fecha y hora</th>
                        <th>Ubicación</th>
                        <th>Vendedor</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="appointment_table">
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('Visitas.FormularioCitasEdit', ['aux'=>'edit_'])
@include('Visitas.DetallesVisita')