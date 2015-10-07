<?php
	header('Content-Type: text/html; charset=ISO-8859-1');

	include ("../../data/DataHorario.php");
	include ("../../data/BDConexion.php");
	include ("../../dominio/Horario.php");

	class Control {
		
		function Control(){
		}	
		function insertar(){
			$fecha = $_POST['fecha'];
			$hora = $_POST['hora'];
			$asunto = $_POST['asunto'];
			$correo = $_POST['correo'];
		
			$horario = new Horario( 0, $fecha, $hora,$asunto, $correo);				
						
			$data = new DataHorario();

			if($data->insertar($horario)==true){
				echo "<label>Cita reservada correctamente</label><br/>
					<label>Dia: $fecha</label><br/> 
					<label>Hora: $hora</label><br/>
					<label>Asunto: $asunto</label><br/>
					<label>Correo: $correo</label><br/>";
		
			}else{
				echo "Error del sistema";
			}
			
	    }
	}

		$accion=$_POST['accion'];
		$control = new Control;		

		if($accion=="insertar"){
			$control->insertar();
		}
?>