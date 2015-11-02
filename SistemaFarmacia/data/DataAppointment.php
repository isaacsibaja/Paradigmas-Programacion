<?php

class DataAppointment{

	function DataAppointment(){
	}

		function getId(){
		$con = new DBConexion;
		if($con->conectar()==true){		

			$query = mysql_query("SELECT count(*) from tbappointment");
			if ($row = mysql_fetch_row($query)) {
				$cantidadRegistro = trim($row[0]);
			}
						
			$query = mysql_query("SELECT MAX(idAppointment) AS idAppointment FROM tbappointment");
			if ($row = mysql_fetch_row($query)) {
				$UltimoId = trim($row[0]);				
			}
			$UltimoId+=1;
		}
		if($cantidadRegistro == $UltimoId){
			return $UltimoId;
		}else{
			$lista = array();
			$contador = 1;
			$query = "SELECT idAppointment FROM tbappointment";
			$result = @mysql_query($query);			
			while($row = mysql_fetch_array($result)){	 		
				array_push($lista, $row[0]);
			}
			foreach ($lista as $dato) {

				if($contador != $dato){
					break;
				}
				$contador++;
			}
			return $contador;
		}			
	}

	//SELECT idAppointment, idCustomer, idDoctor, date, hour, case, email FROM tbappointment WHERE

		function insertar($appointment){
		$con = new DBConexion;
		if($con->conectar()==true){
			$id = $this->getId();
			$query = "INSERT INTO tbappointment(`idAppointment`, `idCustomer`, `idDoctor`, 
				`date`, `hour`, `case`, `email`) VALUES (
				".$id.",
				".$appointment->getIdCustomer().",
				".$appointment->getIdDoctor().",
				'".$appointment->getDate()."',
				'".$appointment->getHour()."',
				'".$appointment->getCase()."',
				'".$appointment->getEmail()."')";
			//echo "$query";
			$result = @mysql_query($query);	
			if (!$result){
				return false;
			}else{
				return $result;
			}
		}	
	}


	function getAppointments(){

		date_default_timezone_set('America/Costa_Rica');
		$anteayer = strftime("%Y-%m-%d", strtotime("-2 day"));


		$con = new DBConexion;
		$lista = array();
		
		if($con->conectar()==true){		
			$query = "SELECT * FROM tbappointment 
						WHERE date >= '".$anteayer."' 
						ORDER BY date ASC";
			$result = @mysql_query($query);
			//echo "$query";
			while($row = mysql_fetch_array($result)){				
	 			$appointment = new Appointment( $row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6]);			
				array_push($lista, $appointment);
			}
			return $lista;
			
		}
	}

}
?>