/* Script cargar Imagen */
function cargarImagen(){
    let fileImagen = document.getElementById('formFile');  
    let imgSelectd = document.getElementById('imgSelected');
    let inputImagenAnterior = document.getElementById('imagenAnterior');
    const match = ["image/jpeg", "image/png", "image/jpg"];
    let rutaImagenAnterior;

    if (inputImagenAnterior && inputImagenAnterior.value) {
        let imagenAnterior = inputImagenAnterior.value;
        rutaImagenAnterior = 'http://127.0.0.1:8000/storage/' + imagenAnterior;
    } else {
        rutaImagenAnterior = 'http://127.0.0.1:8000/img/no-disponible.jpg';
    }

    fileImagen.addEventListener('change', e => {
        let typeFile = e.target.files[0].type;
        if(!(typeFile == match[0] ||typeFile == match[1] ||typeFile == match[2])){
            alert('Formato no soportado, Solo: jpeg, jpg, png');
            imgSelectd.src = 'http://127.0.0.1:8000/img/no-disponible.jpg';
            fileImagen.value = "";
        }else{
            let reader = new FileReader();
            reader.onload = function(e) {
                imgSelectd.src = e.target.result;
            };
            reader.readAsDataURL(e.target.files[0]);
        } 
    });

    imgSelectd.src = rutaImagenAnterior;
}

function abrirModalCrearProducto(){
    resetErrors();
    $("#modalTitulo").text('Nuevo Producto');
    $("#botonSave").text('Guardar');
    $('#componenteModal').modal('show');
    $('.modal-body :input').val('');
    path = 'http://127.0.0.1:8000/img/no-disponible.jpg'
    $('#imgSelected').attr('src',path);  
}

function abrirModalEditarProducto(productoID){
    resetErrors();
    $.ajax({
        type: "GET",
        url: "/configuracion/producto/show/"+ productoID,
        success: function (response) {
            $('#componenteModal').modal('show');
            $("#modalTitulo").text('Editar Producto');
            $("#botonSave").text('Guardar');
            cargarInputsModal(response);
        },error: function(res){
            console.log(res);
            /* TODO: Falta Manejar Este Error Swal */
        }
    });   
}
function guardarProducto(){
    /* TODO:Hacer un spinner */
    $('#botonSave').prop('hidden', true); 
    $('#spinner').prop('hidden', false);
    $.ajaxSetup({
        headers:
        { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });
    let productoID = $('#productoID').val();
    let ruta = '/configuracion/producto/alta';
    if (productoID != '') {
        ruta = '/configuracion/producto/modificar/'+productoID;
    }
    let nombre = $('#nombre').val();
    let cantidad = $('#cantidad').val();
    let precio = $('#precio').val();
    let categoriaID = $('#selectCategoria').val(); 
    let importado = $('#selectimportado').val();
    let descripcion = $('#descripcion').val();
    let formData = new FormData;
    if($('#formFile').val() != ''){
        formData.append('Imagen', $('#formFile')[0].files[0]);
    }
    formData.append('Nombre', nombre);
    formData.append('Cantidad', cantidad);
    formData.append('Precio', precio);
    formData.append('CategoriaID', categoriaID);
    formData.append('Importado', importado);
    formData.append('Descripcion', descripcion);

    
    $.ajax({
        type: "POST",
        url: ruta,
        contentType: false,
        processData: false,
        data: formData,
        success: function (response) {
            $('#componenteModal').modal('hide');
            $('#botonSave').prop('hidden', false);
            $('#spinner').prop('hidden', true);
            location.reload();
            /* TODO: Falta Confirmacion de Producto Guardado */
        },error: function(res){            
            mostrarErrores(res);
            $('#botonSave').prop('hidden', false);
            $('#spinner').prop('hidden', true);          
        }
    });
}

function isImport(){
    let selectCategoria = $("#selectCategoria").val();
    let selectSubCategoria = $("#selectimportado");
    if(selectCategoria == 3){
        selectSubCategoria.attr('disabled', false);
    } else {
        selectSubCategoria.attr('disabled', true);
        selectSubCategoria.val("");
    }
}

/* err es un objeto, muestra los errores devueltos por el controlller*/
function mostrarErrores(err){
    resetErrors();
    errorData = JSON.parse(err.responseText)
    let ulErrors = $('#ulErrors');
    /* Este if no me gusta pero no encotre otra solucion al momento */
    if(errorData.message.includes('CategoriaID')){
        $('#selectCategoria').addClass('border border-danger');
        let li = $('<li></li>').text('La Categoria es Requerida');
        li.addClass('text-danger');
        ulErrors.append(li);
    }
    let errors = err.responseJSON.errors;
    for (let field in errors) {
        if (errors.hasOwnProperty(field)) {
        errors[field].forEach(error => {
            field = field.toLowerCase();            
            if(field == 'categoriaid'){
                $('#selectCategoria').addClass('border border-danger');
            }
            let li = $('<li></li>').text(error);
            li.addClass('text-danger');
            ulErrors.append(li);
            });
            let inputField = $('#' + field);
            if (inputField.length) {
                inputField.addClass('border border-danger');   
            }
        }
    }
}

function cargarInputsModal(producto){
    $('#productoID').val(producto.ProductoID);
    $('#nombre').val(producto.Nombre);
    $('#cantidad').val(producto.Cantidad);
    $('#precio').val(producto.Precio);
    $('#descripcion').val(producto.Descripcion);
    $('#selectCategoria').val(producto.CategoriaID);
    $('#selectimportado').val(producto.Importado);
    let path = 'http://127.0.0.1:8000/storage/'+producto.Imagen;
    if(producto.Imagen == null){
        path = 'http://127.0.0.1:8000/img/no-disponible.jpg'
    }
    $('#imgSelected').attr('src',path);
    $('#imagenAnterior').val(producto.Imagen);
}

function resetErrors(){
    let ulErrors = $('#ulErrors');
    ulErrors.empty();
    $('input').removeClass('border border-danger');
    $('select').removeClass('border border-danger');
}

