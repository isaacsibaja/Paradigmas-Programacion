<?php
	include ("../../controladora/casaComercial/ControladoraGetCasaComercial.php");
	$control = new ControladoraGetCasaComercial;
	$idCasaComercial = $_POST['idCasaComercial'];
	$casaComercial =$control->obtenerCasaComercial($idCasaComercial);	
?> 

<form id="formularioCasaComercialModificar" method="POST">
	<h1>Modificar Casa Comercial</h1>
	<br/>
	<a href='#' onclick="cargarListaCasaComercial()">Lista Casas Comerciales</a>
	<br/>
	<a href='#' onclick="registrarCasaComercial()">Registrar Casa Comercial</a>
	<br/>
	<?php									
			echo "<label for=\"direccionCasaComercial\">Direccion: </label>
			<input type=\"text\" id=\"direccionCasaComercial\" name=\"direccionCasaComercial\" value=\"".$casaComercial->getDireccionCasaComercial()."\" placeholder=\"\"/>
			<br/>
			<label for=\"nombreCasaComercial\">Nombre: </label>
			<input type=\"text\" id=\"nombreCasaComercial\" name=\"nombreCasaComercial\" value=\"".$casaComercial->getNombreCasaComercial()."\" placeholder=\"\"/>
			<br/>
			<input type=\"hidden\" id=\"idCasaComercial\" name=\"idCasaComercial\" value=\"".$casaComercial->getIdCasaComercial()."\" />
			
			<label for=\"telefonoCasaComercial\">Telefono: </label>
			<input type=\"text\" id=\"telefonoCasaComercial\" name=\"telefonoCasaComercial\" value=\"".$casaComercial->getTelefonoCasaComercial()."\" placeholder=\"\"/>
			<br/>
			<label for=\"correoCasaComercial\">Correo: </label>
			<input type=\"text\" id=\"correoCasaComercial\" name=\"correoCasaComercial\" value=\"".$casaComercial->getCorreoCasaComercial()."\" placeholder=\"\"/>
			<br/>
			<label for=\"correoCasaComercial\">Correo 2: </label>
			<input type=\"text\" id=\"correoCasaComercial2\" name=\"correoCasaComercial2\" value=\"".$casaComercial->getCorreoCasaComercial()."\" placeholder=\"\"/>
			<br/>
			<label for=\"faxCasaComercial\">Fax: </label>
			<input type=\"text\" id=\"faxCasaComercial\" name=\"faxCasaComercial\" value=\"".$casaComercial->getFaxCasaComercial()."\" placeholder=\"\"/>
			<br/>";
	?>				 
	<input type="submit" value="Modificare" class="submit"/>				
</form>
<script lang="JavaScript" src="../js/CasaComercial.js"></script>