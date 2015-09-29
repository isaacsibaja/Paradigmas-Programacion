<?php
header('Content-Type: text/html; charset=ISO-8859-1');

class DataPaciente{

	function DataPaciente(){
	}


	function getPacientes(){
		$con = new DBConexion;
		$lista = array();		
		if($con->conectar()==true){		
			$query = "SELECT * FROM tbpaciente";
			$result = @mysql_query($query);
			while($row = mysql_fetch_array($result)){				
	 			$paciente = new Paciente($row[0],$row[1],$row[2],$row[3],$row[4], $row[5],
	 			 $row[6], $row[7], $row[8] );	
			}
			if (!$lista){
				return false;
			}else{
				return $lista;
			}
		}
	} 

	function getPaciente($cedula){
		$con = new DBConexion;
		$paciente;		
		if($con->conectar()==true){				
			$query = "SELECT * FROM tbpaciente WHERE cedula = ".$cedula;		 
			$result = @mysql_query($query);
			//echo "<br/> Query = $query<br/>";
			if($row = mysql_fetch_array($result)){				
	 			$paciente = new Paciente($row[0],$row[1],$row[2],$row[3],$row[4], $row[5],
	 			 $row[6], $row[7], $row[8] );				
			}
			if (!$paciente){
				return false;
			}else{
				return $paciente;
			}
		}
	}




}
?>