let tbodyProductosSeleccionados = $('#tbody-productos');
let selectProductos = $('#select2Productos');
let textTotal = $('#total-a-cobrar');
let inputListadoProductos = $('#listadoProductos');
let total = Number(0);
let formulario = $('#form-venta');

function agregarProductoLista(){
    let productoSeleccionado = JSON.parse(selectProductos.select2('val'));
    let productoExistente = $('#cantidad-producto-' + productoSeleccionado.ProductoID);
    if (productoExistente.length == 0) {
        let rutaImagen = productoSeleccionado.Imagen.replace(/ /g, "");
        let fila = `<tr id="${productoSeleccionado.ProductoID}">
                        <td>
                            <img class="col-2" src="/images/productos/${productoSeleccionado.categoria.Nombre}/${rutaImagen}" alt="imagen dep producto ${productoSeleccionado.Nombre}">
                            ${productoSeleccionado.Nombre}
                            </td>
                        <td>
                            <div class="input-group">
                                <input type="number" class="form-control" id="cantidad-producto-${productoSeleccionado.ProductoID}" onChange="autoCalcularMonto()" value="1">
                                <span class="input-group-text text-primary">Disp: ${productoSeleccionado.Cantidad}</span>
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" class="form-control" id="precio-producto-${productoSeleccionado.ProductoID}" onChange="autoCalcularMonto()" value="${productoSeleccionado.Precio}">
                            </div>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-danger btn-sm" onclick="borrarFila(${productoSeleccionado.ProductoID})">X</button>
                            </td>
                    </tr>
                    `
        tbodyProductosSeleccionados.append(fila);
    }else{
        let valorActual = Number(productoExistente.val());
        productoExistente.val( valorActual+ 1)
    }
    total += Number(productoSeleccionado.Precio);
    textTotal.text( new Intl.NumberFormat("de-DE").format(total) ) ;
    selectProductos.val(1).select2();
};

function borrarFila(idFila){
    let filaBorrar = $('#'+idFila);
    if (filaBorrar) {
        let precioItem = $('#precio-producto-'+ idFila);
        let cantidadItem = $('#cantidad-producto-'+ idFila);
        let descontar = Number(precioItem.val()) * Number(cantidadItem.val());
        total-=Number(descontar);
        textTotal.text(new Intl.NumberFormat("de-DE").format(total) ) ;

        filaBorrar.remove()
    }
}

function limpiarCarrito(){
    textTotal.text("0,00 $");
    tbodyProductosSeleccionados.empty();
}

function autoCalcularMonto(){
    let montoTotalProductos = Number(0);
    tbodyProductosSeleccionados.find("tr").each(function (index,tr){
        let trID=tr.id;
        let trCantidad= $('#cantidad-producto-'+ trID);
        let trPrecio= $('#precio-producto-'+ trID);
        let montoSumar = Number(trPrecio.val() * trCantidad.val());
        montoTotalProductos += montoSumar;
    })
    textTotal.text(new Intl.NumberFormat("de-DE").format(montoTotalProductos))
}

function enviarFormularioNuevaVenta(){
    let ventaProductos = [];
    tbodyProductosSeleccionados.find("tr").each(function (index,tr){
        ventaProductos.push(
            {
                ItemVentaID : tr.id,
                Cantidad :  $('#cantidad-producto-'+ tr.id).val(),
                Precio:  $('#precio-producto-'+ tr.id).val(),
            }
        );
    })
    let productos = JSON.stringify(ventaProductos);
    inputListadoProductos.val(productos);
    let inputMontoTotal = $('#montoTotalJS');
    inputMontoTotal.val(parseFloat(textTotal.text()));
    formulario.submit();
}