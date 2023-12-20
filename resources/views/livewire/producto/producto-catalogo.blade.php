<section>
    <div class="container mt-4">
        <div class="row row-cols-3 row-cols-md-5 g-4">
            @foreach ($productos as $p)
                <div class="col-6">
                    <div class="color4 card">
                        <div class="text-end">
                            @if ($p->Cantidad > 0)
                                <p class="fs-6 text-secondary me-1"><strong>Disponible</strong></p>
                            @else
                                <p class="text-danger me-1"><strong>Agotado</strong></p>
                            @endif
                        </div>
                        <img src="{{ asset('/images/productos/mods/' . $p->Imagen) }}" class="card-img-to">
                        <div class="card-body p-0">
                            <p class="col-11 d-inline-block text-truncate m-0">{{ $p->Nombre }}</p>
                            <div class="bg-gradient-secondary">
                                <p class="fs-6 me-3 text-center"> <strong>USD {{ $p->Precio }}</strong></p>
                            </div>
                            <div class="d-flex justify-content-end mt-3">
                                <a href="#" class="btn btn-primary col-12">Ver mas</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="d-block">
        {{ $productos->links() }}
    </div>
</section>
