<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<?php
	header('Content-Type: text/html; charset=ISO-8859-1');
?>

<html>
	<head>
		<title>Web Services Google Maps</title>
		
		<script lang="JavaScript" src="js/jsGoogleMaps.js" async defer></script>
		<script lang="JavaScript" src="js/jsFunciones.js"></script>
		
	</head>
	<body>
		
		<h2> Busqueda de Direcciones </h2>
		
		<p><label>Origen:</label>
			<input type="text" id="start" name="start" placeholder="Origen"/></p>
		  
		<p><label>Destino:</label>
			<input type="text" id="end" name="end" placeholder="Destino"/></p>
		
		<!-- <p><input type="submit" value="Obtener Ruta" onclick="calculateAndDisplayRoute()"/></p> -->
		
		<!-- El siguiente 'div' corresponde al panel de informacion de la ubicacion -->
		<div id="directions-panel" style="height: auto; width: 25%; overflow: auto;" ></div>
		
		<!-- Los diguientes 'div' corresponden a la obtencion del mapa NO BORRARLOS!!! -->
		<div id="control"></div>
		<div id="map"></div> <!-- style="height: 50%; width: 50%;" -->
		
	</body>
</html>
