<h1>Historial de jornada</h1>
<?php
	date_default_timezone_set('America/Costa_Rica');

	$dia = strftime("%Y-%m-%d");
	$dia = date_create($dia);

	$from =  $_POST['from'];
	$from = date_create($from);
	$start = date_diff( $dia,$from );

	$to =  $_POST['to'];
	$to = date_create($to);
	$end = date_diff(  $dia, $to);

	$start = $start->format("%R%a");
 	$end = $end->format("%R%a");


	include ("../../controladora/horario/ControllerGetHistory.php");
	session_start();	
	$id = $_POST['idUser'];

	$control = new ControllerGetHistory;
	$regentList =$control->getRegent($id);
	$customerCareList =$control->getCustomerCare($id);

	function esta($regentList, $customerCareList, $fecha, $hora, $fechaGUI, $horaGUI) {
		$bandera = false;
		$aux = "";
		foreach ($regentList as $horario){
			if($horario->getDate() == $fecha && $horario->getHour() == $hora){	
			$aux = 	"( R )";
			//$aux = 	"( R )".$horario->getIdDoctor();	
			//Pregunta si el Dia y la Hora estan disponibles 
			//Si se cumple entoces no se muestra el espacio Cita		
				$bandera = true;
			}
		}
		foreach ($customerCareList as $horario){
			if($horario->getDate() == $fecha && $horario->getHour() == $hora){	
			$aux = 	"( C )";	
			//$aux = 	"( C )".$horario->getIdDoctor();		
				$bandera = true;
			}
		}
		if($bandera){
			echo "<td>$aux</td>";
		}else{
			echo "\n";
			echo "<td></td>";
		}
	}//Verifica si esta disponible o no el horario 

	date_default_timezone_set('America/Costa_Rica');//Fijar zona horaria local


	$listaHora = array();					
	array_push($listaHora, array("08:00:00", "08:00:00 AM"));
	array_push($listaHora, array("09:00:00", "09:00:00 AM"));
	array_push($listaHora, array("10:00:00", "10:00:00 AM"));
	array_push($listaHora, array("11:00:00", "11:00:00 AM"));

	array_push($listaHora, array("13:00:00", "01:00:00 PM"));
	array_push($listaHora, array("14:00:00", "02:00:00 PM"));
	array_push($listaHora, array("15:00:00", "03:00:00 PM"));
	array_push($listaHora, array("16:00:00", "04:00:00 PM"));
	array_push($listaHora, array("17:00:00", "05:00:00 PM"));
	array_push($listaHora, array("18:00:00", "06:00:00 PM"));
	array_push($listaHora, array("19:00:00", "07:00:00 PM"));

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
	
	for ($i = $start; $i <= $end; $i++) {//Cantidad de dias que quieran que se muestre
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
		<th>9:00 AM</th> 
		<th>10:00 AM</th>                     
		<th>11:00 AM</th> 

		<th>1:00 PM</th>                     
		<th>2:00 PM</th> 
		<th>3:00 PM</th> 	                    
		<th>4:00 PM</th> 
		<th>5:00 PM</th> 
		<th>6:00 PM</th> 	                    
		<th>7:00 PM</th>                          
	</tr>
	</thead>
		<tbody>";
			foreach ($listaDiaGUI as $dia){
				echo "
				<tr>";
				if ($dia[2] == "Sun" || $dia[2] == "dom") {
					echo "     
				<td>$dia[1]</td>				
				";

				} else {
					echo "<td>$dia[1]</td>";
					foreach ($listaHora as $hora){

						esta($regentList, $customerCareList, $dia[0], $hora[0], $dia[1], $hora[1]);
					}
				}
				echo "
				</tr>";
			}					
	    	echo "		
		</tbody>		      				
	</table>";	
?>
<label>( R ) = Regencia </label>
<br/>
<label>( C ) = Cita </label>
<script src="../js/Horario.js"></script>