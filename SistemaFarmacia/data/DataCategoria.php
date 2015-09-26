<?php
header('Content-Type: text/html; charset=ISO-8859-1');

class DataCategoria{

	function DataCategoria(){
	}

	function insertar($categoria){
		$con = new DBConexion;
		if($con->conectar()==true){			
			$query = "INSERT INTO tbCategoria(descripcion) 
					VALUES ('".$categoria->getDescripcion()."')";		
			$result = @mysql_query($query);	
			if (!$result){
				return false;
			}else{
				return $result;
			}
		}	
	}

	function getcategorias(){
		$con = new DBConexion;
		$lista = array();
		if($con->conectar()==true){		
			$query = "SELECT * FROM tbCategoria";
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

	function eliminar($id){
		$con = new DBConexion;
		if($con->conectar()==true){			
			$query = "DELETE FROM tbCategoria WHERE idCategoria=".$id;		
			$result = @mysql_query($query);	
			if (!$result){
				return false;
			}else{
				return $result;
			}
		}	
	}

	function getcategoria($id){
		$con = new DBConexion;
		$categoria;		
		if($con->conectar()==true){		
			$query = "SELECT * FROM tbCategoria WHERE idCategoria = ".$id;
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
			$query = "UPDATE tbCategoria SET 
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