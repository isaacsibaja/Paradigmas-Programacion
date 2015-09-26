<?php
header('Content-Type: text/html; charset=ISO-8859-1');

class DataAgenteVentas{

	function DataAgenteVentas(){
	}

	function insertar($agenteVentas){
		$con = new DBConexion;
		if($con->conectar()==true){			
			$query = "INSERT INTO tbAgenteVentas(nombreAgente, telefonoAgente,
			 correoAgente) VALUES (
				'".$agenteVentas->getNombreAgente()."',
				'".$agenteVentas->getTelefonoAgente()."',
				'".$agenteVentas->getCorreoAgente()."')";
		
			$result = @mysql_query($query);	
			if (!$result){
				return false;
			}else{
				return $result;
			}
		}	
	}

	function getAgentesVentas(){
		$con = new DBConexion;
		$lista = array();		
		if($con->conectar()==true){		
			$query = "SELECT idAgenteVenta, nombreAgente, telefonoAgente, correoAgente FROM tbAgenteVentas";
			$result = @mysql_query($query);			
			while($row = mysql_fetch_array($result)){				
	 			$agenteVentas = new agenteVentas($row[0],$row[1],$row[2],$row[3]);				
				array_push($lista, $agenteVentas);
			}
			if (!$lista){
				return false;
			}else{
				return $lista;
			}
		}
	}

	function eliminar($id){
		$con = new DBConexion;
		if($con->conectar()==true){			
			$query = "DELETE FROM tbAgenteVentas WHERE idAgenteVenta=".$id;		
			$result = @mysql_query($query);	
			if (!$result){
				return false;
			}else{
				return $result;
			}
		}	
	}

	function getAgenteVentas($id){
		$con = new DBConexion;
		$agenteVentas;
		
		if($con->conectar()==true){		
			$query = "SELECT idAgenteVenta, nombreAgente, telefonoAgente, correoAgente FROM tbAgenteVentas 
			WHERE idAgenteVenta = ".$id;
			$result = @mysql_query($query);			
			if($row = mysql_fetch_array($result)){				
	 			$agenteVentas = new agenteVentas($row[0],$row[1],$row[2],$row[3]);				
			}
			if (!$agenteVentas){
				return false;
			}else{
				return $agenteVentas;
			}
		}
	}

	function modificar($agenteVentas){
		$con = new DBConexion;
		if($con->conectar()==true){			
			$query = "UPDATE tbAgenteVentas SET
					nombreAgente='".$agenteVentas->getNombreAgente()."',  
					telefonoAgente='".$agenteVentas->getTelefonoAgente()."',
					correoAgente='".$agenteVentas->getCorreoAgente()."'
					WHERE idAgenteVenta =".$agenteVentas->getIdAgenteVenta()."";
				$result = @mysql_query($query);	
			//echo "$query <br/>";
			if (!$result){
				return false;
			}else{
				return $result;
			}
		}	
	}
}
?>