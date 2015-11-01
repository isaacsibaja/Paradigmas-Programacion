$("#telefonoAgente").mask('9999 9999');
(function($,W,D){
    var JQUERY4U = {};
 
    JQUERY4U.UTIL ={
        setupFormValidation: function()
        {
            $("#formularioAgenteVentas").validate({
                rules: {
                    nombreAgente: "required",
                    telefonoAgente: "required",
                    correoAgente: {
                        required: true,
                        email: true 
                    },
                    correoAgente2: {
                        equalTo: "#correoAgente", 
                        required: true,
                        email: true
                    }
                },      

                messages: {
                    nombreAgente: "Nombre del Agente requerido",
                    telefonoAgente: "Telefono del Agente requerido",
                    correoagenteVentas: {
                        required: "Correo requerido",
                        email: "Correo debe ser valido ejemplo@ejemplo.com"
                    },
                    correoAgente2: {
                        equalTo: "El correo no es igual", 
                        required: "Correo requerido",
                        email: "Correo debe ser valido ejemplo@ejemplo.com"
                    }

                }, 

                submitHandler: function(form) {                 
                    guardarAgenteVentas();
                }//Cuando ya esta completado el formulario como debe de ser se envia a la BD :-´)
            });
        }
    }
 
    
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
       // console.log("Entro 2");
    });//Verifica que los datos ingresados sean validos 
 
} ) (jQuery, window, document);


	function guardarAgenteVentas(){
		var formData = new FormData(document.getElementById("formularioAgenteVentas"));        
		formData.append("accion", "insertar");
		$.ajax({
		url : "../controladora/agenteVentas/ControladoraAgenteVentas.php",
		type : "post",
		dataType : "html",
		data : formData,
		cache : false,
		contentType : false,
		processData : false
		}).done(function(data) {
			$("#contenedorMensaje").html(data);
			cargarListaAgenteVentas();
		});     	
	}	

    registrarAgenteVentas

    function registrarAgenteVentas(){        
     $.post("../interfaz/agenteVentas/AgenteVentas.php",
    {},
    function (data)
    {
        $('#contenedorFormulario').html(data);
    }); 
}

function cargarListaAgenteVentas() {
    $.post("../interfaz/agenteVentas/AgenteVentasLista.php",
        {},
        function (data)
        {
            $('#contenedorLista').html(data);
        });
}

function eliminarAgenteVentas(id){
      
    if (confirm("¿Esta apunto de eliminar este Agente Ventas = " + id + " ?")) {
		$.post("../controladora/agenteVentas/ControladoraAgenteVentas.php", 
	    {
		    accion: "eliminar", 
		    idAgenteVenta : id
	    },
	    function(data)
	    {               
	    	$('#contenedorMensaje').html(data);
	    	cargarListaAgenteVentas();
    	});
    }
 }



(function($,W,D){
    var JQUERY4U = {};
 
    JQUERY4U.UTIL ={
        setupFormValidation: function()
        {
            $("#formularioAgenteVentasModificar").validate({
                rules: {
                    nombreAgente: "required",
                    telefonoAgente: "required",
                    correoAgente: {
                        required: true,
                        email: true 
                    },
                    correoAgente2: {
                        equalTo: "#correoAgente", 
                        required: true,
                        email: true
                    }
                },      

                messages: {
                    nombreAgente: "Nombre del Agente requerido",
                    telefonoAgente: "Telefono del Agente requerido",
                    correoAgente: {
                        required: "Correo requerido",
                        email: "Correo debe ser valido ejemplo@ejemplo.com"
                    },
                    correoAgente2: {
                        equalTo: "El correo no es igual", 
                        required: "Correo requerido",
                        email: "Correo debe ser valido ejemplo@ejemplo.com"
                    }

                }, 

                submitHandler: function(form) {                 
                    modificarAgenteVentas();
                }//Cuando ya esta completado el formulario como debe de ser se envia a la BD :-´)
            });
        }
    }
 
    
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });
 
} ) (jQuery, window, document);

function modificarAgenteVentas(){
	var formData = new FormData(document.getElementById("formularioAgenteVentasModificar"));
    
	formData.append("accion", "modificar");//Indica el metodo o funcion
	$.ajax({
	url : "../controladora/agenteVentas/ControladoraAgenteVentas.php",
	type : "post",
	dataType : "html",
	data : formData,
	cache : false,
	contentType : false,
	processData : false
	}).done(function(data) {
		$("#contenedorMensaje").html(data);
		cargarListaAgenteVentas();
	});
 	
}	


function modificarAgenteVentasConsulta(id){    

	$.post("./agenteVentas/AgenteVentasModificar.php", 
	    {
		    idAgenteVenta : id
	    },

	    function(data)
	    {               
	    	$('#contenedorFormulario').html(data);
    	});
    
}

$(function(){
    $.post("./agenteVentas/AgenteVentasLista.php",
    {},
    function (data)
    {
        $('#contenedorLista').html(data);
    });    
});


$(function(){ 
    $('#contenedorMensaje').html("");    
});
