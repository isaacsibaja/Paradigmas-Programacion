function regent( date, hour, fechaGUI, horaGUI, idDoctor){ 

           if( confirm("Confirmar reservacion para el dia : " + fechaGUI + " y hora : " + horaGUI ) ){
                $.post( "../controladora/horario/ControllerRegent.php" , 
                    { 
                        accion : "insertar",
                        idDoctor : idDoctor,
                        date : date,
                        hour : hour
                        
                      
                    },
                    function(data)
                    {    //$('#contenedorHorario').html(data);           
                        reloadRegent();
                    }); 
           }else{

           }
       
}

function consulta( fecha, hora, fechaGUI, horaGUI){ 
	$.post( "./horario/Form.php" , 
	    {
		    fecha : fecha,
            hora : hora,
            fechaGUI : fechaGUI,
            horaGUI : horaGUI
	    },
	    function(data)
	    {               
	    	$('#contenedorFormulario').html(data);
    	});    
}
	
(function($,W,D){
    var JQUERY4U = {};
    JQUERY4U.UTIL ={
        setupFormValidation: function()
        {
            $("#formularioHorario").validate({
                rules: {
                    asunto: "required", 
                    correo: {
                        required: true,
                        email: true 
                    },
                    correo2: {
                        equalTo: "#correo", 
                        required: true,
                        email: true
                    }
                },      
                messages: {
                    asunto: "Nombre del Agente requerido",
                    correo: {
                        required: "Correo requerido",
                        email: "Correo debe ser valido ejemplo@ejemplo.com"
                    },
                    correo2: {
                        equalTo: "El correo no es igual", 
                        required: "Correo requerido",
                        email: "Correo debe ser valido ejemplo@ejemplo.com"
                    }
                }, 
                submitHandler: function(form) {                 
                    guardarCita();
                }
            });
        }
    }    
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });
 
} ) (jQuery, window, document);

function guardarCita(){
		var formData = new FormData(document.getElementById("formularioHorario"));        
		formData.append("accion", "insertar");
		$.ajax({
		url : "../controladora/horario/ControladoraHorario.php",
		type : "post",
		dataType : "html",
		data : formData,
		cache : false,
		contentType : false,
		processData : false
		}).done(function(data) {
			$("#contenedorMensaje").html(data);
            $('#contenedorFormulario').html("");	
			recargarHorario()		
		});     	
	}

function recargarHorario(){
    $.post("./horario/Horario.php",
    {},
    function (data)
    {
        $('#contenedorHorario').html(data);
    });    
}

function reloadRegent(){
    $.post("./horario/Regente.php",
    {},
    function (data)
    {
        $('#contenedorHorario').html(data);
    });    
}