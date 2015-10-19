<?php
header('Content-Type: text/html; charset=ISO-8859-1');

class DataRegistro{

	function DataRegistro(){
	}	
	
	function insertar($registro){
		$con = new DBConexion;
		if($con->conectar()==true){			
			$query = "INSERT INTO registro(cedula, nombre, apellido1, apellido2) VALUES (
				'".$registro->getCedula()."',
				'".$registro->getNombre()."',
				'".$registro->getApellido1()."',
				'".$registro->getApellido2()."');";	
				//echo $query;	
				@mysql_query($query);
			/*$result = @mysql_query($query);	
			if (!$result){
				return false;
			}else{
				return $result;
			}*/
		}
	}


	function eliminar(){
		$con = new DBConexion;
		if($con->conectar()==true){			
			$query = "TRUNCATE registro";
			$result = @mysql_query($query);	
			if (!$result){
				return false;
			}else{
				return $result;
			}
		}	
	}



	function getregistro($id){
		$con = new DBConexion;
		$registro;		
		if($con->conectar()==true){		
			
			$query = "SELECT * FROM tbregistro WHERE idregistro = ".$id;		 
			$result = @mysql_query($query);
			//echo "$query<br/>";
			if($row = mysql_fetch_array($result)){				
	 			$registro = new registro($row[0],$row[1],$row[2],$row[3],$row[4],$row[5]);				
			}
			if (!$registro){
				return false;
			}else{
				return $registro;
			}
		}
	}
}
?>
