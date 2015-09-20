<?php
header('Content-Type: text/html; charset=ISO-8859-1');
// <!-- Norma iso para los caracteres latinos-->

class DataUnidadMedida{

	function DataUnidadMedida(){
	}

	function insertar($unidadMedida){
		$con = new DBConexion;
		if($con->conectar()==true){
			
			$query = "INSERT INTO tbUnidadMedida(descripcionUnidad) VALUES (
				'".$unidadMedida->get_descripcionUnidad()."')";
		
			$result = @mysql_query($query);	
			if (!$result){
				return false;
			}else{
				return $result;
			}
		}	
	}


	function get_unidadesMedidas(){
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


	function eliminar($id){
		$con = new DBConexion;
		if($con->conectar()==true){
			
			$query = "DELETE FROM `tbUnidadMedida` WHERE idUnidadMedida=".$id;		
			$result = @mysql_query($query);	
			echo "$query";
			if (!$result){
				return false;
			}else{
				return $result;
			}
		}	
	}



	function get_unidadMedida($id){
		$con = new DBConexion;
		$unidadMedida;
		
		if($con->conectar()==true){		
			$query = "SELECT idUnidadMedida, descripcionUnidad FROM tbUnidadMedida 
			WHERE idUnidadMedida = ".$id;
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
					descripcionUnidad='".$unidadMedida->get_descripcionUnidad()."' 
					WHERE idUnidadMedida =".$unidadMedida->get_idUnidadMedida()."";
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