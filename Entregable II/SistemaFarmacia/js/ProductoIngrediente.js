
	function agregarProductoIngrediente(){

		var formData = new FormData(document.getElementById("formularioProductoIngredienteAgregar"));        
		formData.append("accion", "insertar");
		$.ajax({
		url : "../controladora/productoIngrediente/ControladoraProductoIngrediente.php",
		type : "post",
		dataType : "html",
		data : formData,
		cache : false,
		contentType : false,
		processData : false
		}).done(function(data) {
			$("#contenedorMensaje").html(data);
			seleccionarProductoIngrediente($('#idProducto').val());
		});     	
	}	

    function registrarProductoIngrediente(){        
   
        $('#contenedor').load("../interfaz/productoIngrediente/ProductoIngrediente.php");
  
}

function cargarListaProductoIngrediente() {
    $.post("../interfaz/productoIngrediente/ProductoLista.php",
        {},
        function (data)
        {
            $('#contenedorLista').html(data);
        });
}

function eliminarProductoIngrediente(idP, idI){
      alert(idP + "  -  " + idI);
    if (confirm("¿Esta apunto de eliminar este ingrediente Activo = " + idP + " ?")) {
		$.post("../controladora/productoIngrediente/ControladoraProductoIngrediente.php", 
	    {
		    accion: "eliminar", 
		    idProducto : idP,
		    idIngredienteActivo : idI
	    },
	    function(data)
	    {               
	    	$('#contenedorMensaje').html(data);
	    	seleccionarProductoIngrediente(idP);
    	});
    }
 }



(function($,W,D){
    var JQUERY4U = {};
 
    JQUERY4U.UTIL ={
        setupFormValidation: function()
        {
            $("#formularioModificarproductoIngrediente").validate({
                rules: {
                    descripcionIngrediente: "required"
                }, 
                messages: {
                    descripcionIngrediente: "Descripcion requerida"
                }, 
                submitHandler: function(form) {                 
                    modificarproductoIngrediente();
                }
            });
        }
    }    
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });
} ) (jQuery, window, document);

function modificarProductoIngrediente(){
	var formData = new FormData(document.getElementById("formularioModificarproductoIngrediente"));
    
	formData.append("accion", "modificar");//Indica el metodo o funcion
	$.ajax({
	url : "../controladora/productoIngrediente/ControladoraProductoIngrediente.php",
	type : "post",
	dataType : "html",
	data : formData,
	cache : false,
	contentType : false,
	processData : false
	}).done(function(data) {
		$("#contenedorMensaje").html(data);
		cargarListaproductoIngrediente();
	});
 	
}	


function seleccionarProductoIngrediente(idP){    

	$.post("./productoIngrediente/ProductoIngredienteModificar.php", 
	    {
		    idProducto : idP,
	    },
	    function(data)
	    {               
	    	$('#contenedorFormulario').html(data);
    	});
    
}

