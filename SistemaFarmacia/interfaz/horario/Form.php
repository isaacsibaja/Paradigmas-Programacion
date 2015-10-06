 <?php
	$fecha = $_POST['fecha'];//Formato para mysql = 2015-09-27 / se maneja internamente el usuario no las ve
	$fechaGUI = $_POST['fechaGUI']; //Como lo ve el usario = dom-27-sep
	$hora = $_POST['hora'];	//Formato para mysql = 08:00:00 / se maneja internamente el usuario no las ve
	$horaGUI = $_POST['horaGUI'];//Como lo ve el usario = 08:00:00 AM	
 ?>


	<form id="formularioHorario" method="POST">
			<input type="hidden" id="fecha" name="fecha" value=<?php echo "\"$fecha\""; ?>/>
			<input type="hidden" id="hora" name="hora" value=<?php echo "\"$hora\""; ?> />

			<br/> 
			<label>Dia : <?php echo "$fechaGUI"; ?></label>
			<br/> 
			<label>Hora : <?php echo "$horaGUI"; ?></label>
			<br/> 
			<label>Asunto: </label>
			<input type="text" name="asunto" id="asunto"/>
			<br/>
			<label>Correo: </label>
		    <input type="text" name="correo" id="correo" >
		    <br/>
		    <label>Verifiacar Correo: </label>
		    <input type="text" name="correo2" id="correo2" >
		    <br/>
		    <input type="submit" value="Solicitar" class="submit"/>
	</form>
<script src="../js/Horario.js"></script>