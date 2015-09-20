<a href='#' onclick="cargarListaUnidadMedida()">Lista Unidades Medida</a>
<br/>
<a href='#' onclick="registrarUnidadMedida()">Registrar Unidad Medida</a>

<?php
	include ("../../controladora/unidadMedida/ControladoraGetUnidadMedida.php");
	$control = new ControladoraGetUnidadMedida;
	$idUnidadMedida = $_POST['idUnidadMedida'];
	$unidadMedida =$control->obtenerUnidadMedida($idUnidadMedida);	
?> 

<form id="formularioUnidadMedidaModificar" method="POST">
	<h1>Modificar Unidad Medida</h1>
	<br/>
	<?php									
			echo "<label for=\"descripcionUnidad\">Descripcion: </label>
			<input type=\"text\" id=\"descripcionUnidad\" name=\"descripcionUnidad\" value=\"".$unidadMedida->get_descripcionUnidad()."\" placeholder=\"\"/>
			<br/>
			<input type=\"hidden\" id=\"idUnidadMedida\" name=\"idUnidadMedida\" value=\"".$unidadMedida->get_idUnidadMedida()."\" />
			";
	?>				 
	<input type="submit" value="Modificar" class="submit"/>				
</form>
<script lang="JavaScript" src="../js/unidadMedida.js"></script>