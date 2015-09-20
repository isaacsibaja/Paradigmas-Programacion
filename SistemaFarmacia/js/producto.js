(function($,W,D){
    var JQUERY4U = {};
 
    JQUERY4U.UTIL ={
        setupFormValidation: function()
        {

            $("#formularioProducto").validate({
                rules: {
                    descripcion: "required"
                }, 
                messages: {
                    descripcion: "Descripcion requerida"
                }, 
                submitHandler: function(form) {                 
                    guardarProducto();
                }
            });
        }
    }    
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });
 
} ) (jQuery, window, document);


	function guardarProducto(){
		var formData = new FormData(document.getElementById("formularioProducto"));        
		formData.append("accion", "insertar");
		$.ajax({
		url : "../controladora/producto/ControladoraProducto.php",
		type : "post",
		dataType : "html",
		data : formData,
		cache : false,
		contentType : false,
		processData : false
		}).done(function(data) {
			$("#contenedor2").html(data);
			cargarListaProducto();
		});     	
	}	


function registrarProducto(){        
     $.post("../interfaz/producto/producto.php",
    {},
    function (data)
    {
        $('#contenedor').html(data);
    }); 
}

function cargarListaProducto() {
    $.post("../interfaz/producto/productoLista.php",
        {},
        function (data)
        {
            $('#contenedor3').html(data);
        });
}

function eliminarProducto(id){
      
    if (confirm("¿Esta apunto de eliminar este producto = " + id + " ?")) {
		$.post("../controladora/producto/ControladoraProducto.php", 
	    {
		    accion: "eliminar", 
		    idProducto : id
	    },
	    function(data)
	    {               
	    	$('#contenedor2').html(data);
	    	cargarListaProducto();
    	});
    }
 }



(function($,W,D){
    var JQUERY4U = {};
 
    JQUERY4U.UTIL ={
        setupFormValidation: function()
        {
            $("#formularioProductoModificar").validate({
                 rules: {
                    descripcion: "required"
                }, 
                messages: {
                    descripcion: "Descripcion requerida"
                }, 
                submitHandler: function(form) {                 
                    modificarProducto();
                }
            });
        }
    }
 
    
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });
 
} ) (jQuery, window, document);

function modificarProducto(){
	var formData = new FormData(document.getElementById("formularioProductoModificar"));
    
	formData.append("accion", "modificar");
	$.ajax({
	url : "../controladora/producto/ControladoraProducto.php",
	type : "post",
	dataType : "html",
	data : formData,
	cache : false,
	contentType : false,
	processData : false
	}).done(function(data) {
		$("#contenedor2").html(data);
		cargarListaProducto();
	});
 	
}	


function modificarProductoConsulta(id){    

	$.post("./producto/productoModificar.php", 
	    {
		    idProducto : id
	    },

	    function(data)
	    {               
	    	$('#contenedor').html(data);
    	});
    
}

$(function(){
    $.post("../interfaz/producto/productoLista.php",
    {},
    function (data)
    {
        $('#contenedor3').html(data);
    });    
});


$(function(){ 
    $('#contenedor2').html("");    
});
