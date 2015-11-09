<?php


class DataCasaComercial{

	function DataCasaComercial(){
	}

	function getId(){
		$con = new DBConexion;
		if($con->conectar()==true){		

			$query = mysql_query("SELECT count(*) from tbcasacomercial");
			if ($row = mysql_fetch_row($query)) {
				$cantidadRegistro = trim($row[0]);
			}
						
			$query = mysql_query("SELECT MAX(idCasaComercial) AS idCasaComercial FROM tbcasacomercial");
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
			$query = "SELECT idCasaComercial FROM tbcasacomercial";
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

	function insertar($casaComercial){
		$con = new DBConexion;
		if($con->conectar()==true){
			$id = $this->getId();
			$query = "INSERT INTO tbcasacomercial(idCasaComercial, direccionCasaComercial, nombreCasaComercial, telefonoCasaComercial,
			 correoCasaComercial, faxCasaComercial) VALUES (
			 	".$id.",
				'".$casaComercial->getDireccionCasaComercial()."',
				'".$casaComercial->getNombreCasaComercial()."',
				'".$casaComercial->getTelefonoCasaComercial()."',
				'".$casaComercial->getCorreoCasaComercial()."',
				'".$casaComercial->getCorreoCasaComercial()."' )";
		
			$result = @mysql_query($query);	
			echo "$query";
			if (!$result){
				return false;
			}else{
				return $result;
			}
		}	
	}


	function getCasasComerciales(){
		$con = new DBConexion;
		$lista = array();
		
		if($con->conectar()==true){		
			$query = "SELECT idCasaComercial, direccionCasaComercial, nombreCasaComercial, telefonoCasaComercial,
			 correoCasaComercial, faxCasaComercial FROM tbcasacomercial";
			$result = @mysql_query($query);
			
			while($row = mysql_fetch_array($result)){				
	 			$casaComercial = new CasaComercial($row[0],$row[1],$row[2],$row[3],$row[4],$row[5]);				
				array_push($lista, $casaComercial);
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
			$query = "DELETE FROM tbcasacomercial WHERE idCasaComercial=".$id;		
			$result = @mysql_query($query);	
			if (!$result){
				return false;
			}else{
				return $result;
			}
		}	
	}



	function getCasaComercial($id){
		$con = new DBConexion;
		$casaComercial;		
		if($con->conectar()==true){		
			$query = "SELECT idCasaComercial, direccionCasaComercial, nombreCasaComercial, telefonoCasaComercial, correoCasaComercial, faxCasaComercial FROM tbcasacomercial WHERE idCasaComercial = ".$id;
			$result = @mysql_query($query);			
			if($row = mysql_fetch_array($result)){				
	 			$casaComercial = new CasaComercial($row[0],$row[1],$row[2],$row[3],$row[4],$row[5]);				
			}
			if (!$casaComercial){
				return false;
			}else{
				return $casaComercial;
			}
		}
	}

	function modificar($casaComercial){
		$con = new DBConexion;
		if($con->conectar()==true){			
			$query = "UPDATE tbcasacomercial SET 
					direccionCasaComercial='".$casaComercial->getDireccionCasaComercial()."',  
					nombreCasaComercial='".$casaComercial->getNombreCasaComercial()."',
					telefonoCasaComercial='".$casaComercial->getTelefonoCasaComercial()."',
					correoCasaComercial='".$casaComercial->getCorreoCasaComercial()."',
					faxCasaComercial='".$casaComercial->getCorreoCasaComercial()."' 
					WHERE idCasaComercial =".$casaComercial->getIdCasaComercial()."";
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