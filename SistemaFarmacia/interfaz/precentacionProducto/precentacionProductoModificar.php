<a href='#' onclick="cargarListaPrecentacionProducto()">Lista Presentacion Productos</a>
<br/>
<a href='#' onclick="registrarPrecentacionProducto()">Registrar Presentacion Productos</a>

<?php
	include ("../../controladora/precentacionProducto/ControladoraGetPrecentacionProducto.php");
	$control = new ControladoraGetPrecentacionProducto;
	$idPrecentacionProducto = $_POST['idPrecentacionProducto'];
	$precentacionProducto =$control->obtenerPrecentacionProducto($idPrecentacionProducto);	
?> 

<form id="formularioPrecentacionProductoModificar" method="POST">
	<h1>Modificar Casa Comercial</h1>
	<br/>
	<?php									
			echo "<label for=\"descripcionPrecentacion\">Descripcion: </label>
			<input type=\"text\" id=\"descripcionPrecentacion\" name=\"descripcionPrecentacion\" value=\"".$precentacionProducto->get_descripcionPrecentacion()."\" placeholder=\"\"/>
			<br/>
			<input type=\"hidden\" id=\"idPrecentacionProducto\" name=\"idPrecentacionProducto\" value=\"".$precentacionProducto->get_idPrecentacionProducto()."\" />
			";
	?>				 
	<input type="submit" value="Modificar" class="submit"/>				
</form>
<script lang="JavaScript" src="../js/precentacionProducto.js"></script>