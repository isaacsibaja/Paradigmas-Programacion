(function($,W,D){
    var JQUERY4U = {};
 
    JQUERY4U.UTIL ={
        setupFormValidation: function()
        {
            $("#formularioPrecentacionProducto").validate({
                rules: {
                    descripcionPrecentacion: "required"
                },      

                messages: {
                    descripcionPrecentacion: "Descripcion requerida"
                }, 

                submitHandler: function(form) {                 
                    guardarPrecentacionProducto();
                }//Cuando ya esta completado el formulario como debe de ser se envia a la BD :-´)
            });
        }
    }
 
    
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
       // console.log("Entro 2");
    });//Verifica que los datos ingresados sean validos 
 
} ) (jQuery, window, document);


	function guardarPrecentacionProducto(){
		var formData = new FormData(document.getElementById("formularioPrecentacionProducto"));        
		formData.append("accion", "insertar");
		$.ajax({
		url : "../controladora/precentacionProducto/ControladoraPrecentacionProducto.php",
		type : "post",
		dataType : "html",
		data : formData,
		cache : false,
		contentType : false,
		processData : false
		}).done(function(data) {
			$("#contenedor2").html(data);
			cargarListaPrecentacionProducto();
		});     	
	}	

    registrarPrecentacionProducto

    function registrarPrecentacionProducto(){        
     $.post("../interfaz/precentacionProducto/precentacionProducto.php",
    {},
    function (data)
    {
        $('#contenedor').html(data);
    }); 
}

function cargarListaPrecentacionProducto() {
    $.post("../interfaz/precentacionProducto/precentacionProductoLista.php",
        {},
        function (data)
        {
            $('#contenedor3').html(data);
        });
}

function eliminarPrecentacionProducto(id){
      
    if (confirm("¿Esta apunto de eliminar esta Precentacion = " + id + " ?")) {
		$.post("../controladora/precentacionProducto/ControladoraPrecentacionProducto.php", 
	    {
		    accion: "eliminar", 
		    idPrecentacionProducto : id
	    },
	    function(data)
	    {               
	    	$('#contenedor2').html(data);
	    	cargarListaPrecentacionProducto();
    	});
    }
 }



(function($,W,D){
    var JQUERY4U = {};
 
    JQUERY4U.UTIL ={
        setupFormValidation: function()
        {
            $("#formularioPrecentacionProductoModificar").validate({
                rules: {
                    descripcionPrecentacion: "required"
                },      

                messages: {
                    descripcionPrecentacion: "Descripcion requerida"
                }, 

                submitHandler: function(form) {                 
                    modificarPrecentacionProducto();
                }//Cuando ya esta completado el formulario como debe de ser se envia a la BD :-´)
            });
        }
    }
 
    
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });
 
} ) (jQuery, window, document);

function modificarPrecentacionProducto(){
	var formData = new FormData(document.getElementById("formularioPrecentacionProductoModificar"));
    
	formData.append("accion", "modificar");//Indica el metodo o funcion
	$.ajax({
	url : "../controladora/precentacionProducto/ControladoraPrecentacionProducto.php",
	type : "post",
	dataType : "html",
	data : formData,
	cache : false,
	contentType : false,
	processData : false
	}).done(function(data) {
		$("#contenedor2").html(data);
		cargarListaPrecentacionProducto();
	});
 	
}	


function modificarPrecentacionProductoConsulta(id){    

	$.post("./precentacionProducto/precentacionProductoModificar.php", 
	    {
		    idPrecentacionProducto : id
	    },

	    function(data)
	    {               
	    	$('#contenedor').html(data);
    	});
}

$(function(){
    $.post("./precentacionProducto/precentacionProductoLista.php",
    {},
    function (data)
    {
        $('#contenedor3').html(data);
    });    
});


$(function(){ 
    $('#contenedor2').html("");    
});
