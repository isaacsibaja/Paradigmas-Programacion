$(document).ready(function(){
    $("#concentracion").maskMoney({precision:2})
  });
$(function(){
    $('#fechaVencimiento').datepicker();
});
$("#fechaVencimiento").mask('99-99-9999');
$(document).ready(function(){
     $("#cantidad").maskMoney({precision:0})
});
$(document).ready(function(){
     $("#precioCompra").maskMoney({
        showSymbol:true,
        symbol:"₡", 
        decimal:",", 
        thousands:".", 
        allowZero:true
    });
});
$(document).ready(function(){
     $("#precioVenta").maskMoney({
        showSymbol:true,
        symbol:"₡", 
        decimal:",", 
        thousands:".", 
        allowZero:true
    });
});

(function($,W,D){
    var JQUERY4U = {};
 
    JQUERY4U.UTIL ={
        setupFormValidation: function()
        {
            $("#formularioProductoLote").validate({
                rules: {
                    descripcion: "required",
                    concentracion: "required",
                    fechaIngreso: "required",
                    cantidad: "required",
                    precioCompra: "required",
                    precioVenta: "required"
                }, 
                messages: {
                    descripcion: "Descripcion requerida",
                    concentracion: "Concentracion requerida",
                    fechaIngreso: "Fecha Ingreso requerida",
                    cantidad: "cantidad requerida",
                    precioCompra: "Precio Compra requerido",
                    precioVenta: "Precio Venta requerido"
                }, 
                submitHandler: function(form) {                 
                    guardarProductoLote();
                }
            });
        }
    }    
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });
 
} ) (jQuery, window, document);


	function guardarProductoLote(){
		var formData = new FormData(document.getElementById("formularioProductoLote"));        
		formData.append("accion", "insertar");
		$.ajax({
		url : "../controladora/productoLote/ControladoraProductoLote.php",
		type : "post",
		dataType : "html",
		data : formData,
		cache : false,
		contentType : false,
		processData : false
		}).done(function(data) {
			$("#contenedor2").html(data);
			cargarListaProductoLote();
		});     	
	}	


function registrarProductoLote(){        
     $.post("../interfaz/productoLote/productoLote.php",
    {},
    function (data)
    {
        $('#contenedor').html(data);
    }); 
}

function cargarListaProductoLote() {
    $.post("../interfaz/productoLote/productoLoteLista.php",
        {},
        function (data)
        {
            $('#contenedor3').html(data);
        });
}

function eliminarProductoLote(id){
      
    if (confirm("¿Esta apunto de eliminar este Lote = " + id + " ?")) {
		$.post("../controladora/productoLote/ControladoraProductoLote.php", 
	    {
		    accion: "eliminar", 
		    idProductoLote : id
	    },
	    function(data)
	    {               
	    	$('#contenedor2').html(data);
	    	cargarListaProductoLote();
    	});
    }
 }



(function($,W,D){
    var JQUERY4U = {};
 
    JQUERY4U.UTIL ={
        setupFormValidation: function()
        {
            $("#formularioProductoLoteModificar").validate({
                rules: {
                    descripcion: "required",
                    concentracion: "required",
                    fechaIngreso: "required",
                    cantidad: "required",
                    precioCompra: "required",
                    precioVenta: "required"
                }, 
                messages: {
                    descripcion: "Descripcion requerida",
                    concentracion: "Concentracion requerida",
                    fechaIngreso: "Fecha Ingreso requerida",
                    cantidad: "cantidad requerida",
                    precioCompra: "Precio Compra requerido",
                    precioVenta: "Precio Venta requerido"
                }, 
                submitHandler: function(form) {                 
                    modificarProductoLote();
                }
            });
        }
    }
 
    
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });
 
} ) (jQuery, window, document);

function modificarProductoLote(){
	var formData = new FormData(document.getElementById("formularioProductoLoteModificar"));
    
	formData.append("accion", "modificar");
	$.ajax({
	url : "../controladora/productoLote/ControladoraProductoLote.php",
	type : "post",
	dataType : "html",
	data : formData,
	cache : false,
	contentType : false,
	processData : false
	}).done(function(data) {
		$("#contenedor2").html(data);
		cargarListaProductoLote();
	});
 	
}	


function modificarProductoLoteConsulta(id){    

	$.post("./productoLote/productoLoteModificar.php", 
	    {
		    idProductoLote : id
	    },

	    function(data)
	    {               
	    	$('#contenedor').html(data);
    	});
    
}

$(function(){
    $.post("../interfaz/productoLote/productoLoteLista.php",
    {},
    function (data)
    {
        $('#contenedor3').html(data);
    });    
});


$(function(){ 
    $('#contenedor2').html("");    
});
