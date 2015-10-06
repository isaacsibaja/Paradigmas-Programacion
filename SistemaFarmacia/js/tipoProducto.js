(function($,W,D){
    var JQUERY4U = {};
 
    JQUERY4U.UTIL ={
        setupFormValidation: function()
        {
            $("#formularioTipoProducto").validate({
                rules: {
                    descripcionTipo: "required"
                },      

                messages: {
                    descripcionTipo: "Descripcion requerida"
                }, 

                submitHandler: function(form) {                 
                    guardarTipoProducto();
                }//Cuando ya esta completado el formulario como debe de ser se envia a la BD :-´)
            });
        }
    }
 
    
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
       // console.log("Entro 2");
    });//Verifica que los datos ingresados sean validos 
 
} ) (jQuery, window, document);


    function guardarTipoProducto(){
        var formData = new FormData(document.getElementById("formularioTipoProducto"));        
        formData.append("accion", "insertar");
        $.ajax({
        url : "../controladora/tipoProducto/ControladoraTipoProducto.php",
        type : "post",
        dataType : "html",
        data : formData,
        cache : false,
        contentType : false,
        processData : false
        }).done(function(data) {
            $("#contenedoMensaje").html(data);
            cargarListaTipoProducto();
        });         
    }   

    function registrarTipoProducto(){        
     $.post("../interfaz/tipoProducto/TipoProducto.php",
    {},
    function (data)
    {
        $('#contenedorFormulario').html(data);
    }); 
}

function cargarListaTipoProducto() {
    $.post("../interfaz/tipoProducto/TipoProductoLista.php",
        {},
        function (data)
        {
            $('#contenedorLista').html(data);
        });
}

function eliminarTipoProducto(id){
      
    if (confirm("¿Esta apunto de eliminar este Tipo Producto = " + id + " ?")) {
        $.post("../controladora/tipoProducto/ControladoraTipoProducto.php", 
        {
            accion: "eliminar", 
            idTipoProducto : id
        },
        function(data)
        {               
            $('#contenedoMensaje').html(data);
            cargarListaTipoProducto();
        });
    }
 }



(function($,W,D){
    var JQUERY4U = {};
 
    JQUERY4U.UTIL ={
        setupFormValidation: function()
        {
            $("#formularioTipoProductoModificar").validate({
                rules: {
                    descripcionTipo: "required"
                },      

                messages: {
                    descripcionTipo: "Descripcion requerida"
                }, 

                submitHandler: function(form) {                 
                    modificarTipoProducto();
                }//Cuando ya esta completado el formulario como debe de ser se envia a la BD :-´)
            });
        }
    }
 
    
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });
 
} ) (jQuery, window, document);

function modificarTipoProducto(){
    var formData = new FormData(document.getElementById("formularioTipoProductoModificar"));
    
    formData.append("accion", "modificar");//Indica el metodo o funcion
    $.ajax({
    url : "../controladora/tipoProducto/ControladoraTipoProducto.php",
    type : "post",
    dataType : "html",
    data : formData,
    cache : false,
    contentType : false,
    processData : false
    }).done(function(data) {
        $("#contenedoMensaje").html(data);
        cargarListaTipoProducto();
    });
    
}   


function modificarTipoProductoConsulta(id){    

    $.post("./tipoProducto/TipoProductoModificar.php", 
        {
            idTipoProducto : id
        },

        function(data)
        {               
            $('#contenedorFormulario').html(data);
        });
}

$(function(){
    $.post("./tipoProducto/TipoProductoLista.php",
    {},
    function (data)
    {
        $('#contenedorLista').html(data);
    });    
});


$(function(){ 
    $('#contenedoMensaje').html("");    
});
