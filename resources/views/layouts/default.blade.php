<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Vaper Point | Home</title>

        @yield('styles')
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <!-- Styles -->
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <link href="{{asset('./css/style.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <script src="{{asset('./js/jquery.js')}}"></script>
        
        @livewireStyles
    </head>
    <body class="fondo-gradient h-100">
       {{--  <header id="header" class="fixed-top ">
                <div class="container d-flex align-items-center justify-content-lg-between">
                  <!-- Uncomment below if you prefer to use an image logo -->
                  <a href="/" class="logo me-auto me-lg-0"><img src="{{asset('./img/logo-fondo-png.png')}}" alt="" class="img-fluid"></a>
         
                  <nav id="navbar" class="navbar order-last order-lg-0">
                    <ul>
                      <li><a class="nav-link scrollto active" href="/">Home</a></li>
                      <li class="dropdown"><a href="#"><span>Productos</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                          <li class="dropdown"><a href="#"><span>Mods</span> <i class="bi bi-chevron-right"></i></a>
                            <ul>
                              <li><a href="#">Electronicos</a></li>
                              <li><a href="#">Semi Mecanicos</a></li>
                              <li><a href="#">Mecanicos</a></li>
                            </ul>
                          </li>
                          <li class="dropdown"><a href="#"><span>Liquidos</span> <i class="bi bi-chevron-right"></i></a>
                            <ul>
                              <li><a href="#">Importados</a></li>
                              <li><a href="#">Nacionales</a></li>
                            </ul>
                          </li>
                          </li>
                          <li class="dropdown"><a href="#"><span>Accesorios</span> <i class="bi bi-chevron-right"></i></a>
                            <ul>
                              <li><a href="#">Pirex</a></li>
                              <li><a href="#">Tanques</a></li>
                              <li><a href="#">Resistencias</a></li>
                              <li><a href="#">Cubre Pilas</a></li>
                            </ul>
                          </li>
                          </li>
                          <li class="dropdown"><a href="#"><span>Herramientas</span> <i class="bi bi-chevron-right"></i></a>
                            <ul>
                              <li><a href="#">Kit de Herramientas</a></li>
                              <li><a href="#">Calibrador de Recistencias</a></li>
                            </ul>
                          </li>
        
                        </ul>
                      </li>
                      <li><a class="nav-link scrollto " href="#portfolio">Servicios</a></li>
                      <li><a class="nav-link scrollto" href="#about">Sobre Nosotros</a></li>
                      <li><a class="nav-link scrollto" href="#contact">Contactanos</a></li>
                      @if (Auth::check())
                      <li class="dropdown"><a href="#"><span>{{Auth::user()->nombre}}</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                          <li><a href="#">Cambiar Contraseña</a></li>
                          <li><a href="{{route('desconectarUsuario')}}">Salir</a></li>
                        </ul>
                      </li>    
                        
                      @else  
                        <li><a class="nav-link scrollto" href="{{route('login')}}">Ingresar</a></li>
                      @endif
                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                  </nav>
                  <!-- .navbar -->
                </div>
        </header> --}}
        <main class="container d-flex align-items-center justify-content-center min-vh-100 flex-column">
          @if(Auth::check())
            @component('componentes.sidebar')
            @endcomponent
          @endif
          @yield('contenido')
        </main>
        @yield('js_footer')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        
        
        @livewireScripts
        
    </body>
</html>