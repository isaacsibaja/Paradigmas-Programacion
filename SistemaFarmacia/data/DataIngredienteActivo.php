<?php
header('Content-Type: text/html; charset=ISO-8859-1');
// <!-- Norma iso para los caracteres latinos-->

class DataIngredienteActivo{

	function DataIngredienteActivo(){
	}

	function insertar($MiIngredienteActivo){
		$con = new DBConexion;
		if($con->conectar()==true){
			
			$query = "INSERT INTO tbIngredienteActivo(descripcionIngrediente) 
					VALUES ('".$MiIngredienteActivo->getDescripcionIngrediente()."')";

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
				
	 			$MiIngredienteActivo = new IngredienteActivo( $row[0], $row[1] );	
				array_push($lista, $MiIngredienteActivo);
				//echo "$row[0]<br/>$row[1]";
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
		// se declara una lista enlazada
		$MiIngredienteActivo;
		
		if($con->conectar()==true){
		
			$query = "SELECT * FROM tbIngredienteActivo WHERE idIngredienteActivo = ".$id;
			//echo "$query<br/><br/>";
			$result = @mysql_query($query);
			
			if($row = mysql_fetch_array($result)){
				
	 			$MiIngredienteActivo = new IngredienteActivo( $row[0], $row[1] );	
				
			}
			if (!$MiIngredienteActivo){
				return false;
			}else{
				return $MiIngredienteActivo;
			}
		}
	}

	function modificar($MiIngredienteActivo){
		$con = new DBConexion;
		if($con->conectar()==true){
			
			$query = "UPDATE tbIngredienteActivo SET 
			descripcionIngrediente='".$MiIngredienteActivo->getDescripcionIngrediente()."' 
			 WHERE idIngredienteActivo = ".$MiIngredienteActivo->getIdIngredienteActivo()."";		
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