$("#telefonoProveedor").mask('9999 9999');

(function($,W,D){
    var JQUERY4U = {};
 
    JQUERY4U.UTIL ={
        setupFormValidation: function()
        {
            $("#formularioProveedor").validate({
                rules: {
                    nombreProveedor: "required",
                    telefonoProveedor: "required",
                    correoProveedor: {
                        required: true,
                        email: true 
                    },
                    correoProveedor2: {
                        equalTo: "#correoProveedor", 
                        required: true,
                        email: true
                    }
                },      

                messages: {
                    nombreProveedor: "Nombre del proveedor requerido",
                    telefonoProveedor: "Telefono del proveedor requerido",
                    correoProveedor: {
                        required: "Correo requerido",
                        email: "Correo debe ser valido ejemplo@ejemplo.com"
                    },
                    correoProveedor2: {
                        equalTo: "El correo no es igual", 
                        required: "Correo requerido",
                        email: "Correo debe ser valido ejemplo@ejemplo.com"
                    }

                }, 

                submitHandler: function(form) {                 
                    guardarProveedor();
                }//Cuando ya esta completado el formulario como debe de ser se envia a la BD :-´)
            });
        }
    }
 
    
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
       // console.log("Entro 2");
    });//Verifica que los datos ingresados sean validos 
 
} ) (jQuery, window, document);


	function guardarProveedor(){
		var formData = new FormData(document.getElementById("formularioProveedor"));        
		formData.append("accion", "insertar");
		$.ajax({
		url : "../controladora/proveedor/ControladoraProveedor.php",
		type : "post",
		dataType : "html",
		data : formData,
		cache : false,
		contentType : false,
		processData : false
		}).done(function(data) {
			$("#contenedorMensaje").html(data);
			cargarListaProveedor();
		});     	
	}	



    function registrarProveedor(){        
     $.post("../interfaz/proveedor/Proveedor.php",
    {},
    function (data)
    {
        $('#contenedorFormulario').html(data);
    }); 
}

function cargarListaProveedor() {
    $.post("../interfaz/proveedor/ProveedorLista.php",
        {},
        function (data)
        {
            $('#contenedorLista').html(data);
        });
}

function eliminarProveedor(id){
      
    if (confirm("¿Esta apunto de eliminar este proveedor = " + id + " ?")) {
		$.post("../controladora/proveedor/ControladoraProveedor.php", 
	    {
		    accion: "eliminar", 
		    idProveedor : id
	    },
	    function(data)
	    {               
	    	$('#contenedorMensaje').html(data);
	    	cargarListaProveedor();
    	});
    }
 }



(function($,W,D){
    var JQUERY4U = {};
 
    JQUERY4U.UTIL ={
        setupFormValidation: function()
        {
            $("#formularioProveedorModificar").validate({
                rules: {
                    nombreProveedor: "required",
                    telefonoProveedor: "required",
                    correoProveedor: {
                        required: true,
                        email: true 
                    },
                    correoProveedor2: {
                        equalTo: "#correoProveedor", 
                        required: true,
                        email: true
                    }
                },      

                messages: {
                    nombreProveedor: "Nombre del proveedor requerido",
                    telefonoProveedor: "Telefono del proveedor requerido",
                    correoProveedor: {
                        required: "Correo requerido",
                        email: "Correo debe ser valido ejemplo@ejemplo.com"
                    },
                    correoProveedor2: {
                        equalTo: "El correo no es igual", 
                        required: "Correo requerido",
                        email: "Correo debe ser valido ejemplo@ejemplo.com"
                    }

                }, 

                submitHandler: function(form) {                 
                    modificarProveedor();
                }//Cuando ya esta completado el formulario como debe de ser se envia a la BD :-´)
            });
        }
    }
 
    
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });
 
} ) (jQuery, window, document);

function modificarProveedor(){
	var formData = new FormData(document.getElementById("formularioProveedorModificar"));
    
	formData.append("accion", "modificar");//Indica el metodo o funcion
	$.ajax({
	url : "../controladora/proveedor/ControladoraProveedor.php",
	type : "post",
	dataType : "html",
	data : formData,
	cache : false,
	contentType : false,
	processData : false
	}).done(function(data) {
		$("#contenedorMensaje").html(data);
		cargarListaProveedor();
	});
 	
}	


function modificarProveedorConsulta(id){    

	$.post("./proveedor/ProveedorModificar.php", 
	    {
		    idProveedor : id
	    },

	    function(data)
	    {               
	    	$('#contenedorFormulario').html(data);
    	});
    
}

$(function(){
    $.post("./proveedor/ProveedorLista.php",
    {},
    function (data)
    {
        $('#contenedorLista').html(data);
    });    
});


$(function(){ 
    $('#contenedorMensaje').html("");    
});
