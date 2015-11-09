<?php


class DataIngredienteActivo{

	function DataIngredienteActivo(){
	}

	function getId(){
		$con = new DBConexion;
		if($con->conectar()==true){		

			$query = mysql_query("SELECT count(*) from tbingredienteactivo");
			if ($row = mysql_fetch_row($query)) {
				$cantidadRegistro = trim($row[0]);
			}
						
			$query = mysql_query("SELECT MAX(idIngredienteActivo) AS idIngredienteActivo FROM tbingredienteactivo");
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
			$query = "SELECT idIngredienteActivo FROM tbingredienteactivo";
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
	
	
	function insertar($ingredienteActivo){
		$con = new DBConexion;
		if($con->conectar()==true){	
		$id = $this->getId();		
			$query = "INSERT INTO tbingredienteactivo(idIngredienteActivo, descripcionIngrediente) 
					VALUES (
						".$id.",	
						'".$ingredienteActivo->getDescripcionIngrediente()."')";
			$result = @mysql_query($query);	
			//echo "$query<br/>";
			if (!$result){
				return false;
			}else{
				return $result;
			}
		}	
	}

	function getIngredienteActivos(){
		$con = new DBConexion;
		$lista = array();		
		if($con->conectar()==true){		
			$query = "SELECT * FROM tbingredienteactivo";
			$result = @mysql_query($query);
			//echo "$query<br/>";
			while($row = mysql_fetch_array($result)){				
	 			$ingredienteActivo = new IngredienteActivo( $row[0], $row[1] );	
				array_push($lista, $ingredienteActivo);				
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
			$query = "DELETE FROM tbingredienteactivo WHERE idIngredienteActivo=".$id;		
			$result = @mysql_query($query);	
			if (!$result){
				return false;
			}else{
				return $result;
			}
		}	
	}

	function getIngredienteActivo($id){
		$con = new DBConexion;
		$ingredienteActivo;		
		if($con->conectar()==true){		
			$query = "SELECT * FROM tbingredienteactivo WHERE idIngredienteActivo = ".$id;
			$result = @mysql_query($query);			
			if($row = mysql_fetch_array($result)){				
	 			$ingredienteActivo = new IngredienteActivo( $row[0], $row[1] );					
			}
			if (!$ingredienteActivo){
				return false;
			}else{
				return $ingredienteActivo;
			}
		}
	}

	function modificar($ingredienteActivo){
		$con = new DBConexion;
		if($con->conectar()==true){			
			$query = "UPDATE tbingredienteactivo SET 
			descripcionIngrediente='".$ingredienteActivo->getDescripcionIngrediente()."' 
			 WHERE idIngredienteActivo = ".$ingredienteActivo->getIdIngredienteActivo()."";		
			$result = @mysql_query($query);	
			if (!$result){
				return false;
			}else{
				return $result;
			}
		}	
	}
}
?>