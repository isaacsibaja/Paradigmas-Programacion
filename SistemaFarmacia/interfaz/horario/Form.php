 <?php
 	session_start();
 	include ("../../controladora/horario/ControllerGetAppointment.php");

 	$control = new ControllerGetAppointment;



	$date = $_POST['date'];//Formato para mysql = 2015-09-27 / se maneja internamente el usuario no las ve
	$fechaGUI = $_POST['fechaGUI']; //Como lo ve el usario = dom-27-sep
	$hour = $_POST['hour'];	//Formato para mysql = 08:00:00 / se maneja internamente el usuario no las ve
	$horaGUI = $_POST['horaGUI'];//Como lo ve el usario = 08:00:00 AM	

	$customerList =$control->getFullName($date, $hour);
 ?>


	<form id="formularioHorario" method="POST">
			<input type="hidden" id="idUser" name="idUser" value=<?php echo "\"".$_SESSION['typeUser']."\""; ?>/>
			<input type="hidden" id="date" name="date" value=<?php echo "\"$date\""; ?>/>
			<input type="hidden" id="hour" name="hour" value=<?php echo "\"$hour\""; ?> />

			<br/> 
			<?php



			        if(!$customerList){                               
			            echo "<br>
			                <label>No hay registro de Doctor</label>";
			        }else{
			            echo "<label>Seleccione Doctor</label> 
			            	<select id=\"idDoctor\" name=\"idDoctor\">";
			            foreach ($customerList as $customer){ 
			                echo " <option value=\"".$customer->getIdDoctor()."\">".$customer->getIdCustomerCare()."</option>";
			            }
			            echo "<select/>"; 
			        } 
			?>
			
			<br/> 
			<label>Dia : <?php echo "$fechaGUI"; ?></label>
			<br/> 
			<label>Hora : <?php echo "$horaGUI"; ?></label>
			<br/> 
			<label>Asunto: </label>
			<input type="text" name="case" id="case"/>
		    <br/>
		    <input type="submit" value="Solicitar" class="submit"/>
	</form>
<script src="../js/Horario.js"></script>