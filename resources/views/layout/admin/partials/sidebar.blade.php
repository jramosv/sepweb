<div class="sidebar" data-color="azure" data-image="{{ asset('/img/slide-03.jpg')}}">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper" > 
            <div class="logo">
                <a href="http://sepweb.dev" class="simple-text">
                    SIPWEB
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="/home">
                        <i class="pe-7s-world"></i>
                        <p>Inicio</p>
                    </a>
                </li>
                @if (auth()->user()->admin or auth()->user()->doctor or auth()->user()->secre )                      
                <li>
                    <a href="/pacientes">
                        <i class="pe-7s-user"></i>
                        <p>Pacientes</p>
                    </a>
                </li>
                <li>
                    <a href="/citas">
                        <i class="pe-7s-news-paper"></i>
                        <p>Citas Medicas</p>
                    </a>
                </li>
                <li>
                    <a href="/hospitalizaciones">
                        <i class="pe-7s-id"></i>
                        <p>Hospitalizaciones</p>
                    </a>
                </li>
                
                @endif
                @if (auth()->user()->admin or auth()->user()->doctor)

                <li>
                    <a href="/diagnosticos">
                        <i class="pe-7s-note2"></i>
                        <p>Diagnosticos</p>
                    </a>
                </li>
                @endif

                 @if (auth()->user()->admin or auth()->user()->doctor  or auth()->user()->farm)
                    <li>
                        <a href="/productos">
                            <i class="pe-7s-bandaid"></i>
                            <p>Productos</p>
                        </a>
                    </li>

                 @endif

                  @if (auth()->user()->admin or auth()->user()->farm)

                    <li>
                    <a href="/categorias">
                        <i class="pe-7s-edit"></i>
                        <p>Categorias</p>
                    </a>
                </li>

                    

                <li>
                    <a href="/proveedores">
                        <i class="pe-7s-credit"></i>
                        <p>Proveedores</p>
                    </a>
                </li>

                 <li>
                    <a href="/compras">
                        <i class="pe-7s-cart"></i>
                        <p>Compras</p>
                    </a>
                </li>

                <li>
                    <a href="/recetas">
                        <i class="pe-7s-drawer"></i>
                        <p>Receta</p>
                    </a>
                </li>
                @endif

                 @if (auth()->user()->admin)
                <li>
                    <a href="/especialidades">
                        <i class="pe-7s-albums"></i>
                        <p>Especialidades</p>
                    </a>
                </li>

                <li>
                    <a href="/enfermeras">
                        <i class="pe-7s-like"></i>
                        <p>Enfermeras</p>
                    </a>
                </li>

                <li>
                    <a href="/doctores">
                        <i class="pe-7s-users"></i>
                        <p>Doctores</p>
                    </a>
                </li>
                
                  <li>
                    <a href="/habitaciones">
                        <i class="pe-7s-door-lock"></i>
                        <p>Habitaciones</p>
                    </a>
                  </li>
                @endif
                  

            </ul>
    	</div>
    </div>