<?php
	include ("../../controladora/ingredienteActivo/ControladoraGetIngredienteActivo.php");
	$control = new ControladoraGetIngredienteActivo;
	$idIngredienteActivo = $_POST['idIngredienteActivo'];
	$ingredienteActivo =$control->obtenerIngredienteActivo($idIngredienteActivo);	
?> 
<h1>Modificar Ingrediente Activo</h1>
<a href='#' onclick="registrarIngredienteActivo()">Registrar Ingredientes Activos</a>
<form id="formularioModificarIngredienteActivo" method="POST">
	<?php									
			echo "
			<input type=\"hidden\" id=\"idIngredienteActivo\" name=\"idIngredienteActivo\" value=\"".$ingredienteActivo->getIdIngredienteActivo()."\" />
			
			<label for=\"descripcionIngrediente\">Descripcion del Ingrediente Activo: </label>
			<input type=\"text\" id=\"descripcionIngrediente\" name=\"descripcionIngrediente\" value=\"".$ingredienteActivo->getDescripcionIngrediente()."\" placeholder=\"\"/>
			<br/>"
	?>				 
	<input type="submit" value="Modificar" class="submit"/>				
</form>
<script lang="JavaScript" src="../js/ingredienteActivo.js"></script>
