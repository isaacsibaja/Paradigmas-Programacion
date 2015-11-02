<?php
	header('Content-Type: text/html; charset=ISO-8859-1');

	include ("../../data/DataAppointment.php");
	include ("../../data/BDConexion.php");
	include ("../../dominio/Appointment.php");

	class ControllerAppointment {
		
		function ControllerAppointment(){
		}	
		function insertar(){
			$idDoctor = $_POST['idDoctor'];
			$date = $_POST['date'];
			$hour = $_POST['hour'];
			$case = $_POST['case'];
			$email = $_POST['email'];
		
			$appointment = new Appointment( 0, 1, $idDoctor, $date, $hour, $case, $email);		
						
			$data = new DataAppointment();

			if($data->insertar($appointment)==true){
				echo "<label>Cita reservada correctamente</label><br/>
					<label>Dia: $date</label><br/> 
					<label>Hora: $hour</label><br/>
					<label>Asunto: $case</label><br/>
					<label>Correo: $email</label><br/>";
		
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