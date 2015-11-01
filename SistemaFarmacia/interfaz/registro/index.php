<?php
/*$zip = new ZipArchive;
 $zip->open("tse/padron_completo.zip");
 $zip->extractTo("tse");
 $zip->close();*/
?>



<!DOCTYPE html>
<html lang="es">
	<head >
		<title>Registro Civil</title>
			
		
		</head>

		<body>
		<h1>Universidad Nacional</h1>
		<h2>Tribunal Supremo de Elecciones</h2>
		<h3>Consulta de cedula nacional</h3>	
			<form id="frConsultaCedula" method="POST">				
				<label for="cedula">cedula: </label>
				<input type="text" id="cedula" name="cedula" placeholder="1-1111-1111"/>
				<br/>
				<input type="submit" value="Consultar" class="submit"/>	
			</form>
		<div id="registro"></div>	

		<marquee id="preload" style="
		visibility:hidden;
		background-color:#00CC33;
		height:22px;
		width:150px">| | | | | | | PROCESANDO | | | | | | |</marquee> 


		<script src="../js/Registro.js"></script>
		
</html>
