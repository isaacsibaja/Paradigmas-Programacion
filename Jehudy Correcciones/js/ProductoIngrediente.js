
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
			$("#contenedor2").html(data);
			seleccionarProductoIngrediente($('#idProducto').val());
		});     	
	}	

    function registrarproductoIngrediente(){        
   
        $('#contenedor').load("../interfaz/productoIngrediente/ProductoIngrediente.php");
  
}

function cargarListaproductoIngrediente() {
    $.post("../interfaz/productoIngrediente/ProductoLista.php",
        {},
        function (data)
        {
            $('#contenedor3').html(data);
        });
}

function eliminarproductoIngrediente(idP, idI){
      alert(idP + "  -  " + idI);
    if (confirm("¿Esta apunto de eliminar este ingrediente Activo = " + idP + " ?")) {
		$.post("../controladora/productoIngrediente/ControladoraproductoIngrediente.php", 
	    {
		    accion: "eliminar", 
		    idproductoIngrediente : idP,
		    idIngredienteActivo : idI
	    },
	    function(data)
	    {               
	    	$('#contenedor2').html(data);
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

function modificarproductoIngrediente(){
	var formData = new FormData(document.getElementById("formularioModificarproductoIngrediente"));
    
	formData.append("accion", "modificar");//Indica el metodo o funcion
	$.ajax({
	url : "../controladora/productoIngrediente/ControladoraproductoIngrediente.php",
	type : "post",
	dataType : "html",
	data : formData,
	cache : false,
	contentType : false,
	processData : false
	}).done(function(data) {
		$("#contenedor2").html(data);
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
	    	$('#contenedor').html(data);
    	});
    
}

$(function(){
    $.post("../interfaz/productoIngrediente/ProductoLista.php",
    {},
    function (data)
    {
        $('#contenedor3').html(data);
    });    
});