<!doctype html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body style="background-color: #adbdbd;">
@if(Session::has('status'))
<div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>{{Session::get('status')}}</strong>
</div>
@endif
<br>
<br>
<br>
<br>
<br>
<br>
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" class="">
            <!--div class="card-header">{{ __('Crear nueva contraseña') }}</div-->

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="alinear-centrado">
                        <img src="..\images\Logo.PNG" alt="LOGO SPT" width="20%"
                             height="70%"/>
                    </div>
                    <br>
                    <h4 class="text-uppercase mt-0 mb-3 alinear-centrado">Cambiar Contraseña</h4>
                    <p class="mb-0 font-13 alinear-centrado">
                        Ingrese su correo electrónico y te enviaremos</p>
                    <p class=" mb-0 font-13 alinear-centrado">
                        un link para cambiar la contraseña </p>
                    <br>
                    <div class=" alinear-centrado">
                        <label for="email" class="col-form-label ">{{ __('Digite su correo')
                                    }}</label>

                    </div>
                    <div class="" style=" margin-left:25%">
                        <input id="email" type="email"
                               class="form-control col-8 @error('email') is-invalid @enderror" name="email"
                               value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                    <br/>
                    <br/>
                <!--div class="form-group row mb-0">
                                    <div class="col-md- offset-md-4">
                                        <button type="submit" class="btn btn-primo">
                                            {{ __('Enviar correo') }}
                    </button>
                </div>
            </div>
            <br>
            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button onclick="{{ url('/Login') }}" class="btn btn-eliminar">
                                            {{ __('Cancelar') }}
                    </button>

                </div>
            </div-->
                    <div class="alinear-centrado">
                        <!--button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <div style="text-align: center;">
                                <button type="submit" class="btn btn-group btn-primo">Guardar Instalación</button>
                            </div-->


                        <button type="submit" class="btn btn-primo mb-2">
                            {{ __('Reiniciar contraseña') }}
                        </button>
                        <br>
                        <a class="btn btn-cerrar mb-2" href="{{ route('login') }}">
                            {{ __('Cancelar') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</body>

</html>
