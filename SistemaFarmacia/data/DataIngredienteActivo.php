<?php
header('Content-Type: text/html; charset=ISO-8859-1');

class DataIngredienteActivo{

	function DataIngredienteActivo(){
	}

	function insertar($ingredienteActivo){
		$con = new DBConexion;
		if($con->conectar()==true){			
			$query = "INSERT INTO tbIngredienteActivo(descripcionIngrediente) 
					VALUES ('".$ingredienteActivo->getDescripcionIngrediente()."')";
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
			$query = "SELECT * FROM tbIngredienteActivo";
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
			$query = "DELETE FROM tbIngredienteActivo WHERE idIngredienteActivo=".$id;		
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
			$query = "SELECT * FROM tbIngredienteActivo WHERE idIngredienteActivo = ".$id;
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
			$query = "UPDATE tbIngredienteActivo SET 
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