@extends('layouts.default')
@section('contenido')
    <section class="h-100">
        <div class="container mt-4">
            <div class="row row-cols-xs-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
                @foreach ($productos as $p)
                    <div class="col-md-4">
                        <div class="card product-card border-0 rounded-4">
                            <div class="position-relative">
                                <div class="text-end">
                                    @if ($p->Cantidad > 0)
                                        <p class="fs-6 text-primary me-1 p-1"><strong>Disponible</strong></p>
                                        @else
                                        <p class="text-danger me-1"><strong>Agotado</strong></p>
                                    @endif
                                </div>
                                <div class="overflow-hidden" style="
                                background: url('@if($p->Imagen){{ asset('/images/productos/'.$p->categoria->Nombre.'/' . $p->Imagen) }}@else /images/place-holder.png @endif') center center / cover no-repeat;
                                aspect-ratio: 7 / 3;
                                ">
                                </div>
                            </div>
                          <div class="card-body p-4">
                            <h5 class="card-title mb-3 fw-bold">{{ $p->Nombre }}</h5>
                            <p class="card-text text-muted mb-4 d-none d-lg-block">{{$p->Descripcion}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                              <span class="price">${{ number_format($p->Precio, '2', ',', '.') }}</span>
                            </div>
                          </div>
                        </div>
                      </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center mt-5">
                <div class="col-12 col-xl-8">
                    {{ $productos->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
