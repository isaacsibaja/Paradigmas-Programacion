<?php

class DataCustomerCare{

	function DataCustomerCare(){
	}

		function getId(){
		$con = new DBConexion;
		if($con->conectar()==true){		

			$query = mysql_query("SELECT count(*) from tbcustomercare");
			if ($row = mysql_fetch_row($query)) {
				$cantidadRegistro = trim($row[0]);
			}
						
			$query = mysql_query("SELECT MAX(idCustomerCare) AS idCustomerCare FROM tbcustomercare");
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
			$query = "SELECT idCustomerCare FROM tbcustomercare";
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

		function insertar($customerCare){
		$con = new DBConexion;
		if($con->conectar()==true){
			$id = $this->getId();
			$query = "INSERT INTO tbcustomercare(`idCustomerCare`, `idDoctor`, `date`, `hour`) VALUES (
				".$id.",
				'".$customerCare->getIdDoctor()."',
				'".$customerCare->getDate()."',
				'".$customerCare->getHour()."')";
		
			$result = @mysql_query($query);	
			if (!$result){
				return false;
			}else{
				return $result;
			}
		}	
	}


	function getCustomerCare($id){

		

		date_default_timezone_set('America/Costa_Rica');
		$anteayer = strftime("%Y-%m-%d", strtotime("-2 day"));

		$con = new DBConexion;
		$lista = array();
		
		if($con->conectar()==true){		
			$query = "SELECT * FROM tbcustomercare 
						WHERE date >= $anteayer AND  idDoctor = $id 
						ORDER BY date ASC";
			$result = @mysql_query($query);
			//echo "$query";
			while($row = mysql_fetch_array($result)){	
		
	 			$customerCare = new CustomerCare($row[0],$row[1],$row[2], $row[3]);				
				array_push($lista, $customerCare);
			}
			return $lista;
			
		}
	}

	function getCustomerCareAppointment(){

		

		date_default_timezone_set('America/Costa_Rica');
		$anteayer = strftime("%Y-%m-%d", strtotime("-2 day"));

		$con = new DBConexion;
		$lista = array();
		
		if($con->conectar()==true){		
			$query = "SELECT * FROM tbcustomercare 
						WHERE date >= $anteayer 
						ORDER BY date ASC";
			$result = @mysql_query($query);
			//echo "$query";
			while($row = mysql_fetch_array($result)){	
		
	 			$customerCare = new CustomerCare($row[0],$row[1],$row[2], $row[3]);				
				array_push($lista, $customerCare);
			}
			return $lista;
			
		}
	}

	function getDoctor($date, $hour){

		$con = new DBConexion;
		$lista = array();
		$lista2 = array();
		
		if($con->conectar()==true){	

			$query = "SELECT idDoctor FROM tbappointment 
			where date = '$date'  
			and hour = '$hour'";
			$result = @mysql_query($query);
			//echo "$query";
			while($row = mysql_fetch_array($result)){	
				//Appointment( $idAppointment, $idCustomer, $idDoctor, $date, $hour, $case, $email)
	 			$index = $row[0];
	 			array_push($lista2, $index);						
			}



			$query = "SELECT  lastName, d.idUser, date, hour FROM tbcustomercare c 
			INNER JOIN tbuser d ON c.idDoctor = d.idUser 
			WHERE date = '$date' AND hour = '$hour' ORDER BY lastName";
			$result = @mysql_query($query);
			//echo "$query";

			while($row = mysql_fetch_array($result)){
				$bandera = true;	
				foreach ($lista2 as $valor){
					if($valor == $row[1]){	
						$bandera = false;

					}
				}
				//echo "$bandera";
				if($bandera){
					$customerCare = new CustomerCare($row[0],$row[1],$row[2], $row[3]);				
					array_push($lista, $customerCare);
				}
	 			
			}

			

			return $lista;
			
		}
	}
}
?>