<?php
	include ("../../controladora/tipoProducto/ControladoraGetTipoProducto.php");
	$control = new ControladoraGetTipoProducto;
	$idTipoProducto = $_POST['idTipoProducto'];
	$tipoProducto =$control->obtenerTipoProducto($idTipoProducto);	
?> 
<h1>Modificar Tipo Producto</h1>
<br/>
<a href='#' onclick="cargarListaTipoProducto()">Lista Tipos Productos</a>
<br/>
<a href='#' onclick="registrarTipoProducto()">Registrar Tipos Productos</a>
<br/>

<form id="formularioTipoProductoModificar" method="POST">
	
	<?php									
			echo "<label for=\"descripcionTipo\">Descripcion: </label>
			<input type=\"text\" id=\"descripcionTipo\" name=\"descripcionTipo\" value=\"".$tipoProducto->getDescripcionTipo()."\" placeholder=\"\"/>
			<br/>
			<input type=\"hidden\" id=\"idTipoProducto\" name=\"idTipoProducto\" value=\"".$tipoProducto->getIdTipoProducto()."\" />
			";
	?>				 
	<input type="submit" value="Modificar" class="submit"/>				
</form>
<script lang="JavaScript" src="../js/TipoProducto.js"></script>