function isImport(){
    let selectCategoria = $("#selectCategoria").val();
    let selectSubCategoria = $("#selectImportado");
    if(selectCategoria == 1){
        selectSubCategoria.attr('disabled', false)
    } else {
        selectSubCategoria.attr('disabled', true)
    }

}