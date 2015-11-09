<?php
	

	include ("../../data/DataCustomerCare.php");
	include ("../../data/BDConexion.php");
	include ("../../dominio/CustomerCare.php");

	class ControllerCustomerCare {
		
		function ControllerCustomerCare(){
		}	
		function insertar(){
			$idDoctor = $_POST['idDoctor'];
			$date = $_POST['date'];
			$hour = $_POST['hour'];
		
			$customerCare = new CustomerCare( 0, $idDoctor, $date, $hour);				
						
			$data = new DataCustomerCare();

			if($data->insertar($customerCare)==true){
				echo "<label>Reservado correctamente</label><br/>
					<label>Dia: $fecha</label><br/> 
					<label>Hora: $hora</label><br/>";
		
			}else{
				echo "Error del sistema";
			}
			
	    }
	}

		$accion=$_POST['accion'];
		$ControllerRegent = new ControllerCustomerCare;		

		if($accion=="insertar"){
			$ControllerRegent->insertar();
		}
?>