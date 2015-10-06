<?php
header('Content-Type: text/html; charset=ISO-8859-1');

class DataAgenteVentas{

	function DataAgenteVentas(){
	}

	function getId(){
		$con = new DBConexion;
		if($con->conectar()==true){		

			$query = mysql_query("SELECT count(*) from tbagenteventas");
			if ($row = mysql_fetch_row($query)) {
				$cantidadRegistro = trim($row[0]);
			}
						
			$query = mysql_query("SELECT MAX(idAgenteVenta) AS idAgenteVenta FROM tbagenteventas");
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
			$query = "SELECT idAgenteVenta FROM tbagenteventas";
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
	
	function insertar($agenteVentas){
		$con = new DBConexion;
		if($con->conectar()==true){	
		$id = $this->getId();		
			$query = "INSERT INTO tbagenteventas(idAgenteVenta,nombreAgente, telefonoAgente,
			 correoAgente) VALUES (
			 	".$id.",
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
			$query = "SELECT idAgenteVenta, nombreAgente, telefonoAgente, correoAgente FROM tbagenteventas";
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
			$query = "DELETE FROM tbagenteventas WHERE idAgenteVenta=".$id;		
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
			$query = "SELECT idAgenteVenta, nombreAgente, telefonoAgente, correoAgente FROM tbagenteventas 
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
			$query = "UPDATE tbagenteventas SET
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