$("#telefonoCasaComercial").mask('9999 9999');
$("#faxCasaComercial").mask('9999 9999');

(function($,W,D){
    var JQUERY4U = {};
 
    JQUERY4U.UTIL ={
        setupFormValidation: function()
        {
            $("#formularioCasaComercial").validate({
                rules: {
                    nombreCasaComercial: "required",
                    direccionCasaComercial: "required",
                    faxCasaComercial: "required",
                    telefonoCasaComercial: "required",
                    correoCasaComercial: {
                        required: true,
                        email: true 
                    },
                    correoCasaComercial2: {
                        equalTo: "#correoCasaComercial", 
                        required: true,
                        email: true
                    }
                },      

                messages: {
                    nombreCasaComercial: "Nombre de la Casa Comercial requerido",
                    direccionCasaComercial: "Direccion de la Casa Comercial requerido",
                    telefonoCasaComercial: "Telefono de la Casa Comercial requerido",
                    faxCasaComercial: "Fax de la Casa Comercial requerido",

                    correoCasaComercial: {
                        required: "Correo requerido",
                        email: "Correo debe ser valido ejemplo@ejemplo.com"
                    },
                    correoCasaComercial2: {
                        equalTo: "El correo no es igual", 
                        required: "Correo requerido",
                        email: "Correo debe ser valido ejemplo@ejemplo.com"
                    }

                }, 

                submitHandler: function(form) {                 
                    guardarCasaComercial();
                }//Cuando ya esta completado el formulario como debe de ser se envia a la BD :-´)
            });
        }
    }
 
    
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
       // console.log("Entro 2");
    });//Verifica que los datos ingresados sean validos 
 
} ) (jQuery, window, document);


	function guardarCasaComercial(){
		var formData = new FormData(document.getElementById("formularioCasaComercial"));        
		formData.append("accion", "insertar");
		$.ajax({
		url : "../controladora/casaComercial/ControladoraCasaComercial.php",
		type : "post",
		dataType : "html",
		data : formData,
		cache : false,
		contentType : false,
		processData : false
		}).done(function(data) {
			$("#contenedor2").html(data);
			cargarListaCasaComercial();
		});     	
	}	

    registrarCasaComercial

    function registrarCasaComercial(){        
     $.post("../interfaz/casaComercial/f_casaComercial.php",
    {},
    function (data)
    {
        $('#contenedor').html(data);
    }); 
}

function cargarListaCasaComercial() {
    $.post("../interfaz/casaComercial/f_casaComercialLista.php",
        {},
        function (data)
        {
            $('#contenedor3').html(data);
        });
}

function eliminarCasaComercial(id){
      
    if (confirm("¿Esta apunto de eliminar esta Casa Comercial = " + id + " ?")) {
		$.post("../controladora/casaComercial/ControladoraCasaComercial.php", 
	    {
		    accion: "eliminar", 
		    idCasaComercial : id
	    },
	    function(data)
	    {               
	    	$('#contenedor2').html(data);
	    	cargarListaCasaComercial();
    	});
    }
 }



(function($,W,D){
    var JQUERY4U = {};
 
    JQUERY4U.UTIL ={
        setupFormValidation: function()
        {
            $("#formularioCasaComercialModificar").validate({
                rules: {
                    nombreCasaComercial: "required",
                    direccionCasaComercial: "required",
                    faxCasaComercial: "required",
                    telefonoCasaComercial: "required",
                    correoCasaComercial: {
                        required: true,
                        email: true 
                    },
                    correoCasaComercial2: {
                        equalTo: "#correoCasaComercial", 
                        required: true,
                        email: true
                    }
                },      

                messages: {
                    nombreCasaComercial: "Nombre de la Casa Comercial requerido",
                    direccionCasaComercial: "Direccion de la Casa Comercial requerido",
                    telefonoCasaComercial: "Telefono de la Casa Comercial requerido",
                    faxCasaComercial: "Fax de la Casa Comercial requerido",
                    correoCasaComercial: {
                        required: "Correo requerido",
                        email: "Correo debe ser valido ejemplo@ejemplo.com"
                    },
                    correoCasaComercial2: {
                        equalTo: "El correo no es igual", 
                        required: "Correo requerido",
                        email: "Correo debe ser valido ejemplo@ejemplo.com"
                    }

                }, 

                submitHandler: function(form) {                 
                    modificarCasaComercial();
                }//Cuando ya esta completado el formulario como debe de ser se envia a la BD :-´)
            });
        }
    }
 
    
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });
 
} ) (jQuery, window, document);

function modificarCasaComercial(){
	var formData = new FormData(document.getElementById("formularioCasaComercialModificar"));
    
	formData.append("accion", "modificar");//Indica el metodo o funcion
	$.ajax({
	url : "../controladora/casaComercial/ControladoraCasaComercial.php",
	type : "post",
	dataType : "html",
	data : formData,
	cache : false,
	contentType : false,
	processData : false
	}).done(function(data) {
		$("#contenedor2").html(data);
		cargarListaCasaComercial();
	});
 	
}	


function modificarCasaComercialConsulta(id){    

	$.post("./casaComercial/f_casaComercialModificar.php", 
	    {
		    idCasaComercial : id
	    },

	    function(data)
	    {               
	    	$('#contenedor').html(data);
    	});
    
}

$(function(){
    $.post("./casaComercial/f_casaComercialLista.php",
    {},
    function (data)
    {
        $('#contenedor3').html(data);
    });    
});


$(function(){ 
    $('#contenedor2').html("");    
});
