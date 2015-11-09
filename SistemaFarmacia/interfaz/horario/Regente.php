<h1>Regente</h1>
<style type="text/css">
 button {
  background: #3498db;
  background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
  background-image: -moz-linear-gradient(top, #3498db, #2980b9);
  background-image: -ms-linear-gradient(top, #3498db, #2980b9);
  background-image: -o-linear-gradient(top, #3498db, #2980b9);
  background-image: linear-gradient(to bottom, #3498db, #2980b9);
  -webkit-border-radius: 28;
  -moz-border-radius: 28;
  border-radius: 28px;
  font-family: Arial;
  color: #ffffff;
  font-size: 10px;
  padding: 10px 20px 10px 20px;
  text-decoration: none;
}

button:hover {
  background: #3cb0fd;
  background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
  background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
  text-decoration: none;
}
  </style>
<?php
	include ("../../controladora/horario/ControlGetRegent.php");
	session_start();	
	$id = $_SESSION['idUser'];

	$control = new ControlGetRegent;
	$regentList =$control->getRegent();
	$customerCareList =$control->getCustomerCare($id);

	function esta($regentList, $customerCareList, $fecha, $hora, $fechaGUI, $horaGUI, $id) {
		$bandera = false;
		$aux = "";
		foreach ($regentList as $horario){
			if($horario->getDate() == $fecha && $horario->getHour() == $hora){	
			$aux = 	"( R )".$horario->getIdDoctor() ;
			//$aux = 	"(R)".$horario->getIdDoctor() ;
			//Pregunta si el Dia y la Hora estan disponibles 
			//Si se cumple entoces no se muestra el espacio Cita		
				$bandera = true;
			}
		}
		foreach ($customerCareList as $horario){
			if($horario->getDate() == $fecha && $horario->getHour() == $hora){	
			//$aux = 	"(C)".$horario->getIdDoctor();
			$aux = 	"( C )".$horario->getIdDoctor();
				$bandera = true;
			}
		}
		if($bandera){
			echo "<td>$aux</td>";
		}else{
			echo "\n";
			echo "<td><button  onclick=\"regent('$fecha','$hora','$fechaGUI','$horaGUI', '$id')\">Free</button></td>";
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
	for ($i = 1; $i <= 15; $i++) {//Cantidad de dias que quieran que se muestre
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
						esta($regentList, $customerCareList, $dia[0], $hora[0], $dia[1], $hora[1],  $id);
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