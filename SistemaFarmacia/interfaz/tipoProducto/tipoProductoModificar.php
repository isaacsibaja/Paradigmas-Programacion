<a href='#' onclick="cargarListaTipoProducto()">Lista Tipos Productos</a>
<br/>
<a href='#' onclick="registrarTipoProducto()">Registrar Tipos Productos</a>

<?php
	include ("../../controladora/tipoProducto/ControladoraGetTipoProducto.php");
	$control = new ControladoraGetTipoProducto;
	$idTipoProducto = $_POST['idTipoProducto'];
	$tipoProducto =$control->obtenerTipoProducto($idTipoProducto);	
?> 

<form id="formularioTipoProductoModificar" method="POST">
	<h1>Modificar Tipo Producto</h1>
	<br/>
	<?php									
			echo "<label for=\"descripcionTipo\">Descripcion: </label>
			<input type=\"text\" id=\"descripcionTipo\" name=\"descripcionTipo\" value=\"".$tipoProducto->get_descripcionTipo()."\" placeholder=\"\"/>
			<br/>
			<input type=\"hidden\" id=\"idTipoProducto\" name=\"idTipoProducto\" value=\"".$tipoProducto->get_idTipoProducto()."\" />
			";
	?>				 
	<input type="submit" value="Modificar" class="submit"/>				
</form>
<script lang="JavaScript" src="../js/tipoProducto.js"></script>