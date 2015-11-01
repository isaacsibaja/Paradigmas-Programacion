<?php
	include ("../../controladora/horario/ControladorGetHorario.php");
	$control = new ControladorGetHorario;
	$listaCitas =$control->obtenerHorarios();

	function esta($listaCitas, $fecha, $hora, $fechaGUI, $horaGUI) {
		$bandera = false;
		foreach ($listaCitas as $horario){
			if($horario->getFecha() == $fecha && $horario->getHora() == $hora){		
			//Pregunta si el Dia y la Hora estan disponibles 
			//Si se cumple entoces no se muestra el espacio Cita		
				$bandera = true;
			}
		}
		if($bandera){
			echo "<td><a href=\"#\"></a></td>";
		}else{
			echo "\n";
			echo "<td><a href=\"#\" onclick=\"consulta('$fecha','$hora','$fechaGUI','$horaGUI')\">Cita</a></td>";
		}
	}//Verifica si esta disponible o no el horario 

	date_default_timezone_set('America/Costa_Rica');//Fijar zona horaria local


	$listaHora = array();						
	array_push($listaHora, array("08:00:00", "08:00:00 AM"));
	array_push($listaHora, array("08:30:00", "08:30:00 AM"));
	array_push($listaHora, array("09:00:00", "09:00:00 AM"));
	array_push($listaHora, array("09:30:00", "09:30:00 AM"));
	array_push($listaHora, array("10:00:00", "10:00:00 AM"));
	array_push($listaHora, array("10:30:00", "10:30:00 AM"));
	array_push($listaHora, array("11:00:00", "11:00:00 AM"));
	array_push($listaHora, array("11:30:00", "11:30:00 AM"));

	array_push($listaHora, array("13:00:00", "01:00:00 PM"));
	array_push($listaHora, array("13:30:00", "01:30:00 PM"));
	array_push($listaHora, array("14:00:00", "02:00:00 PM"));
	array_push($listaHora, array("14:30:00", "02:30:00 PM"));
	array_push($listaHora, array("15:00:00", "03:00:00 PM"));
	array_push($listaHora, array("15:30:00", "03:30:00 PM"));
	array_push($listaHora, array("16:00:00", "04:00:00 PM"));
	array_push($listaHora, array("16:30:00", "04:30:00 PM"));

	//						     < Sistema >	< GUI >
	//						     < Mysql >	< Visual para el usuario >


	/* 
		_____________________
		|					|
		|	Variables 		|
		|	para fecha 		|
		|	en la GUI y 	|
		|	sistema   		|
		|___________________|

		Ejemplo = dom-27-sep

	*/	
	/*$anteayer = strftime("%a-%d-%b", strtotime("-2 day"));
	$ayer = strftime("%a-%d-%b", strtotime("-1 day"));
	$hoy = strftime("%a-%d-%b");*/
	
	$listaDiaGUI = array();
	for ($i = -30; $i <= 30; $i++) {//Cantidad de dias que quieran que se muestre
    	$dia = strftime("%a-%d-%b", strtotime("+$i day"));//GUI
		$diaF = strftime("%a", strtotime("+$i day"));//GUI para condicion if
		$sDia = strftime("%Y-%m-%d", strtotime("+$i day"));//Sistema para mysql
		array_push($listaDiaGUI, array($sDia, $dia, $diaF));
		//Para validar dias feriados	Sistema, GUI, GUI feriado 
		//  Para validar dias feriados 
	}	
	//print_r($listaDiaGUI);


echo "
<table border=\"1\">
	<thead>
	<tr>
		<th>Fecha</th>	                    
		<th>8:00 AM</th> 
		<th>8:30 AM</th>	                    
		<th>9:00 AM</th> 
		<th>9:30 AM</th>
		<th>10:00 AM</th> 
		<th>10:30 AM</th>	                    
		<th>11:00 AM</th> 
		<th>11:30 AM</th>	

		<th>1:00 PM</th> 
		<th>1:30 PM</th>	                    
		<th>2:00 PM</th> 
		<th>2:30 PM</th> 
		<th>3:00 PM</th> 
		<th>3:30 PM</th>	                    
		<th>4:00 PM</th> 
		<th>4:30 PM</th>                           
	</tr>
	</thead>
		<tbody>";
			foreach ($listaDiaGUI as $dia){
				echo "
				<tr>
				<td>$dia[1]</td>";
				if ($dia[2] == "sáb" ||  $dia[2] == "dom") {
					echo "
				<td>F</td>
				<td>E</td>
				<td>R</td>
				<td>I</td>
				<td>A</td>
				<td>D</td>
				<td>O</td>
				<td></td>
				<td></td>
				<td>F</td>
				<td>E</td>
				<td>R</td>
				<td>I</td>
				<td>A</td>
				<td>D</td>
				<td>O</td>";

				} else {
					foreach ($listaHora as $hora){
						esta($listaCitas, $dia[0], $hora[0], $dia[1], $hora[1]);
					}
				}
				echo "
				</tr>";
			}					
	    	echo "		
		</tbody>		      				
	</table>";	
?>
<script src="../js/Horario.js"></script>