<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Reporte - @yield('titulo')</title>

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