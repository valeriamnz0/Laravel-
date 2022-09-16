@extends('layouts.app')

@section('title')
    <h2 class="page-title-main">Clientes</h2>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <!-- Form row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <form action="/cliente" method="post">
                            <h4>Información del Cliente</h4>
                            <br/>
                            @include('Cliente.FormularioClientes')
                            <div style="text-align: center;">
                                <button type="submit" id="btnReservar" class="btn btn-group btn-primo">Guardar
                                    Cliente
                                </button>
                            </div>
                        </form>
                    </div>
                    <!--Fin de info del cleintes-->
                    <!--Tabla de clientes-->
                @include('Cliente.TablaClientes')
                <!--Fin Tabla de clientes-->
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/domicilioapi.js') }}" defer></script>
    <script>
        let formularioCliente = 1;
        const users = {!! json_encode($users) !!};
        let provinces = {!! json_encode($provinces) !!};
        const _token = '{!! csrf_token() !!}';
        const provincesUrl = '{!!route('getProvinces') !!}';

        function openModalEdit(id) {
            if ($.isEmptyObject(provinces))
                return;
            const user = users.find(user => user.userID == id)
            $('#form_client').attr('action', "/cliente/" + id);
            $('#edit_userID').val(user.userID);
            if (user.identificacion)
                $('#edit_chkidentificacion').val(true).change();
            else
                $('#edit_chkidentificacion').val(false).change();
            $('#edit_identificacion').val(user.identificacion ?? '');
            $('#edit_name').val(user.name);
            $('#edit_email').val(user.email);
            $('#edit_telefono').val(user.telefono);
            let province = filterByName(provinces, user.provincia);
            $('#edit_provincia').val(province).change();
            $('#edit_otraSenia').val(user.otraSenia).change();
            let canton = filterByName(provinces[province].cantones, user.canton);
            $('#edit_canton').val(canton).change();
            let distrito = filterByName(provinces[province].cantones[canton].distritos, user.distrito);
            $('#edit_distrito').val(distrito).change();

            $('#ModalFormularioEdit').modal('show');
        }

        function filterByName(objects, name) {
            for (const key in objects) {
                if (objects[key].name == name)
                    return key;
            }
            return 0;
        }

        function addCustomersToTable() {
            let html = '';
            for (const user of users) {
                html += '<tr><td>' + user.userID + '</td><td>' + user.name + '</td><td>' + (user.identificacion ?? '') + '</td><td>' + user.telefono + '</td><td>' + user.email + '</td><td>' + user.provincia + '</td><td>' + user.canton + '</td><td>' + user.distrito + '</td><td><button onclick="openModalEdit(' + user.userID + ')" class="btn btn-group-middle btn-editar"><i class="fas fa-pencil-alt"></i></button></td></tr>';
            }
            $('#body_client').html(html)
        }

        function enableDisable(bEnable, textBoxID) {
            document.getElementById(textBoxID).disabled = !bEnable
        }
    </script>
@endpush
