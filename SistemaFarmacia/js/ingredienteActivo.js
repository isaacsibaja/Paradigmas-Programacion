(function($,W,D){
    var JQUERY4U = {};
 
    JQUERY4U.UTIL ={
        setupFormValidation: function()
        {
            $("#formularioIngredienteActivo").validate({
                rules: {
                    descripcionIngrediente: "required"
                },      
                messages: {
                    descripcionIngrediente: "Descripcion requerida"
                }, 
                submitHandler: function(form) {                 
                    guardarIngredienteActivo();
                }
            });
        }
    }    
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });
 
} ) (jQuery, window, document);


	function guardarIngredienteActivo(){

		var formData = new FormData(document.getElementById("formularioIngredienteActivo"));        
		formData.append("accion", "insertar");
		$.ajax({
		url : "../controladora/ingredienteActivo/ControladoraIngredienteActivo.php",
		type : "post",
		dataType : "html",
		data : formData,
		cache : false,
		contentType : false,
		processData : false
		}).done(function(data) {
			$("#contenedor2").html(data);
			cargarListaIngredienteActivo();
		});     	
	}	

    function registrarIngredienteActivo(){        
   
        $('#contenedor').load("../interfaz/ingredienteActivo/IngredienteActivo.php");
  
}

function cargarListaIngredienteActivo() {
    $.post("../interfaz/ingredienteActivo/IngredienteActivoLista.php",
        {},
        function (data)
        {
            $('#contenedor3').html(data);
        });
}

function eliminarIngredienteActivo(id){
      
    if (confirm("¿Esta apunto de eliminar este ingrediente Activo = " + id + " ?")) {
		$.post("../controladora/ingredienteActivo/ControladoraIngredienteActivo.php", 
	    {
		    accion: "eliminar", 
		    idIngredienteActivo : id
	    },
	    function(data)
	    {               
	    	$('#contenedor2').html(data);
	    	cargarListaIngredienteActivo();
    	});
    }
 }



(function($,W,D){
    var JQUERY4U = {};
 
    JQUERY4U.UTIL ={
        setupFormValidation: function()
        {
            $("#formularioModificarIngredienteActivo").validate({
                rules: {
                    descripcionIngrediente: "required"
                }, 
                messages: {
                    descripcionIngrediente: "Descripcion requerida"
                }, 
                submitHandler: function(form) {                 
                    modificarIngredienteActivo();
                }
            });
        }
    }    
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });
} ) (jQuery, window, document);

function modificarIngredienteActivo(){
	var formData = new FormData(document.getElementById("formularioModificarIngredienteActivo"));
    
	formData.append("accion", "modificar");//Indica el metodo o funcion
	$.ajax({
	url : "../controladora/ingredienteActivo/ControladoraIngredienteActivo.php",
	type : "post",
	dataType : "html",
	data : formData,
	cache : false,
	contentType : false,
	processData : false
	}).done(function(data) {
		$("#contenedor2").html(data);
		cargarListaIngredienteActivo();
	});
 	
}	


function modificarIngredienteActivoConsulta(id){    

	$.post("./ingredienteActivo/IngredienteActivoModificar.php", 
	    {
		    idIngredienteActivo : id
	    },
	    function(data)
	    {               
	    	$('#contenedor').html(data);
    	});
    
}

$(function(){
    $.post("../interfaz/ingredienteActivo/IngredienteActivoLista.php",
    {},
    function (data)
    {
        $('#contenedor3').html(data);
    });    
});