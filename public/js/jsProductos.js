$(function(){
   
})
function abrirModalCrearProducto(){
    $("#modalTitulo").text('Nuevo Producto');
    $("#botonSave").text('Guardar');
    $('#componenteModal').modal('show');
    $('.modal-body :input').val('');
    
}

function abrirModalEditarProducto(productoID){
    $.ajax({
        type: "GET",
        url: "/configuracion/producto/modificar/"+ productoID,
        success: function (response) {
            $('#componenteModal').modal('show');
            $("#modalTitulo").text('Editar Producto');
            $("#botonSave").text('Guardar');
            cargarInputsModal(response);
        },error: function(res){
            console.log(res);
        }
    });
    
}
function guardarProducto(){  
    $.ajaxSetup({
        headers:
        { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });
    productoID = $('#productoID').val();
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

    console.log(descripcion);
    
   
    $.ajax({
        type: "POST",
        url: ruta,
        data: {
            Nombre: nombre,
            Cantidad: cantidad,
            Precio: precio,
            CategoriaID: categoriaID,
            Importado: importado,
            Descripcion: descripcion
        },
        success: function (response) {
            console.log(response);      
        },error: function(res){
            console.log('error: ' +res.responseJSON.errors);
            
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

function cargarInputsModal(producto){
    $('#productoID').val(producto.ProductoID);
    $('#nombre').val(producto.Nombre);
    $('#cantidad').val(producto.Cantidad);
    $('#precio').val(producto.Precio);
    $('#descripcion').val(producto.Descripcion);
    $('#selectCategoria').val(producto.CategoriaID);
    $('#selectimportado').val(producto.Importado);
}