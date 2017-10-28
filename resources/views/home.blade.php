@extends('layout.admin.admin')
@section('titulo', 'Homepage')
@section('contenido')

<div id="myCarousel" class="carousel slide" data-ride="carousel" align="center">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="img/slider1.jpg" alt="sala de operaciones">
       <h3>Sala de Operaciones</h3>
        <p>Contamos con tecnología de punta!</p>
    </div>

    <div class="item">
      <img src="img/slider2.jpg" alt="Habitaciones">
       <h3>Cómodas Habitaciones</h3>
        <p>Lo mejor para nuestros pacientes!</p>
    </div>

    <div class="item">
      <img src="img/slider3.jpg" alt="recepcion">
       <h3>Centro Médico Infantil</h3>
        <p>Los Esperamos!</p>
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Anterior</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Siguiente</span>
  </a>
</div>
@endsection
