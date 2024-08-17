<section>
    <div class="container mt-4">
        <div class="row row-cols-3 row-cols-md-5 g-4">
            @foreach ($productos as $p)
                <div class="col-6">
                    <div class=" card">
                        <div class="text-end">
                            @if ($p->Cantidad > 0)
                                <p class="fs-6 text-primary me-1"><strong>Disponible</strong></p>
                                @else
                                <p class="text-danger me-1"><strong>Agotado</strong></p>
                            @endif
                        </div>
                        
                        <div id="carousel{{$p->ProductoID}}" class="carousel carousel-dark slide" data-bs-interval="false">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ asset('/images/productos/'.$p->categoria->Nombre.'/' . $p->Imagen) }}" style="height:35vh;width: 100%">
                                </div>
                              @if($p->Descripcion)
                              <div class="carousel-item">
                                <img src="{{ asset('/images/productos/'.$p->categoria->Nombre.'/' . $p->Imagen) }}" style="height:35vh; width: 100%; opacity:0.2;">
                                <div class="position-absolute top-0 start-0">
                                    <p class="text-left fw-bold">{{$p->Descripcion}}</p>
                                </div>
                              </div>
                              @endif
                            </div>
                            @if($p->Descripcion)
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carousel{{$p->ProductoID}}" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carousel{{$p->ProductoID}}" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carousel{{$p->ProductoID}}" data-bs-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carousel{{$p->ProductoID}}" data-bs-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Next</span>
                            </button>
                                @endif
                          </div>

                       
                        <div class="card-body p-0">
                            <p class="col-11 d-inline-block text-truncate m-0"><strong>{{ $p->Nombre }}</strong></p>
                            <div class="bg-gradient-secondary">
                                <p class="fs-4 me-3 text-center"> 
                                <strong class="text-primary">
                                        ${{ $p->Precio }}
                                </strong>
                                <strong class="fs-6">
                                    USD 
                                </strong>
                            </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-between mt-5">
            {{ $productos->links() }}
        </div>
    </div>
</section>
