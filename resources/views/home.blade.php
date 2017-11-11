@extends('layout.admin.admin')
@section('titulo', 'Clinica Del Niño')
@section('contenido')

<!DOCTYPE html>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <div class="fb-page" data-href="https://www.facebook.com/centromedicoinfantil/" data-tabs="timeline" data-width="500" data-height="700" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/centromedicoinfantil/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/centromedicoinfantil/">Centro Medico Infantil</a></blockquote></div>

    </div>

    <div class="col-sm-9">
    
      <p> <img width="800" src="img/slide-05.jpg" alt="sala de operaciones"></p>
      <hr>
      <h2>Historia</h2>
      <p>Centro Medico Infantil nace con la intención de brindar al departamento de Izabal y pueblos aledaños, 
      un servicio de calidad y calidez humana a sus pacientes, en un ambiente donde los niños son nuestra primordial razón de trabajo,
       por lo que se cuenta con áreas de entretenimiento, y área verde. 
       Somos un equipo de trabajo que colabora conjuntamente para brindarle una atención personalizada y 
       darle soluciones a los problemas de salud a nuestros pacientes.</p>
      <br>
      
      <hr>
      <h2>Objetivo</h2>
      <p>Proporcionar a nuestros pacientes atención medica eficiente y segura,
       ofreciendo opciones y soluciones a sus problemas de salud, 
       y esforzándonos como equipo de trabajo para superar sus expectativas.</p>
      <hr>

     
      

      
      

     
    </div>
  </div>
</div>



<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.11';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
@endsection


