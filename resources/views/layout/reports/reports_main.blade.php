<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Reporte | @yield('titulo')</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet" />
    

    <link rel="stylesheet" href="{{ asset('/css/sweetalert.css') }}">
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ asset('/css/demo.css') }}" rel="stylesheet" />

    <link href="{{ asset('/css/style.css') }}" rel="stylesheet" />

</head>
<body>
	<h2 class="text-center">@yield('titulo')</h2>
	
	@yield('contenido')
	
	    <!--   Core JS Files   -->
    <script src="{{ asset('/js/jquery-1.12.4.js') }}" type="text/javascript"></script>
	<script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>

	<script src="{{ asset('/js/demo.js') }}"></script>

	@yield('script')

</body>
</html>