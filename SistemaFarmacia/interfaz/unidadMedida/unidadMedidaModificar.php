<?php
	include ("../../controladora/unidadMedida/ControladoraGetUnidadMedida.php");
	$control = new ControladoraGetUnidadMedida;
	$idUnidadMedida = $_POST['idUnidadMedida'];
	$unidadMedida =$control->obtenerUnidadMedida($idUnidadMedida);	
?> 

<h1>Modificar Unidad Medida</h1>
<br/>
<a href='#' onclick="cargarListaUnidadMedida()">Lista Unidades Medida</a>
<br/>
<a href='#' onclick="registrarUnidadMedida()">Registrar Unidad Medida</a>
<br/>
<form id="formularioUnidadMedidaModificar" method="POST">
	
	<?php									
			echo "<label for=\"descripcionUnidad\">Descripcion: </label>
			<input type=\"text\" id=\"descripcionUnidad\" name=\"descripcionUnidad\" value=\"".$unidadMedida->getDescripcionUnidad()."\" placeholder=\"\"/>
			<br/>
			<input type=\"hidden\" id=\"idUnidadMedida\" name=\"idUnidadMedida\" value=\"".$unidadMedida->getIdUnidadMedida()."\" />
			";
	?>				 
	<input type="submit" value="Modificar" class="submit"/>				
</form>
<script lang="JavaScript" src="../js/UnidadMedida.js"></script>