<?php
header('Content-Type: text/html; charset=ISO-8859-1');

class DataUnidadMedida{

	function DataUnidadMedida(){
	}

	function insertar($unidadMedida){
		$con = new DBConexion;
		if($con->conectar()==true){			
			$query = "INSERT INTO tbUnidadMedida(descripcionUnidad) VALUES (
				'".$unidadMedida->getDescripcionUnidad()."')";		
			$result = @mysql_query($query);	
			if (!$result){
				return false;
			}else{
				return $result;
			}
		}	
	}

	function getUnidadesMedidas(){
		$con = new DBConexion;
		$lista = array();
		
		if($con->conectar()==true){		
			$query = "SELECT idUnidadMedida, descripcionUnidad FROM tbUnidadMedida";
			$result = @mysql_query($query);			
			while($row = mysql_fetch_array($result)){				
	 			$unidadMedida = new unidadMedida($row[0],$row[1]);				
				array_push($lista, $unidadMedida);
			}
			if (!$lista){
				return false;
			}else{
				return $lista;
			}
		}
	}

	function eliminar($idUnidadMedida){
		$con = new DBConexion;
		if($con->conectar()==true){
			
			$query = "DELETE FROM `tbUnidadMedida` WHERE idUnidadMedida=".$idUnidadMedida;		
			$result = @mysql_query($query);	
			echo "$query";
			if (!$result){
				return false;
			}else{
				return $result;
			}
		}	
	}

	function getUnidadMedida($idUnidadMedida){
		$con = new DBConexion;
		$unidadMedida;		
		if($con->conectar()==true){		
			$query = "SELECT idUnidadMedida, descripcionUnidad FROM tbUnidadMedida 
			WHERE idUnidadMedida = ".$idUnidadMedida;
			$result = @mysql_query($query);			
			if($row = mysql_fetch_array($result)){				
	 			$unidadMedida = new unidadMedida($row[0],$row[1]);				
			}
			if (!$unidadMedida){
				return false;
			}else{
				return $unidadMedida;
			}
		}
	}

	function modificar($unidadMedida){
		$con = new DBConexion;
		if($con->conectar()==true){			
			$query = "UPDATE tbUnidadMedida SET
					descripcionUnidad='".$unidadMedida->getDescripcionUnidad()."' 
					WHERE idUnidadMedida =".$unidadMedida->getIdUnidadMedida()."";
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