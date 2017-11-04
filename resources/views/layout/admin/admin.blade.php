<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>SEPWEB | @yield('titulo', 'Clinica del Niño')</title>

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
    

    <link rel="stylesheet" href="{{ asset('/css/alertify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/semantic.min.css') }}">
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
                <nav class="navbar navbar-default navbar-fixed" style="background-color: #E3F2FD;">
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
                           <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                         - Sistema Estadistico de Pacientes 
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- RightSide Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Iniciar sesion</a></li>
                            <li><a href="{{ route('register') }}">Registro</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Cerrar Sesion
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
                    </ul>
                            </ul>
                        </div>
                    </div>
                </nav>

                <div class="content">
                    <div class="container-fluid">
                        @yield('contenido')
                    </div>
                </div>

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

    <script src="{{ asset('/js/alertify.min.js') }}"></script>
	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="{{ asset('/js/demo.js') }}"></script>

	@yield('script')

</html>
