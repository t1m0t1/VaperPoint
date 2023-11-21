<div>
    {{-- MODAL --}}
    <div class="modal fade @if($mostrar) show @endif" id="editProductoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: @if($mostrar) block @else none @endif">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header color3">
              <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">Editar Producto</h1>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" onclick="Livewire.emit('cerrarModal')"></button>
            </div>
            
            <div class="modal-body color2">
                <form method="POST" action="#" wire.ignore>
                    @csrf
                    <div class="col-md-12 d-grid">
                      <div class="row ms-5">
                        <div class="col-md-7">
                          <div class="input-group mt-3">
                            <div class="col-md-4">
                              <label for="Nombre" class="form-label text-light">Nombre</label>
                              <input type="text" class="form-control @error('Nombre') is-invalid @enderror" value="{{ old ('Nombre')}}" name="Nombre" wire:model="Nombre">
                              @error('Nombre')
                                <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                            </div>
            
                            <div class="col-md-2 ms-4">
                              <label for="Cantidad" class="form-label text-light">Cantidad</label>
                              <input type="number" class="form-control  @error('Cantidad') is-invalid @enderror" id="Cantidad" value="Cantidad" required name="Cantidad" min="0" wire:model="Cantidad">
                              @error('Cantidad')
                                <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                            </div>
            
                            <div class="col-md-2 ms-4">
                              <label for="Precio" class="form-label text-light">Precio</label>
                              <input type="number" class="form-control  @error('Precio') is-invalid @enderror" id="Precio" value="Precio" min="0" name="Precio" wire:model="Precio">
                              @error('Precio')
                                <div class="alert alert-danger">{{ $message }}</div>    
                              @enderror
                            </div>
                          </div>
            
                          <div class="input-group mt-3">
                            <div class="col-md-3">
                              <label for="CategoriaID" class="form-label text-light">Categorias</label>
                              <select class="form-select @error('CategoriaID') is-invalid @enderror" id="selectCategoria" name="CategoriaID" onchange="isImport()" wire.model="Categoria">
                                <option selected disabled value="">Categorias</option>
                               @foreach ($categorias as $categoria)    
                                <option value="{{$categoria->CategoriaID}}" >{{$categoria->Nombre}}</option>
                                @endforeach
                              </select>
                              @error('CategoriaID')
                                <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                            </div>
            
                            <div class="col-md-3 ms-4 ">
                              <label for="Importado" class="form-label text-light">Sub Categoria</label>
                              <select class="form-select @error('Importado') is-invalid @enderror" aria-label="Disabled select example" id="selectImportado" name="Importado" disabled>
                                <option selected>Solo liquidos</option>
                                <option value="0">Nacionales</option>
                                <option value="1">Importados</option>
                                </select>
                                @error('CategoriaID')
                                  <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                          </div>
          
                          <div class="input-group mt-3">
                            <div class="col-md-8">
                              <label for="descripcion" class="form-label text-light">Descripcion</label>
                              <textarea class="form-control" id="descripcion" name="descripcion" wire:model="Descripcion"></textarea>
                            </div>
                          </div>
        
                        </div>
        
                        <div class="col-md-4 me-3">
                            <div class="col-md-12 border my-3 mx-auto">
                              <div class="col-md-9 my-3 mx-auto">
                                <img src="{{asset('img/no-disponible.jpg')}}" class="img-thumbnail">
                              </div>
                              <input class="form-control" type="file" id="formFile">
                            </div>
                        </div>
                      </div>
        
                      
        
                    
                  </div>
        
                  </form>
            </div>

            <div class="modal-footer color3">
              <button type="button" class="btn btn-primary">Guardar Cambios</button>
            </div>
          </div>
        </div>
      </div>

</div>
