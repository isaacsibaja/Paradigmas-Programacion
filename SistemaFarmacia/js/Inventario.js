(function($,W,D){
    var JQUERY4U = {};
 
    JQUERY4U.UTIL ={
        setupFormValidation: function()
        {
            $("#formularioInventario").validate({
                rules: {
                    idProducto: "required",
                    cantidad: "required",
                },      

                messages: {
                    idProducto: "Id del Producto requerido",
                    cantidad: "cantidad requerida",
                }, 

                submitHandler: function(form) {                 
                    guardarInventario();
                }//Cuando ya esta completado el formulario como debe de ser se envia a la BD :-´)
            });
        }
    }
 
    
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
       // console.log("Entro 2");
    });//Verifica que los datos ingresados sean validos 
 
} ) (jQuery, window, document);


	function guardarInventario(){
		var formData = new FormData(document.getElementById("formularioInventario"));        
		formData.append("accion", "insertar");
		$.ajax({
		url : "../controladora/inventario/ControladoraInventario.php",
		type : "post",
		dataType : "html",
		data : formData,
		cache : false,
		contentType : false,
		processData : false
		}).done(function(data) {
			$("#contenedor2").html(data);
			cargarListaInventario();
		});     	
	}	

    registrarInventario

    function registrarInventario(){        
     $.post("../interfaz/inventario/Inventario.php",
    {},
    function (data)
    {
        $('#contenedor').html(data);
    }); 
}

function cargarListaInventario() {
    $.post("../interfaz/inventario/InventarioLista.php",
        {},
        function (data)
        {
            $('#contenedor3').html(data);
        });
}

function eliminarInventario(id){
      
    if (confirm("¿Esta apunto de eliminar este inventario = " + id + " ?")) {
		$.post("../controladora/inventario/ControladoraInventario.php", 
	    {
		    accion: "eliminar", 
		    idInventario : id
	    },
	    function(data)
	    {               
	    	$('#contenedor2').html(data);
	    	cargarListaInventario();
    	});
    }
 }



(function($,W,D){
    var JQUERY4U = {};
 
    JQUERY4U.UTIL ={
        setupFormValidation: function()
        {
            $("#formularioInventarioModificar").validate({
                rules: {
                    idProducto: "required",
                    cantidad: "required",
                },      

                messages: {
                    idProducto: "Id del Producto requerido",
                    cantidad: "Cantidad requerida",
                }, 

                submitHandler: function(form) {                 
                    modificarInventario();
                }//Cuando ya esta completado el formulario como debe de ser se envia a la BD :-´)
            });
        }
    }
 
    
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });
 
} ) (jQuery, window, document);

function modificarInventario(){
	var formData = new FormData(document.getElementById("formularioInventarioModificar"));
    
	formData.append("accion", "modificar");//Indica el metodo o funcion
	$.ajax({
	url : "../controladora/inventario/ControladoraInventario.php",
	type : "post",
	dataType : "html",
	data : formData,
	cache : false,
	contentType : false,
	processData : false
	}).done(function(data) {
		$("#contenedor2").html(data);
		cargarListaInventario();
	});
 	
}	


function modificarInventarioConsulta(id){    

	$.post("./inventario/InventarioModificar.php", 
	    {
		    idInventario : id
	    },

	    function(data)
	    {               
	    	$('#contenedor').html(data);
    	});
    
}

$(function(){
    $.post("./inventario/InventarioLista.php",
    {},
    function (data)
    {
        $('#contenedor3').html(data);
    });    
});


$(function(){ 
    $('#contenedor2').html("");    
});
