<?php

	include ("../../data/DataPay.php");
	include ("../../data/BDConexion.php");
	include ("../../dominio/Pay.php");

	class ControllerPay {
		
		function ControllerPay(){
		}	
		function insertar(){
			$idUser = $_POST['idUser'];
			$hourPrice = $_POST['hourPrice'];
			$workingDay = $_POST['workingDay'];
			$extraTime = $_POST['extraTime'];
			$total = $_POST['total'];
		
			$pay = new Pay( 0, $idUser, $hourPrice, $workingDay, $extraTime, $total);		
						
			$data = new DataPay();

			if($data->insertar($pay)==true){
				echo "<label>Se guardo correctamente</label><br/>";		
			}else{
				echo "Error del sistema";
			}
			
	    }
	}

		$accion=$_POST['accion'];
		$control = new ControllerPay;		

		if($accion=="insertar"){
			$control->insertar();
		}
?>