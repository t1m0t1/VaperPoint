function editProducto(productoID){
    $.ajax({
        type: "GET",
        url: "/configuracion/producto/test/modificar/" + productoID,
        data: "data",
        success: function (response) {
            let categoria = response[1].Nombre;
            let rutaImagen = "http://127.0.0.1:8000/./images/productos/"+categoria+"s/"+ response[0].Imagen
            $('#nombre').val(response[0].Nombre);
            $('#cantidad').val(response[0].Cantidad);
            $('#precio').val(response[0].Precio);
            $('#selectCategoria').val(response[0].CategoriaID);
            $('#descripcion').val(response[0].Descripcion);
            $('#imagen').attr('src', rutaImagen);
        }
    }).fail(function() { 
        alert('ocurrio un error');
    })
};



function isImport(){
    let selectCategoria = $("#selectCategoria").val();
    let selectSubCategoria = $("#selectImportado");
    if(selectCategoria == 1){
        selectSubCategoria.attr('disabled', false)
    } else {
        selectSubCategoria.attr('disabled', true)
    }

}

