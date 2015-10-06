(function($,W,D){
    var JQUERY4U = {};
    
    JQUERY4U.UTIL ={
        setupFormValidation: function()
        {
            $("#formularioUnidadMedida").validate({
                rules: {
                    descripcionUnidad: "required"
                },      

                messages: {
                    descripcionUnidad: "Descripcion requerida"
                }, 

                submitHandler: function(form) {                 
                    guardarUnidadMedida();
                }//Cuando ya esta completado el formulario como debe de ser se envia a la BD :-´)
            });
        }
    }
 
    
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
       // console.log("Entro 2");
    });//Verifica que los datos ingresados sean validos 
 
} ) (jQuery, window, document);


    function guardarUnidadMedida(){
        var formData = new FormData(document.getElementById("formularioUnidadMedida"));        
        formData.append("accion", "insertar");
        $.ajax({
        url : "../controladora/unidadMedida/ControladoraUnidadMedida.php",
        type : "post",
        dataType : "html",
        data : formData,
        cache : false,
        contentType : false,
        processData : false
        }).done(function(data) {
            $("#contenedoMensaje").html(data);
            cargarListaUnidadMedida();
        });         
    }   

    contenedorFormulario
contenedoMensaje
contenedorLista

    function registrarUnidadMedida(){        
     $.post("../interfaz/unidadMedida/UnidadMedida.php",
    {},
    function (data)
    {
        $('#contenedorFormulario').html(data);
    }); 
}

function cargarListaUnidadMedida() {
    $.post("../interfaz/unidadMedida/UnidadMedidaLista.php",
        {},
        function (data)
        {
            $('#contenedorLista').html(data);
        });
}

function eliminarUnidadMedida(id){
      
    if (confirm("¿Esta apunto de eliminar esta Unidad Medida = " + id + " ?")) {
        $.post("../controladora/unidadMedida/ControladoraUnidadMedida.php", 
        {
            accion: "eliminar", 
            idUnidadMedida : id
        },
        function(data)
        {               
            $('#contenedoMensaje').html(data);
            cargarListaUnidadMedida();
        });
    }
 }



(function($,W,D){
    var JQUERY4U = {};
 
    JQUERY4U.UTIL ={
        setupFormValidation: function()
        {
            $("#formularioUnidadMedidaModificar").validate({
                rules: {
                    descripcionUnidad: "required"
                },      

                messages: {
                    descripcionUnidad: "Descripcion requerida"
                }, 

                submitHandler: function(form) {                 
                    modificarUnidadMedida();
                }//Cuando ya esta completado el formulario como debe de ser se envia a la BD :-´)
            });
        }
    }
 
    
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });
 
} ) (jQuery, window, document);

function modificarUnidadMedida(){
    var formData = new FormData(document.getElementById("formularioUnidadMedidaModificar"));
    
    formData.append("accion", "modificar");//Indica el metodo o funcion
    $.ajax({
    url : "../controladora/unidadMedida/ControladoraUnidadMedida.php",
    type : "post",
    dataType : "html",
    data : formData,
    cache : false,
    contentType : false,
    processData : false
    }).done(function(data) {
        $("#contenedoMensaje").html(data);
        cargarListaUnidadMedida();
    });
    
}   


function modificarUnidadMedidaConsulta(id){    

    $.post("./unidadMedida/UnidadMedidaModificar.php", 
        {
            idUnidadMedida : id
        },

        function(data)
        {               
            $('#contenedorFormulario').html(data);
        });
}

$(function(){
    $.post("./unidadMedida/UnidadMedidaLista.php",
    {},
    function (data)
    {
        $('#contenedorLista').html(data);
    });    
});


$(function(){ 
    $('#contenedoMensaje').html("");    
});
