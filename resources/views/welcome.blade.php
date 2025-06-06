<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Vaper Point | Home</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <link href="./css/style.css" rel="stylesheet">
    </head>
    <body>

{{--       <header id="header" class="fixed-top color2">
        <div class="container d-flex align-items-center justify-content-lg-between vapor">
          <a href="/" class="logo me-auto me-lg-0"><img src="./img/logo-fondo-png.png" alt="" class="img-fluid"></a>
 
          <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
              <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
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
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
          </nav>
          <!-- .navbar -->
        </div>
    </header> --}}
    <!-- End Header -->

<section id="hero" class="d-flex align-items-center justify-content-center h-100">
  <img src="{{ asset('/img/vaper-point-blanco.jpeg') }}" style=" width:60%"> {{-- Consultar ancho del fondo --}}
  <div class="position-absolute justify-content-center">
    <div class="container" data-aos="fade-up">

      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
        <div class="col-xl-6 col-lg-8">
          <h1>Tienda de <span>Vapeo</span></h1>
          <h2>Un mundo libre de humo</h2>
        </div>
      </div>

      <div class="row gy-4 mt-5 justify-content-center" data-aos="zoom-in" data-aos-delay="250">
      @foreach ($categorias as $c)
        <div class="col-xl-4 col-md-4">
          <div class="icon-box">
            <i class="ri-store-line"></i>
            <h3><a href="/catalogo/{{$c->CategoriaID}}">{{$c->Nombre}}</a></h3>
          </div>
        </div>    
      @endforeach
      </div>

    </div>
  </div>
  </section>
  <!-- End Hero -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>
