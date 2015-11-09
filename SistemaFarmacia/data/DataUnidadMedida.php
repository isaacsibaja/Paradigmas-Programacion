<?php


class DataUnidadMedida{

	function DataUnidadMedida(){
	}


	function getId(){
		$con = new DBConexion;
		if($con->conectar()==true){		

			$query = mysql_query("SELECT count(*) from tbunidadmedida");
			if ($row = mysql_fetch_row($query)) {
				$cantidadRegistro = trim($row[0]);
			}
						
			$query = mysql_query("SELECT MAX(idUnidadMedida) AS idUnidadMedida FROM tbunidadmedida");
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
			$query = "SELECT idUnidadMedida FROM tbunidadmedida";
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
	
	
	function insertar($unidadMedida){
		$con = new DBConexion;
		if($con->conectar()==true){	
		$id = $this->getId();		
			$query = "INSERT INTO tbunidadmedida(idUnidadMedida,descripcionUnidad) VALUES (
				".$id.",
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
			$query = "SELECT idUnidadMedida, descripcionUnidad FROM tbunidadmedida";
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
			
			$query = "DELETE FROM `tbunidadmedida` WHERE idUnidadMedida=".$idUnidadMedida;		
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
			$query = "SELECT idUnidadMedida, descripcionUnidad FROM tbunidadmedida 
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
			$query = "UPDATE tbunidadmedida SET
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