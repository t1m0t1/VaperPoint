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

      <header id="header" class="fixed-top color2">
        <div class="container d-flex align-items-center justify-content-lg-between vapor">

          <!-- <h1 class="logo me-auto me-lg-0"><a href="index.html">Vaper<span>Point</span></a></h1> -->
          <!-- Uncomment below if you prefer to use an image logo -->
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
    </header>
    <!-- End Header -->

<section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">

      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
        <div class="col-xl-6 col-lg-8">
          <h1>Tienda de <span>Vapeo</span></h1>
          <h2>Un mundo libre de humo</h2>
        </div>
      </div>

      <div class="row gy-4 mt-5 justify-content-center" data-aos="zoom-in" data-aos-delay="250">
        <div class="col-xl-2 col-md-4">
          <div class="icon-box">
            <i class="ri-store-line"></i>
            <h3><a href="">Mods</a></h3>
          </div>
        </div>
        <div class="col-xl-2 col-md-4">
          <div class="icon-box">
            <i class="ri-bar-chart-box-line"></i>
            <h3><a href="">Liquidos</a></h3>
          </div>
        </div>
        <div class="col-xl-2 col-md-4">
          <div class="icon-box">
            <i class="ri-calendar-todo-line"></i>
            <h3><a href="">Accesorios</a></h3>
          </div>
        </div>
        <div class="col-xl-2 col-md-4">
          <div class="icon-box">
            <i class="ri-paint-brush-line"></i>
            <h3><a href="">Resistencias</a></h3>
          </div>
        </div>
        <div class="col-xl-2 col-md-4">
          <div class="icon-box">
            <i class="ri-database-2-line"></i>
            <h3><a href="">Reparaciones</a></h3>
          </div>
        </div>
      </div>

    </div>
  </section>
  <!-- End Hero -->
<section class="full-screen">
  <div class="container mt-4">
    <div class="row row-cols-2 row-cols-md-3 g-4">
     @foreach ($productos as $p)
     <div class="col-6">
       <div class="card">
         <div class="text-end me-1 mt-3">
         @if ($p->Cantidad > 0)
           <p class="fs-6 text-primary me-2"><strong>Disponible</strong></p>
         @else
           <p class="text-danger"><strong>Agotado</strong></p>
         @endif
         </div>
         <img src="{{asset('/images/productos/mods/'.$p->Imagen)}}" class="card-img-to">
         <div class="card-body">
           <p class="fs-6 col-11 d-inline-block text-truncate">{{$p->Nombre}}</p>
           <div class="bg-gradient-secondary">
             <p class="fs-6 me-3 mt-3"> <strong>USD {{$p->Precio}}</strong></p>
           </div>
           <div class="d-flex justify-content-end mt-3">
             <a href="#" class="btn btn-primary col-12">Ver mas</a>
           </div>
         </div>
       </div>
     </div>
     @endforeach 
    </div>
    <div class="d-flex">
      {{ $productos->links() }}  
    </div>
  </div>
</section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>
