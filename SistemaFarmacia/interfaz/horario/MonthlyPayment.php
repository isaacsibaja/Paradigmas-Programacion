<h1>Historial de horas laborales</h1>
<style type="text/css">
 .horaSemana {
  background: #3498db; 
  color: #ffffff;
}

}
  </style>
<?php
	include ("../../controladora/horario/ControllerGetHistory.php");
	session_start();	
	date_default_timezone_set('America/Costa_Rica');

	$hourPrice  = $_POST['hourPrice'];
	$hourPrice = str_replace(",", "", $hourPrice);	

	$idUser = $_POST['idUser'];	

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
	

	$control = new ControllerGetHistory;
	$regentList =$control->getRegent($idUser);
	$customerCareList =$control->getCustomerCare($idUser);
	$semanasAcumuladas = 0;
	$horasExtras = 0;
	$horasExtrasAcumulada = 0;
	$workingDay = 0;
	$extraTime = 0;
 
	class MonthlyPayment{
		private $contadorHoras = 0;
		private $horasAcumuladas = 0;

		function MonthlyPayment(){}

		function contador(){
		 	$this->contadorHoras++;
		}

		function setContador($contadorHoras){
		 	$this->contadorHoras = $contadorHoras;
		}

		function getContador(){
			return $this->contadorHoras;
		}

		function setHorasAcumuladas($horasAcumuladas){
			 $this->horasAcumuladas += $horasAcumuladas;
		}
		function setHorasAcumuladasSemana(){
			 $this->horasAcumuladas = 0;
		}

		function getHorasAcumuladas(){
			return $this->horasAcumuladas;
		}

		function esta($regentList, $customerCareList, $fecha, $hora, $fechaGUI, $horaGUI) {
			$bandera = false;
			$aux = "";
			if ($hora == "Horas") {
				$aux = $this->getContador();
				$bandera = true;
			} else {
					foreach ($regentList as $horario){
					if($horario->getDate() == $fecha && $horario->getHour() == $hora){	
					$aux = 	"( R )";
					$this->contador();
						$bandera = true;
					}
				}
				foreach ($customerCareList as $horario){
					if($horario->getDate() == $fecha && $horario->getHour() == $hora){	
					$aux = 	"( C )";
					$this->contador();			
						$bandera = true;
					}
				}
			}		
			
			if($bandera){
				echo "<td>$aux</td>";
			}else{
				echo "\n";
				echo "<td></td>";
			}
		}
	}
	

	

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
	array_push($listaHora, array("Horas", "Horas"));
	array_push($listaHora, array("Extra", "Extra"));

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
		<th>Horas Semanales</th>  
		<th>Horas Extras</th>                         
	</tr>
	</thead>
		<tbody>";
			$monthlyPayment = new MonthlyPayment(); 
			foreach ($listaDiaGUI as $dia){
				$monthlyPayment->setHorasAcumuladas($monthlyPayment->getContador());
				$monthlyPayment->setContador(0);
				echo "
				<tr>";
				if ($dia[2] == "Sun" || $dia[2] == "dom") {

					$semanasAcumuladas += $monthlyPayment->getHorasAcumuladas();

					if ($monthlyPayment->getHorasAcumuladas() > 40 ) {
						$horasExtras = $monthlyPayment->getHorasAcumuladas() - 40;
						$horasExtrasAcumulada += $horasExtras;
					} else {
						$horasExtras = 0; 
					}
					echo "     
					<td>$dia[1]</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>Total : </td>
					<td class=horaSemana >".$monthlyPayment->getHorasAcumuladas()."</td>
					<td class=horaSemana > ".$horasExtras." </td>	
					";


					

					$monthlyPayment->setHorasAcumuladasSemana();//Limpiar a cero
				} else {
					echo "<td>$dia[1]</td>";
					foreach ($listaHora as $hora){						
						$monthlyPayment->esta($regentList, $customerCareList, $dia[0], $hora[0], $dia[1], $hora[1]);
										
					}
				}
				echo "
				</tr>";
			}					
	    	echo "		
		</tbody>		      				
	</table>";	
?>
<br/>

<br/>
<?php
	$workingDay = $semanasAcumuladas - $horasExtrasAcumulada;
	$workingDay = $workingDay * $hourPrice;
	$extraTime = $horasExtrasAcumulada * $hourPrice * 2;
	$total = $workingDay + $extraTime;
?>



<table>
	<thead>
	<tr>
		<th></th>	                    
		<th></th>                                             
	</tr>
	</thead>
		<tbody>
			<tr>
				<td><label>Total de horas laboradas: <?php echo $semanasAcumuladas;?></label></td>
				<td><label>Precio Hora : ₡<?php echo $hourPrice;?></td>								
			</tr>
			<tr>
				<td><label>Horas obligatorias: <?php echo $semanasAcumuladas - $horasExtrasAcumulada;?></label></td>
				<td><label>Sueldo : <?php echo $workingDay;?></label></td>								
			</tr>
			<tr>
				<td><label>Extra : <?php echo $horasExtrasAcumulada;?></label></td>
				<td><label>Sueldo Extra: <?php echo $extraTime;?></label></td>								
			</tr>
			<tr>
				<td><label></label></td>
				<td><label>Sueldo Total : <?php echo $total;?></label></td>								
			</tr>
			<tr>
				<td><label>( R ) = Regencia </label></td>
				<td><label>( C ) = Cita </label></td>								
			</tr>
		</tbody>		      				
	</table>

<form id="formPay" method="POST">
			<input type="hidden" id="idUser" name="idUser" value=<?php echo "\"$idUser\""; ?>/>
			<input type="hidden" id="workingDay" name="workingDay" value=<?php echo "\"$workingDay\""; ?>/>
			<input type="hidden" id="extraTime" name="extraTime" value=<?php echo "\"$extraTime\""; ?> />
			<input type="hidden" id="hourPrice" name="hourPrice" value=<?php echo "\"$hourPrice\""; ?> />
			<input type="hidden" id="total" name="total" value=<?php echo "\"$total\""; ?> />
		  	<input type="submit" value="Registrar" class="submit"/>
	</form>

	<script src="../js/Pay.js"></script>