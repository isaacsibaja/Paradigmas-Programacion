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

function customerCare( date, hour, fechaGUI, horaGUI, idDoctor){ 

           if( confirm("Confirmar cita para el dia : " + fechaGUI + " y hora : " + horaGUI ) ){
                $.post( "../controladora/horario/ControllerCustomerCare.php" , 
                    { 
                        accion : "insertar",
                        idDoctor : idDoctor,
                        date : date,
                        hour : hour
                        
                      
                    },
                    function(data)
                    {    //$('#contenedorHorario').html(data);           
                        reloadCustomerCare();
                    }); 
           }else{

           }
       
}

function consulta( fecha, hora, fechaGUI, horaGUI){ 
	$.post( "./horario/Form.php" , 
	    {
		    date : fecha,
            hour : hora,
            fechaGUI : fechaGUI,
            horaGUI : horaGUI
	    },
	    function(data)
	    {               
	    	$('#contenedorFormulario').html(data);
            $("#contenedorMensaje").html("");
            
    	});    
}
	
(function($,W,D){
    var JQUERY4U = {};
    JQUERY4U.UTIL ={
        setupFormValidation: function()
        {
            $("#formularioHorario").validate({
                rules: {
                    case : "required", 
                    email: {
                        required: true,
                        email: true 
                    },
                    email2: {
                        equalTo: "#email", 
                        required: true,
                        email: true
                    }
                },      
                messages: {
                    case: "Nombre del Agente requerido",
                    email: {
                        required: "Correo requerido",
                        email: "Correo debe ser valido ejemplo@ejemplo.com"
                    },
                    email2: {
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
		url : "../controladora/horario/ControllerAppointment.php",
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
    $.post("./horario/Appointment.php",
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

function reloadCustomerCare(){
    $.post("./horario/CustomerCare.php",
    {},
    function (data)
    {
        $('#contenedorHorario').html(data);
    });    
}