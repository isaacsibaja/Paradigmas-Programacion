<?php
header('Content-Type: text/html; charset=ISO-8859-1');

class DataCategoria{

	function DataCategoria(){
	}

	function insertar($categoria){
		$con = new DBConexion;
		if($con->conectar()==true){			
			$query = "INSERT INTO tbcategoria(descripcion) 
					VALUES ('".$categoria->getDescripcion()."')";		
			$result = @mysql_query($query);	
			if (!$result){
				return false;
			}else{
				return $result;
			}
		}	
	}

	function getCategorias(){
		$con = new DBConexion;
		$lista = array();
		if($con->conectar()==true){		
			$query = "SELECT * FROM tbcategoria";
			$result = @mysql_query($query);			
			while($row = mysql_fetch_array($result)){				
	 			$categoria = new Categoria( $row[0], $row[1] );	
				array_push($lista, $categoria);
			}
			if (!$lista){
				return false;
			}else{
				return $lista;
			}
		}
	}

	function eliminar($idCategoria){
		$con = new DBConexion;
		if($con->conectar()==true){			
			$query = "DELETE FROM tbcategoria WHERE idCategoria=".$idCategoria;		
			$result = @mysql_query($query);	
			if (!$result){
				return false;
			}else{
				return $result;
			}
		}	
	}

	function getCategoria($idCategoria){
		$con = new DBConexion;
		$categoria;		
		if($con->conectar()==true){		
			$query = "SELECT * FROM tbcategoria WHERE idCategoria = ".$idCategoria;
			$result = @mysql_query($query);			
			if($row = mysql_fetch_array($result)){				
	 			$categoria = new Categoria( $row[0], $row[1] );					
			}
			if (!$categoria){
				return false;
			}else{
				return $categoria;
			}
		}
	}

	function modificar($categoria){
		$con = new DBConexion;
		if($con->conectar()==true){			
			$query = "UPDATE tbcategoria SET 
			descripcion='".$categoria->getDescripcion()."' 
			 WHERE idCategoria = ".$categoria->getIdCategoria()."";		
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