(function($,W,D){
    var JQUERY4U = {};
 
    JQUERY4U.UTIL ={
        setupFormValidation: function()
        {
            $("#formularioPresentacionProducto").validate({
                rules: {
                    descripcionPresentacion: "required"
                },      

                messages: {
                    descripcionPresentacion: "Descripcion requerida"
                }, 

                submitHandler: function(form) {                 
                    guardarPresentacionProducto();
                }//Cuando ya esta completado el formulario como debe de ser se envia a la BD :-´)
            });
        }
    }
 
    
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
       // console.log("Entro 2");
    });//Verifica que los datos ingresados sean validos 
 
} ) (jQuery, window, document);

	function guardarPresentacionProducto(){
		var formData = new FormData(document.getElementById("formularioPresentacionProducto"));        
		formData.append("accion", "insertar");
		$.ajax({
		url : "../controladora/presentacionProducto/ControladoraPresentacionProducto.php",
		type : "post",
		dataType : "html",
		data : formData,
		cache : false,
		contentType : false,
		processData : false
		}).done(function(data) {
			$("#contenedorMensaje").html(data);
			cargarListaPresentacionProducto();
		});     	
	}	

    registrarPresentacionProducto

    function registrarPresentacionProducto(){        
     $.post("../interfaz/presentacionProducto/PresentacionProducto.php",
    {},
    function (data)
    {
        $('#contenedorFormulario').html(data);
    }); 
}

function cargarListaPresentacionProducto() {
    $.post("../interfaz/presentacionProducto/PresentacionProductoLista.php",
        {},
        function (data)
        {
            $('#contenedorLista').html(data);
        });
}

function eliminarPresentacionProducto(id){
      
    if (confirm("¿Esta apunto de eliminar esta Presentacion = " + id + " ?")) {
		$.post("../controladora/presentacionProducto/ControladoraPresentacionProducto.php", 
	    {
		    accion: "eliminar", 
		    idPresentacionProducto : id
	    },
	    function(data)
	    {               
	    	$('#contenedorMensaje').html(data);
	    	cargarListaPresentacionProducto();
    	});
    }
 }



(function($,W,D){
    var JQUERY4U = {};
 
    JQUERY4U.UTIL ={
        setupFormValidation: function()
        {
            $("#formularioPresentacionProductoModificar").validate({
                rules: {
                    descripcionPresentacion: "required"
                },      

                messages: {
                    descripcionPresentacion: "Descripcion requerida"
                }, 

                submitHandler: function(form) {                 
                    modificarPresentacionProducto();
                }//Cuando ya esta completado el formulario como debe de ser se envia a la BD :-´)
            });
        }
    }
 
    
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });
 
} ) (jQuery, window, document);

function modificarPresentacionProducto(){
	var formData = new FormData(document.getElementById("formularioPresentacionProductoModificar"));
    
	formData.append("accion", "modificar");//Indica el metodo o funcion
	$.ajax({
	url : "../controladora/presentacionProducto/ControladoraPresentacionProducto.php",
	type : "post",
	dataType : "html",
	data : formData,
	cache : false,
	contentType : false,
	processData : false
	}).done(function(data) {
		$("#contenedorMensaje").html(data);
		cargarListaPresentacionProducto();
	});
 	
}	


function modificarPresentacionProductoConsulta(id){    

	$.post("./presentacionProducto/PresentacionProductoModificar.php", 
	    {
		    idPresentacionProducto : id
	    },

	    function(data)
	    {               
	    	$('#contenedorFormulario').html(data);
    	});
}

$(function(){
    $.post("./presentacionProducto/PresentacionProductoLista.php",
    {},
    function (data)
    {
        $('#contenedorLista').html(data);
    });    
});


$(function(){ 
    $('#contenedorMensaje').html("");    
});
