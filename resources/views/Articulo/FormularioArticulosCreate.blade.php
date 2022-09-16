@extends('layouts.app')

@section('title')
<h2 class="page-title-main">Artículos</h2>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <!-- Form row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <form action="/articulo" method="post">
                        @csrf
                        <h4>Información del Artículo</h4>
                        <br />
                        @include('Articulo.FormularioArticulos')
                        <div style="text-align: center;">
                            <button type="submit" id="btnReservar" class="btn btn-group btn-primo">Guardar
                                Artículo</button>
                        </div>
                    </form>
                </div>
                <!--Fin de info del articulos-->
                <!--Tabla de articulos-->
                @include('Articulo.TablaArticulos')
                <!--Fin Tabla de articulos-->
            </div>
        </div>
    </div>
</div>
<script language="javascript">
    $(document).ready(function () {
        $('#tbArticulos').DataTable({
            "paging": true,
        });
    });
    
    $(document).ready(function () {
        $("#costo").on("keypress keyup blur", function (event) {
            ValidarDecimales(event);
        });        
    });
</script>
@endsection