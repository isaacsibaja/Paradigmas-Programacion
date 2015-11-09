<?php
	

	include ("../../data/DataRegentSchedule.php");
	include ("../../data/BDConexion.php");
	include ("../../dominio/RegentSchedule.php");

	class ControllerRegent {
		
		function ControllerRegent(){
		}	
		function insertar(){
			$idDoctor = $_POST['idDoctor'];
			$date = $_POST['date'];
			$hour = $_POST['hour'];
		
			$regent = new RegentSchedule( 0, $idDoctor, $date, $hour);				
						
			$data = new DataRegentSchedule();

			if($data->insertar($regent)==true){
				echo "<label>Reservado correctamente</label><br/>
					<label>Dia: $fecha</label><br/> 
					<label>Hora: $hora</label><br/>";
		
			}else{
				echo "Error del sistema";
			}
			
	    }
	}

		$accion=$_POST['accion'];
		$ControllerRegent = new ControllerRegent;		

		if($accion=="insertar"){
			$ControllerRegent->insertar();
		}
?>