<?php

class DataRegentSchedule{

	function DataRegentSchedule(){
	}

		function getId(){
		$con = new DBConexion;
		if($con->conectar()==true){		

			$query = mysql_query("SELECT count(*) from tbregentschedule");
			if ($row = mysql_fetch_row($query)) {
				$cantidadRegistro = trim($row[0]);
			}
						
			$query = mysql_query("SELECT MAX(idRegentSchedule) AS idRegentSchedule FROM tbregentschedule");
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
			$query = "SELECT idRegentSchedule FROM tbregentschedule";
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

		function insertar($RegentSchedule){
		$con = new DBConexion;
		if($con->conectar()==true){
			$id = $this->getId();
			$query = "INSERT INTO tbregentschedule(`idRegentSchedule`, `idDoctor`, `date`, `hour`) VALUES (
				".$id.",
				'".$RegentSchedule->getIdDoctor()."',
				'".$RegentSchedule->getDate()."',
				'".$RegentSchedule->getHour()."')";
		
			$result = @mysql_query($query);	
			if (!$result){
				return false;
			}else{
				return $result;
			}
		}	
	}


	function getRegentSchedule(){

		date_default_timezone_set('America/Costa_Rica');
		$anteayer = strftime("%Y-%m-%d", strtotime("-2 day"));

		$con = new DBConexion;
		$lista = array();
		
		if($con->conectar()==true){		
			$query = "SELECT * FROM tbregentschedule 
						WHERE date >= '".$anteayer."' 
						ORDER BY date ASC";
			$result = @mysql_query($query);
			//echo "$query";
			while($row = mysql_fetch_array($result)){	
		
	 			$regentSchedule = new RegentSchedule($row[0],$row[1],$row[2], $row[3]);				
				array_push($lista, $regentSchedule);
			}
			return $lista;
			
		}
	}

}
?>