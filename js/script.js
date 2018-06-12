pNexo = "nexo.php/";

function Nexo(param, destino="#salida", metodo="GET"){
    pagina = pNexo+param; // "nexo.php/partes/menuSesion"
    $.ajax({
        url: pagina,
        type: metodo
    }).done(function(datos){
        $(destino).html(datos);
    })      
}

function NexoP(param, destino="#principal"){
    Nexo("partes/"+param, destino);
}

//------------------ Funciones Para ItemsXML -------------------
function Btn_BuscarItemPorID(param, destino="#salida", metodo="GET"){
    var id_item = $("#txtId").val();
    var pagina  = "Item_MostrarPorId/"+id_item;
    Nexo(pagina);
}