<?php
header('Content-Type: text/html; charset=ISO-8859-1');

class DataEntrega{

	function DataEntrega(){
	}

	function getId(){
		$con = new DBConexion;
		if($con->conectar()==true){		

			$query = mysql_query("SELECT count(*) from tbentrega");
			if ($row = mysql_fetch_row($query)) {
				$cantidadRegistro = trim($row[0]);
			}
						
			$query = mysql_query("SELECT MAX(idEntrega) AS idEntrega FROM tbentrega");
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
			$query = "SELECT idEntrega FROM tbentrega";
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
	

	function insertar($entrega){
		$con = new DBConexion;
		if($con->conectar()==true){
		$id = $this->getId();			
			$query = "INSERT INTO tbentrega(idEntrega, idFactura, estadoEntrega)  VALUES (
				".$id.",
				".$entrega->getIdFactura().", 
				'".$entrega->getEstadoEntrega()."')";		
			$result = @mysql_query($query);	
			//echo "$query<br/>";
			if (!$result){
				return false;
			}else{
				return $result;
			}
		}	
	}

	function getEntregas(){
		$con = new DBConexion;
		$lista = array();
		if($con->conectar()==true){		
			$query = "SELECT * FROM tbentrega";
			$result = @mysql_query($query);			
			while($row = mysql_fetch_array($result)){				
	 			$entrega = new Entrega( $row[0], $row[1] , $row[2]);	
				array_push($lista, $entrega);
			}
			if (!$lista){
				return false;
			}else{
				return $lista;
			}
		}
	}



	function getEntrega($idEntrega){
		$con = new DBConexion;
		$entrega;		
		if($con->conectar()==true){		
			$query = "SELECT * FROM tbentrega WHERE idEntrega = ".$idEntrega;
			$result = @mysql_query($query);			
			if($row = mysql_fetch_array($result)){				
	 			$entrega = new Entrega( $row[0], $row[1] , $row[2]);				
			}
			if (!$entrega){
				return false;
			}else{
				return $entrega;
			}
		}
	}


}
?>