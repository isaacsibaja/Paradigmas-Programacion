
(function($,W,D){
    var JQUERY4U = {}; 
    JQUERY4U.UTIL ={
        setupFormValidation: function()
        {
            $("#formularioCategoria").validate({
                rules: {
                    descripcion: "required"                 
                },
                messages: {
                    descripcion: "Descripción obligatoria" 
                },
                submitHandler: function(form) {                 
                    guardar();
                }
            });
        }
    }    
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    }); 
 
} ) (jQuery, window, document);


	function guardar(){
		var formData = new FormData(document.getElementById("formularioCategoria"));
        
		formData.append("accion", "insertar");
		$.ajax({
		url : "../controladora/categoria/ControladoraCategoria.php",
		type : "post",
		dataType : "html",
		data : formData,
		cache : false,
		contentType : false,
		processData : false
		}).done(function(data) {
			$("#contenedor2").html(data);
			cargarLista();
		});     	
	}	

function registrarCategoria(){        
     $.post("../interfaz/categoria/Categoria.php",
    {},
    function (data)
    {
        $('#contenedor').html(data);
    }); 
}

function cargarLista() {
    $.post("../interfaz/categoria/CategoriaLista.php",
        {},
        function (data)
        {
            $('#contenedor3').html(data);
        });
}

function eliminarCategoria(id){      
    if (confirm("¿Esta apunto de eliminar esta categoria = " + id + "?")) {
		$.post("../controladora/categoria/ControladoraCategoria.php", 
	    {
		    accion: "eliminar", 
		    idCategoria : id
	    },
	    function(data)
	    {               
	    	$('#contenedor2').html(data);
	    	cargarLista();
    	});
    }
 }


(function($,W,D){
    var JQUERY4U = {}; 
    JQUERY4U.UTIL ={
        setupFormValidation: function()
        {
            //form validation rules
            $("#formularioCategoriaModificar").validate({
                rules: {
                    descripcion: "required"                 
                },      

                messages: {
                    descripcion: "Descripción obligatoria" 
                },//Array de msj requeridos

                submitHandler: function(form) {                 
                    modificarCategoria();
                }
            });
        }
    }    
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });
 
} ) (jQuery, window, document);

function modificarCategoria(){
	var formData = new FormData(document.getElementById("formularioCategoriaModificar"));
    
	formData.append("accion", "modificar");//Indica el metodo o funcion
	$.ajax({
	url : "../controladora/categoria/ControladoraCategoria.php",
	type : "post",
	dataType : "html",
	data : formData,
	cache : false,
	contentType : false,
	processData : false
	}).done(function(data) {
		$("#contenedor2").html(data);
		cargarLista();
	}); 	
}	


function modificarCategoriaConsulta(id){   
	$.post("./categoria/CategoriaModificar.php", 
    {
	    idCategoria : id
    },

    function(data)
    {               
    	$('#contenedor').html(data);
	});
    
}//Mostra el formulario para modificar

$(function(){
    $.post("../interfaz/categoria/CategoriaLista.php",
    {},
    function (data)
    {
        $('#contenedor3').html(data);
    });    
});

$(function(){ 
    $('#contenedor2').html("");    
});