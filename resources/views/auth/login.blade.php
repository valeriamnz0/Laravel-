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
</head>

<body style="background-color: #adbdbd;">
@if(Session::has('error_login'))
    <div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>{{Session::get('error_login')}}</strong>
    </div>
@endif
<br/>
<br/>
<br>
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

            <!--div class="card-header">{{ __('Ingresar') }}</div-->
                <br/>
                <div class="card-body p-2">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="alinear-centrado">
                            <img src="images\Logo.PNG" alt="LOGO SPT" width="20%" height="70%"/>
                        </div>
                        <br/>
                        <!--h4 class="text-uppercase mt-0 mb-3 alinear-centrado">Iniciar Sesión</h4-->
                    <!--div class="alinear-centrado">
                            <label for="email" class="col-form-label col-6">{{ __('Ingrese su usuario')
                                }}</label>
                            <div style=" margin-left:25%">
                                <input id="email" type="email"
                                    class="col-8 form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                    </div-->

                        <div class="col-6" style="margin-left: 26%;">
                            <div class="mb-3">                <!--Ingrese usuario panel-->
                                <label for="exampleInputEmail1" class="form-label">{{ __('Ingrese su usuario')}}</label>
                                <input id="email" type="email"
                                       class="col-12 form-control @error('email') is-invalid @enderror" name="email"
                                       value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>

                            <div class="mb-3">              <!--Ingrese contraseña panel-->
                                <label for="password" class="form-label">{{ __('Ingrese su contraseña')
                                    }}</label>
                                <input data-toggle="password" id="password" type="password"
                                       class="form-control col-12 @error('password') is-invalid @enderror"
                                       name="password"
                                       required autocomplete="current-password">
                            </div>

                            <!--div class="mb-3 form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                       name="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Recordarme') }}
                                </label>
                            </div-->
                        <!--div class="alinear-centrado ">
                                <label for="password" class="col-form-label ">{{ __('Ingrese su
                                    contraseña') }}</label>

                                <div style=" margin-left:25%">
                                    <input id="password" type="password"
                                        class="form-control col-8 @error('password') is-invalid @enderror"
                                        name="password" required autocomplete="current-password">
                                    <input id="show_password" type="checkbox" /> Mostrar contraseña
                                    @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                        </div-->

                            <div class="ffset-md-4 alinear-centrado">
                                <button type="submit" class="btn btn-primo col-12">
                                    {{ __('Ingresar') }}
                                </button>

                                <br/>
                                @if (Route::has('password.request'))
                                    <a class="form-check-label color-links" style="font-weight:normal"
                                       href="{{ route('password.request') }}">
                                        {{ __('¿Olvidó su
                                    contraseña?') }}
                                    </a>
                                @endif
                            </div>

                        </div>


                    <!--div class="form-group row mb-0 col-12">
                            <div class="col-md-5 offset-md-4 alinear-centrado">
                                <button type="submit" class="btn btn-primo col-12">
                                    {{ __('Ingresar') }}
                        </button>
                        <br></br>
                        <a href="{{ url('/Reset') }}" class="form-check-label color-links">¿Olvidó su
                                    contraseña?</a>
                            </div>
                        </div-->
                        <br/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
</body>

</html>
