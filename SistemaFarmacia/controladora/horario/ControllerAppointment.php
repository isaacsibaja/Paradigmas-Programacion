<?php

	include ("../../data/DataAppointment.php");
	include ("../../data/BDConexion.php");
	include ("../../dominio/Appointment.php");

	class ControllerAppointment {
		
		function ControllerAppointment(){
		}	
		function insertar(){
			$idUser = $_POST['idUser'];
			$idDoctor = $_POST['idDoctor'];
			$date = $_POST['date'];
			$hour = $_POST['hour'];
			$case = $_POST['case'];
		
			$appointment = new Appointment( 0, 1, $idDoctor, $date, $hour, $case, $idUser);		
						
			$data = new DataAppointment();

			if($data->insertar($appointment)==true){
				echo "<label>Cita reservada correctamente</label><br/>
					<label>Dia: $date</label><br/> 
					<label>Hora: $hour</label><br/>
					<label>Asunto: $case</label><br/>";
		
			}else{
				echo "Error del sistema";
			}
			
	    }
	}

		$accion=$_POST['accion'];
		$control = new ControllerAppointment;		

		if($accion=="insertar"){
			$control->insertar();
		}
?>