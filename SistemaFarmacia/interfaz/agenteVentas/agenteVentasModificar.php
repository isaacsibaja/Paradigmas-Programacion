<?php
	include ("../../controladora/agenteVentas/ControladoraGetAgenteVentas.php");
	$control = new ControladoraGetAgenteVentas;
	$idAgenteVenta = $_POST['idAgenteVenta'];
	$agenteVentas =$control->obtenerAgenteVentas($idAgenteVenta);	
?> 
<form id="formularioAgenteVentasModificar" method="POST">
	<h1>Modificar Agente Ventas</h1>
	<br/>
	<a href='#' onclick="cargarListaAgenteVentas()">Lista Agente Ventas</a>
	<br/>
	<a href='#' onclick="registrarAgenteVentas()">Registrar Agente Ventas</a>
	<br/>
	<?php									
			echo "<label for=\"nombreAgente\">Nombre: </label>
			<input type=\"text\" id=\"nombreAgente\" name=\"nombreAgente\" value=\"".$agenteVentas->getNombreAgente()."\" placeholder=\"\"/>
			<br/>
			<input type=\"hidden\" id=\"idAgenteVenta\" name=\"idAgenteVenta\" value=\"".$agenteVentas->getIdAgenteVenta()."\" />
			<label for=\"telefonoAgente\">Telfono: </label>
			<input type=\"text\" id=\"telefonoAgente\" name=\"telefonoAgente\" value=\"".$agenteVentas->getTelefonoAgente()."\" placeholder=\"\"/>
			<br/>
			<label for=\"correoAgente\">Correo: </label>
			<input type=\"text\" id=\"correoAgente\" name=\"correoAgente\" value=\"".$agenteVentas->getCorreoAgente()."\" placeholder=\"\"/>
			<br/>
			";
	?>				 
	<input type="submit" value="Modificar" class="submit"/>				
</form>
<script lang="JavaScript" src="../js/AgenteVentas.js"></script>