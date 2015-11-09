<?php


class DataproductoIngrediente{

	function DataproductoIngrediente(){
	}

	function insertar($productoIngrediente){
		$con = new DBConexion;
		if($con->conectar()==true){
			$query = "INSERT INTO tbproductoingrediente ( idProducto, idIngredienteActivo ) 
			VALUES (".$productoIngrediente->getIdProducto().", 
					".$productoIngrediente->getIdIngredienteActivo().")";
			//echo "<br/>$query<br/>";
			$result = @mysql_query($query);	
			if (!$result){
				return false;
			}else{
				return $result;
			}
		}	
	}

	function getProductoIngredientes(){
		$con = new DBConexion;
		$lista = array();		
		if($con->conectar()==true){		
			$query = "SELECT * FROM tbproductoingrediente";
			$result = @mysql_query($query);
			//echo "<br/>$query<br/>";
			while($row = mysql_fetch_array($result)){				
	 			$productoIngrediente = new ProductoIngrediente($row[0],$row[1]);				
				array_push($lista, $productoIngrediente);
			}
			if (!$lista){
				return false;
			}else{
				return $lista;
			}
		}
	}

	function getProductoIngredienteSimple($id){
		$con = new DBConexion;
		$lista = array();		
		if($con->conectar()==true){		
			$query = "SELECT pi.idIngredienteActivo, i.descripcionIngrediente FROM tbproductoingrediente pi 
				INNER JOIN tbproducto p ON p.idProducto = pi.idProducto
				INNER JOIN tbingredienteactivo i ON i.idIngredienteActivo= pi.idIngredienteActivo 
				WHERE pi.idProducto = ".$id;
			$result = @mysql_query($query);
			//echo "<br/>$query<br/>";
			while($row = mysql_fetch_array($result)){				
	 			$productoIngrediente = new ProductoIngrediente($row[0],$row[1]);				
				array_push($lista, $productoIngrediente);
			}
			if (!$lista){
				return false;
			}else{
				return $lista;
			}
		}
	}

	function eliminar( $idProducto, $idIngredienteActivo ){
		$con = new DBConexion;
		if($con->conectar()==true){			
			$query = "DELETE FROM tbproductoingrediente 
				WHERE idProducto=".$idProducto." AND 
				idIngredienteActivo=".$idIngredienteActivo;
			$result = @mysql_query($query);	

			echo "<br/>$query<br/>";
			if (!$result){
				return false;
			}else{
				return $result;
			}
		}	
	}

	function getProductoIngrediente($idProducto, $idIngredienteActivo){
		$con = new DBConexion;
		$productoIngrediente;
		if($con->conectar()==true){		
			$query = "SELECT * FROM tbproductoingrediente WHERE 
			idProducto = ".$idProducto." AND idIngredienteActivo =".$idIngredienteActivo."";
			$result = @mysql_query($query);
			echo "<br/>$query<br/>";
			if($row = mysql_fetch_array($result)){				
	 			$productoIngrediente = new ProductoIngrediente($row[0],$row[1]);				
			}
			if (!$productoIngrediente){
				return false;
			}else{
				return $productoIngrediente;
			}
		}
	}

	function modificar($productoIngrediente){
		$con = new DBConexion;
		if($con->conectar()==true){			
			$query = "UPDATE tbproductoingrediente SET 					
					idProducto=".$productoIngrediente->getIdProducto().",
					idIngredienteActivo=".$productoIngrediente->getIdIngredienteActivo()."
					WHERE idProducto=".$productoIngrediente->getIdProducto()." AND 
					idIngredienteActivo='".$productoIngrediente->getIdIngredienteActivo()."";
			$result = @mysql_query($query);	
			//echo "<br/>$query<br/>";
			if (!$result){
				return false;
			}else{
				return $result;
			}
		}	
	}
}
?>