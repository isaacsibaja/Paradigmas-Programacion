<?php

   /* if($_SESSION){
    	if(!$_SESSION['idioma']){
    		if($_SESSION['idioma'] == "Espaniol"){
	    		include ("./IdiomaEspaniol.php");
	    	}else{
	    		include ("./IdiomaArabe.php");
	    	}
    	} else{
    		include ("./IdiomaEspaniol.php");
    	}   	
    }
    */
?>
<!DOCTYPE html>
<html lang="es">
	<head >
		<title>Registro de categorias</title>
		<meta charset="UTF-8">
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<script lang="JavaScript" src="../js/jquery/jQuery.js" ></script>
		<script src="../js/jquery/jquery.validate.min.js"></script>
		
		<script type="text/javascript" src="../js/jquery/jquery-ui.js"></script>
		<script type="text/javascript" src="../js/jquery/maskedinput.js"></script>
		<script type="text/javascript" src="../js/jquery/jquery.maskMoney.js"></script>

		<script type="text/javascript" src="../js/jquery/timePicker/jquery.ui.timepicker.js"></script><!-- Magia para la fecha y hora-->
		<link rel="stylesheet" type="text/css"  href="../js/jquery/timePicker/jquery.ui.timepicker.css"><!-- Magia para la hora-->
		<link rel="stylesheet" type="text/css" href="../css/jquery-ui.css"><!-- Magia para la fecha-->

		<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>

		
		<script src="../js/Index.js"></script>
		
		</head>

		<body>

		<div id="contenedorIdioma"></div>
	<br/>

		   <label>Seleccione idioma</label> 
            <select onclick=idioma() id="idioma" name="idioma">

            	<option value="Espaniol">Español</option>
                <option value="Arabe">Arabe</option>
           <select/>
  
			<br/>
			<label><a href='#' onclick="cargarPagina('./casaComercial/CasaComercial.php')">Casa Comercial (Pendiente)</a></label>
			<br/>
			<label><a href='#' onclick="actualizar()">Actualizar</a></label>
			<br/>
			<label><a href='#' onclick="cargarPagina('./categoria/Categoria.php')">Categoria</a></label>
			<br/>			
			<label><a href='#' onclick="cargarPagina('./presentacionProducto/PresentacionProducto.php')">Presentacion Producto</a></label>
			<br/>
			<label><a href='#' onclick="cargarPagina('./ingredienteActivo/IngredienteActivo.php')">Ingrediente Activo</a></label>
			<br/>
			<label><a href='#' onclick="cargarPagina('./unidadMedida/UnidadMedida.php')">Unidad Medida</a></label>
			<br/>
			<label><a href='#' onclick="cargarPagina('./tipoProducto/TipoProducto.php')">Tipo Producto</a></label>
			<br/>
			<label><a href='#' onclick="cargarPagina('./producto/Producto.php')">Producto</a></label>
			<br/>		
			<label><a href='#' onclick="cargarLista('./productoIngrediente/ProductoLista.php')">Producto Ingrediente</a></label>
			<br/>		
			<label><a href='#' onclick="cargarPagina('./agenteVentas/AgenteVentas.php')">Agente Ventas</a></label>
			<br/>			
			<label><a href='#' onclick="cargarPagina('./productoLote/ProductoLote.php')">Producto Lote</a></label>
			<br/>
			<label><a href='#' onclick="cargarPagina('./registro/')">Registro</a></label>
			<br/>
			<label><a href='#' onclick="cargarPagina('./importarExcel/importar.php')">Importar excel</a></label>
			<br/>
			<label><a href='#' onclick="cargarPagina('../exportar/')">Exportar</a></label>
			<br/>
			<label><a href='#' onclick="cargarPagina('./reportesGraficos/')">Graficos</a></label>
			<br/>
			<label><a href='#' onclick="cargarHorario()">Reservar cita previa</a></label>
			<br/>
			<label><a href='#' onclick="cargarRegent()">Regent Schedule</a></label>
			<br/>
			<label><a href='#' onclick="cargarPagina('./sistemaExperto/')">Consulta</a></label>
			<br/>
			<div id="contenedorHorario"></div><!--<h1>contenedor para horario</h1>-->
			<br/>			
			<div id="contenedorFormulario"></div><!--<h1>Formulario</h1>-->
			<br/>
			<div id="contenedorMensaje"></div><!--Msj de estado-->
			<br/>
			<div id="contenedorLista"></div><!--Cargar Lista-->
			<br/>
			</body>

</html>
