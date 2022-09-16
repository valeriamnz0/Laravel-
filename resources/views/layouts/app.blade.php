<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Administración SPT</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="{{asset('css/select2.css')}}" rel="stylesheet" />
    <style>
        .input-group>.select2-container--bootstrap {
            width: auto;
            flex: 1 1 auto;
        }

        .input-group>.select2-container--bootstrap .select2-selection--single {
            height: 100%;
            line-height: inherit;
            padding: 0.5rem 1rem;
        }
    </style>
</head>

<body>
    @if(Session::has('forbidden'))
    <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>{{Session::get('forbidden')}}</strong>
    </div>
    @endif
    <!-- Begin page -->
    <div id="wrapper" class="color-fondo color-letra">

        <!-- Topbar Start -->
        <div class="navbar-custom">
            <ul class="list-unstyled topnav-menu float-right mb-0">
                <li class="dropdown notification-list">
                   
                    <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5 class="m-0">
                                <span class="float-right">
                                    <a href="" class="text-dark">
                                        <small>Limpiar</small>
                                    </a>
                                </span>Notificaciones
                            </h5>
                        </div>

                        <div class="slimscroll noti-scroll">

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                <div class="notify-icon">
                                    <img src="{{asset('assets/images/users/user-1.jpg')}}" class="img-fluid rounded-circle" alt="" />
                                </div>
                                <p class="notify-details">Cristina Pride</p>
                                <p class="text-muted mb-0 user-msg">
                                    <small>Hi, How are you? What about our next meeting</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-primary">
                                    <i class="mdi mdi-comment-account-outline"></i>
                                </div>
                                <p class="notify-details">Caleb Flakelar commented on Admin
                                    <small class="text-muted">1 min ago</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon">
                                    <img src="{{asset('assets/images/users/user-4.jpg')}}" class="img-fluid rounded-circle" alt="" />
                                </div>
                                <p class="notify-details">Karen Robinson</p>
                                <p class="text-muted mb-0 user-msg">
                                    <small>Wow ! this admin looks good and awesome design</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-warning">
                                    <i class="mdi mdi-account-plus"></i>
                                </div>
                                <p class="notify-details">New user registered.
                                    <small class="text-muted">5 hours ago</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-info">
                                    <i class="mdi mdi-comment-account-outline"></i>
                                </div>
                                <p class="notify-details">Caleb Flakelar commented on Admin
                                    <small class="text-muted">4 days ago</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-secondary">
                                    <i class="mdi mdi-heart"></i>
                                </div>
                                <p class="notify-details">Carlos Crouch liked
                                    <b>Admin</b>
                                    <small class="text-muted">13 days ago</small>
                                </p>
                            </a>
                        </div>

                        <!-- All-->
                        <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                            View all
                            <i class="fi-arrow-right"></i>
                        </a>

                    </div>
                </li>

                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <span class="pro-user-name ml-1">
                            {{\Illuminate\Support\Facades\Auth::user()->name}} <i class="mdi mdi-chevron-down"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        </a>
                        <form action="{{route('logout')}}" method="POST">
                            @csrf
                            <!-- item-->
                            <button onclick="" class="dropdown-item notify-item">
                                <i class="fe-log-out"></i>
                                <span>Cerrar sesión</span>
                            </button>
                        </form>
                    </div>
                </li>
            </ul>

            <!-- LOGO -->
            <div class="logo-box alinear-centrado">
                <Span hidden>Espacio libre para acomodar el panel izquierdo</Span>
                <img src="{{asset('images/Logo.PNG')}}" class="img-responsive" alt="LOGO SPT" width="75%" height="250%" />
            </div>

            <ul class="list-unstyled topnav-menu topnav-menu-left mb-0">
                <li>
                    <button class="button-menu-mobile disable-btn waves-effect">
                        <i class="fe-menu"></i>
                    </button>
                </li>

                <li>
                    @yield('title')
                </li>

            </ul>

        </div>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu" class="color-navbar">

            <div class="slimscroll-menu">

                <!-- User box -->
                <div class="user-box text-center">
                    <!--<img src="assets/images/users/user-1.jpg" alt="user-img" title="Mat Helme"
                    class="rounded-circle img-thumbnail avatar-md"> -->
                    <div class="dropdown">
                        <!--a href="#" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-toggle="dropdown"
                        aria-expanded="false">Nombre de usuario</a-->
                        <div class="dropdown-menu user-pro-dropdown">

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-user mr-1"></i>
                                <span>Mi cuenta</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-settings mr-1"></i>
                                <span>Ajustes</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-log-out mr-1"></i>
                                <span>Cerrar sesión</span>
                            </a>

                        </div>
                    </div>
                </div>
                <br />
                <br />
                <br />
                <br />
                <br />
                <br />


                <!--- Sidemenu -->
                <div id="sidebar-menu">

                    <ul class="metismenu color-letra" id="side-menu">

                        @canany(['isAdmin','isSeller'])
                        <!-- <li><a href="{{ url('/cotizador') }}" class="menu-items "><i class="fas fa-clipboard"> </i><span>Cotizador</span></a></li> -->

                        <!--<li><a href="{{ url('/FormularioCliente') }}" class="menu-items "><i class="fas fa-user"></i><span>Clientes</span></a></li>-->

                        <!--li><a href="{{ url('/FormularioArticulos') }}" class="menu-items"><i class="fas fa-paperclip"></i><span>ArtÃ­culos</span></a></li-->

                        <li><a href="/cliente" class="menu-items {{Request::is('user*') ? ' active' : ''}}"><i class="fas fa-user"></i><span>Clientes</span></a></li>

                        <li><a href="{{ url('/articulo') }}" class="menu-items "><i class="fas fa-tools"> </i><span>Artículos</span></a></li>

                        @endcanany
                        @canany(['isAdmin'])
                        <li><a href="{{ url('/FormularioEmpleados') }}" class="menu-items "><i class="fas fa-user-tie"> </i><span>Usuarios</span></a>
                        </li>

                        @endcanany
                        @canany(['isAdmin','isSeller'])
                        <li><a href="/proyecto" class="menu-items {{Request::is('proyecto*') ? ' active' : ''}}"><i class="fas fa-tasks"></i><span>Proyectos</span></a></li>
                        @endcanany
                        <!--<li><a href="{{ url('/FormularioProyecto') }}" class="menu-items "><i class="fas fa-tasks"></i><span>Proyectos</span></a></li>-->

                        @canany(['isAdmin'])


                        <li>
                            <a href="javascript: void(0);">
                                <i class="fas fa-chart-line"></i>
                                <span>Reportes</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{ url('/Reportes_Ventas') }}" class="menu-items "><span>1. Reporte de Ventas</span></a></li>
                                <li><a href="{{ url('/Reportes_Clientes') }}" class="menu-items "><span>2. Reporte de Clientes</span></a></li>
                                <li><a href="{{ url('/Reportes_Articulos') }}" class="menu-items "><span>3. Reporte de Artículos</span></a></li>
                            </ul>
                        </li>
                        @endcanany
                        @canany(['isAdmin','isSeller'])
                        <li><a href="/cita" class="menu-items {{Request::is('cita*') ? ' active' : ''}}"><i class="fas fa-pen"></i><span>Citas Ventas</span></a></li>
                        @endcanany
                        @canany(['isAdmin'])
                        <li><a href="/instalacion" class="menu-items {{Request::is('instalacion*') ? ' active' : ''}}"><i class="fas fa-book"></i><span>Citas Instalación</span></a></li>
                        @endcanany
                        <!-- <li><a href="{{ url('/FormularioInstalacion') }}" class="menu-items "><i class="fas fa-book"></i><span>InstalaciÃ³n</span></a></li> -->

                        <!-- <li><a href="{{ url('/FormularioInstalacionTecnico') }}" class="menu-items"><i class="fas fa-calendar-alt"></i><span>Citas InstalaciÃ³n TÃ©cnico</span></a></li> -->
                        @canany(['isTech'])
                        <li><a href="/datosCitasTecnico/{{ auth()->user()->userID }}" class="menu-items"><i class="fas fa-calendar-alt"></i><span>Citas Instalación Técnico</span></a>
                        </li>
                        @endcanany
                </div>
                <!-- End Sidebar

            <div class="clearfix"></div>-->

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page" style="margin-bottom: 15px;">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <main class="py-4">
                        @yield('content')
                    </main>
                </div> <!-- container-fluid -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            2021 - 2022 &copy; Proyecto Fidélitas
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
    <script src="{{ asset('js/morris.min.js') }}" defer></script>
    <script src="{{ asset('js/raphael.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery.knob.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}" defer></script>
    <script src="{{ asset('js/dataTables.bootstrap4.js') }}" defer></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('js/proyectos.js') }}" defer></script>
    <!--<script src="{{ asset('js/pasaArticulos.js') }}" defer></script>-->
    <script>
        $('select').select2({
            theme: "bootstrap",
            containerCssClass: 'form-control'

        });
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @include('layouts.alerta')
    @stack('scripts')
</body>

</html>