<?php


class DataEnfermedad{

	function DataEnfermedad(){
	}

	function getEnfermedads(){
		$con = new DBConexion;
		$lista = array();
		if($con->conectar()==true){		
			$query = "SELECT * FROM tbenfermedad";
			$result = @mysql_query($query);			
			while($row = mysql_fetch_array($result)){				
	 			$enfermedad = new Enfermedad($row[0], $row[1] , $row[2]);	
				array_push($lista, $enfermedad);
			}
			if (!$lista){
				return false;
			}else{
				return $lista;
			}
		}
	}



	function getEnfermedad($idEnfermedad){
		$con = new DBConexion;
		$enfermedad;		
		if($con->conectar()==true){		
			$query = "SELECT * FROM tbenfermedad WHERE idEnfermedad = ".$idEnfermedad;
			$result = @mysql_query($query);			
			if($row = mysql_fetch_array($result)){				
	 			$enfermedad = new Enfermedad($row[0], $row[1] , $row[2]);				
			}
			if (!$enfermedad){
				return false;
			}else{
				return $enfermedad;
			}
		}
	}


}
?>