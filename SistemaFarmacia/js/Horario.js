function regent( date, hour, fechaGUI, horaGUI, idDoctor){ 

           if( confirm("Confirmar Disponibilidad para el dia : " + fechaGUI + " y hora : " + horaGUI ) ){
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

          if( confirm("Confirmar Disponibilidad para el dia : " + fechaGUI + " y hora : " + horaGUI ) ){
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
                    case : "required"
                },      
                messages: {
                    case: "Nombre del Agente requerido"
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
			recargarHorario();		
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

/*====================History============================*/
(function($,W,D){
    var JQUERY4U = {};
    JQUERY4U.UTIL ={
        setupFormValidation: function()
        {
            $("#searchHistory").validate({
                rules: {
                    from : "required", 
                    to: "required"
                },      
                messages: {
                     from : "Seleccione fecha Desde", 
                    to: "Seleccione fecha Hasta"
                }, 
                submitHandler: function(form) {                 
                    queryHistory();
                }
            });
        }
    }    
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });
 
} ) (jQuery, window, document);

function queryHistory(){
        var formData = new FormData(document.getElementById("searchHistory"));        
       // formData.append("accion", "insertar");
        $.ajax({
        url : "./horario/History.php",
        type : "post",
        dataType : "html",
        data : formData,
        cache : false,
        contentType : false,
        processData : false
        }).done(function(data) {
            $("#containerHistory").html(data);                   
        });         
    }

$(function(){
    $('#from').datepicker();
});
$(function(){
    $('#to').datepicker();
});
$("#from").mask('99-99-9999');
$("#to").mask('99-99-9999');


/*====================Payment============================*/
(function($,W,D){
    var JQUERY4U = {};
    JQUERY4U.UTIL ={
        setupFormValidation: function()
        {
            $("#searchPayment").validate({
                rules: {
                    from : "required", 
                    to: "required"
                },      
                messages: {
                     from : "Seleccione fecha Desde", 
                    to: "Seleccione fecha Hasta"
                }, 
                submitHandler: function(form) {                 
                    queryPayment();
                }
            });
        }
    }    
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });
 
} ) (jQuery, window, document);

function queryPayment(){
        var formData = new FormData(document.getElementById("searchPayment"));        
       // formData.append("accion", "insertar");
        $.ajax({
        url : "./horario/MonthlyPayment.php",
        type : "post",
        dataType : "html",
        data : formData,
        cache : false,
        contentType : false,
        processData : false
        }).done(function(data) {
            $("#containerPayment").html(data);                   
        });         
    }