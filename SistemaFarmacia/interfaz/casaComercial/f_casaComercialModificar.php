<a href='#' onclick="cargarListaCasaComercial()">Lista Casas Comerciales</a>
<br/>
<a href='#' onclick="registrarCasaComercial()">Registrar Casa Comercial</a>

<?php
	include ("../../controladora/casaComercial/ControladoraGetCasaComercial.php");
	$control = new ControladoraGetCasaComercial;
	$idCasaComercial = $_POST['idCasaComercial'];
	$casaComercial =$control->obtenerCasaComercial($idCasaComercial);	
?> 

<form id="formularioCasaComercialModificar" method="POST">
	<h1>Modificar Casa Comercial</h1>
	<br/>
	<?php									
			echo "<label for=\"direccionCasaComercial\">Direccion: </label>
			<input type=\"text\" id=\"direccionCasaComercial\" name=\"direccionCasaComercial\" value=\"".$casaComercial->get_direccionCasaComercial()."\" placeholder=\"\"/>
			<br/>
			<label for=\"nombreCasaComercial\">Nombre: </label>
			<input type=\"text\" id=\"nombreCasaComercial\" name=\"nombreCasaComercial\" value=\"".$casaComercial->get_nombreCasaComercial()."\" placeholder=\"\"/>
			<br/>
			<input type=\"hidden\" id=\"idCasaComercial\" name=\"idCasaComercial\" value=\"".$casaComercial->get_idCasaComercial()."\" />
			
			<label for=\"telefonoCasaComercial\">Telefono: </label>
			<input type=\"text\" id=\"telefonoCasaComercial\" name=\"telefonoCasaComercial\" value=\"".$casaComercial->get_telefonoCasaComercial()."\" placeholder=\"\"/>
			<br/>
			<label for=\"correoCasaComercial\">Correo: </label>
			<input type=\"text\" id=\"correoCasaComercial\" name=\"correoCasaComercial\" value=\"".$casaComercial->get_correoCasaComercial()."\" placeholder=\"\"/>
			<br/>
			<label for=\"correoCasaComercial\">Correo 2: </label>
			<input type=\"text\" id=\"correoCasaComercial2\" name=\"correoCasaComercial2\" value=\"".$casaComercial->get_correoCasaComercial()."\" placeholder=\"\"/>
			<br/>
			<label for=\"faxCasaComercial\">Fax: </label>
			<input type=\"text\" id=\"faxCasaComercial\" name=\"faxCasaComercial\" value=\"".$casaComercial->get_faxCasaComercial()."\" placeholder=\"\"/>
			<br/>";
	?>				 
	<input type="submit" value="Modificare" class="submit"/>				
</form>
<script lang="JavaScript" src="../js/casaComercial.js"></script>