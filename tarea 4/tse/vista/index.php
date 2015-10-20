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
	
		
		<script lang="JavaScript" src="../js/jquery/jQuery.js" ></script>
		<script src="../js/jquery/jquery.validate.min.js"></script>
		
		<script type="text/javascript" src="../js/jquery/jquery-ui.js"></script>
		<script type="text/javascript" src="../js/jquery/maskedinput.js"></script>
		<script type="text/javascript" src="../js/jquery/jquery.maskMoney.js"></script>


		
		
		</head>

		<body>
		<h1>consulta al registro</h1>	
		<br/>
			<form id="frConsultaCedula" method="POST">				
				<label for="cedula">cedula: </label>
				<input type="text" id="cedula" name="cedula" placeholder="1-1111-1111"/>
				<br/>
				<input type="submit" value="Consultar" class="submit"/>	
			</form>
		<div id="registro"></div>	

		<marquee id="preload" style="visibility:hidden;background-color:#00CC33;height:22px;width:150px">| | | | | | | PROCESANDO | | | | | | |</marquee> 


		<script src="../js/registro.js"></script>
		
</html>
