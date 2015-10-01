<?php
	include ("../../controladora/presentacionProducto/ControladoraGetPresentacionProducto.php");
	$control = new ControladoraGetPresentacionProducto;
	$idPresentacionProducto = $_POST['idPresentacionProducto'];
	$PresentacionProducto =$control->obtenerPresentacionProducto($idPresentacionProducto);	
?> 
<h1>Modificar Presentacion Producto</h1>
<br/>
<a href='#' onclick="cargarListaPresentacionProducto()">Lista Presentacion Productos</a>
<br/>
<a href='#' onclick="registrarPresentacionProducto()">Registrar Presentacion Productos</a>
<br/>
<form id="formularioPresentacionProductoModificar" method="POST">
	
	<?php									
			echo "<label for=\"descripcionPresentacion\">Descripcion: </label>
			<input type=\"text\" id=\"descripcionPresentacion\" name=\"descripcionPresentacion\" value=\"".$PresentacionProducto->getDescripcionPresentacion()."\" placeholder=\"\"/>
			<br/>
			<input type=\"hidden\" id=\"idPresentacionProducto\" name=\"idPresentacionProducto\" value=\"".$PresentacionProducto->getIdPresentacionProducto()."\" />
			";
	?>				 
	<input type="submit" value="Modificar" class="submit"/>				
</form>
<script lang="JavaScript" src="../js/PresentacionProducto.js"></script>