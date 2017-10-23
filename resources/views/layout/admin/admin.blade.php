<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>SEPWEB | @yield('titulo', 'Pagina Principal')</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{ asset('/css/animate.min.css') }}" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{ asset('/css/light-bootstrap-dashboard.css') }}" rel="stylesheet"/>

    <link href="{{ asset('/css/jquery.dataTables.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('/css/buttons.dataTables.min.css') }}" rel="stylesheet"/>
    

    <link rel="stylesheet" href="{{ asset('/css/sweetalert.css') }}">
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ asset('/css/demo.css') }}" rel="stylesheet" />

    <link href="{{ asset('/css/style.css') }}" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="{{ asset('/css/pe-icon-7-stroke.css') }}" rel="stylesheet" />

</head>
<body>

    <div class="wrapper">
            @include('layout.admin.partials.sidebar')

            <div class="main-panel">
                <nav class="navbar navbar-default navbar-fixed">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#">@yield('titulo', 'Dashboard')</a>
                        </div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                   <a href="">
                                    <i class="fa fa-user-md" aria-hidden="true"></i>
                                       Freddy Marroquin { Pediatra/Ginecologo }
                                    </a>
                                </li>
                                <li class="dropdown">
                                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-cog" aria-hidden="true"></i>
                                            Mi Panel
                                            <b class="caret"></b>
                                      </a>
                                      <ul class="dropdown-menu">
                                        <li><a href="#">Editar info.</a></li>
                                        <li><a href="#">Cambiar contraseña</a></li>
                                        <li><a href="#">Bandeja de mensajes</a></li>
                                        <li><a href="#">Reportar fallos</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Darme de baja</a></li>
                                      </ul>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                                        Cerrar sesión
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <div class="content">
                    <div class="container-fluid">
                        @yield('contenido')
                    </div>
                </div>

                <p class="copyright pull-right">
                    &copy; 2017 <a href="http://www.csepweb.dev">Kevin Fajardo</a>, made with love for a José Villeda & Karen Gonzales
                </p>
            </div>
        </footer>

    </div>


</body>

    <!--   Core JS Files   -->
    <script src="{{ asset('/js/jquery-1.12.4.js') }}" type="text/javascript"></script>
	<script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="{{ asset('/js/bootstrap-checkbox-radio-switch.js') }}"></script>

	<!--  Charts Plugin -->
	<script src="{{ asset('/js/chartist.min.js') }}"></script>

    <!--  Notifications Plugin    -->
    <script src="{{ asset('/js/bootstrap-notify.js') }}"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="{{ asset('/js/light-bootstrap-dashboard.js') }}"></script>
	
    <script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('/js/jszip.min.js') }}"></script>
    <script src="{{ asset('/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('/js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('/js/buttons.print.min.js') }}"></script>

    <script src="{{ asset('/js/sweetalert.min.js') }}"></script>
	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="{{ asset('/js/demo.js') }}"></script>

    @include('sweet::alert')

	@yield('script')

</html>
