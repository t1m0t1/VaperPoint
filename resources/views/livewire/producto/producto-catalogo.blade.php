<section>
    <div class="container mt-4">
        <div class="row row-cols-3 row-cols-md-5 g-4">
            @foreach ($productos as $p)
                <div class="col-6">
                    <div class="color4 card">
                        <div class="text-end">
                            @if ($p->Cantidad > 0)
                                <p class="fs-6 text-primary me-1"><strong>Disponible</strong></p>
                            @else
                                <p class="text-danger me-1"><strong>Agotado</strong></p>
                            @endif
                        </div>
                        <img src="{{ asset('/images/productos/'.$categoria->Nombre.'/' . $p->Imagen) }}" style="height: 40vh">
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
                           {{--  <div class="d-flex justify-content-end mt-3">
                                <a href="#" class="btn btn-primary col-12">Ver mas</a>
                            </div> --}}
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
