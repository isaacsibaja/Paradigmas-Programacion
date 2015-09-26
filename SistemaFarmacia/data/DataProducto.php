<?php
header('Content-Type: text/html; charset=ISO-8859-1');

class DataProducto{

	function DataProducto(){
	}
	
	function insertar($producto){
		$con = new DBConexion;
		if($con->conectar()==true){			
			$query = "INSERT INTO tbProducto( idCategoria, idTipoProducto,
			 idPresentacionProducto, idUnidadMedida, descripcion) VALUES (
				".$producto->getIdCategoria().",
				".$producto->getIdTipoProducto().",
				".$producto->getIdPresentacionProducto().",
				".$producto->getIdUnidadMedida().",
				'".$producto->getDescripcion()."')";		
			$result = @mysql_query($query);	
			if (!$result){
				return false;
			}else{
				return $result;
			}
		}	
	}

	function getProductos(){
		$con = new DBConexion;
		$lista = array();		
		if($con->conectar()==true){		
			$query = "SELECT idProducto, c.descripcion, 
					descripcionTipo, descripcionPresentacion,
			 		descripcionUnidad, p.descripcion 
					FROM tbProducto p INNER JOIN tbCategoria c ON p.idCategoria=c.idCategoria 
					INNER JOIN tbTipoProducto t ON p.idTipoProducto = t.idTipoProducto 
					INNER JOIN tbPresentacionProducto pp ON p.idPresentacionProducto = pp.idPresentacionProducto 
					INNER JOIN tbUnidadMedida u ON u.idUnidadMedida = p.idUnidadMedida";
			$result = @mysql_query($query);
			while($row = mysql_fetch_array($result)){				
	 			$producto = new Producto($row[0],$row[1],$row[2],$row[3],$row[4], $row[5]);				
				array_push($lista, $producto);
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
			$query = "DELETE FROM tbProducto WHERE idProducto = ".$id;
			//echo "$query<br/>";	
			$result = @mysql_query($query);	
			if (!$result){
				return false;
			}else{
				return $result;
			}
		}	
	}



	function getProducto($id){
		$con = new DBConexion;
		$producto;		
		if($con->conectar()==true){		
			/*$query = "SELECT idProducto, c.descripcion, descripcionTipo, descripcionPrecentacion,
			 		descripcionUnidad, p.descripcion 
					FROM tbProducto p INNER JOIN tbCategoria c ON p.idCategoria=c.idCategoria 
					INNER JOIN tbTipoProducto t ON p.idTipoProducto = t.idTipoProducto 
					INNER JOIN tbPrecentacionProducto pp ON p.idPrecentacionProducto = pp.idPrecentacionProducto 
					INNER JOIN tbUnidadMedida u ON u.idUnidadMedida = p.idUnidadMedida
					 WHERE idProducto = ".$id;*/
			$query = "SELECT * FROM tbProducto WHERE idProducto = ".$id;		 
			$result = @mysql_query($query);
			//echo "$query<br/>";
			if($row = mysql_fetch_array($result)){				
	 			$producto = new Producto($row[0],$row[1],$row[2],$row[3],$row[4],$row[5]);				
			}
			if (!$producto){
				return false;
			}else{
				return $producto;
			}
		}
	}

	function modificar($producto){
		$con = new DBConexion;
		if($con->conectar()==true){

			$query = "UPDATE tbProducto SET 					
					idCategoria=".$producto->getIdCategoria().",
					idTipoProducto=".$producto->getIdTipoProducto().",
					idPresentacionProducto=".$producto->getIdPresentacionProducto().",
					idUnidadMedida=".$producto->getIdUnidadMedida().",
					descripcion='".$producto->getDescripcion()."'
					WHERE idProducto=".$producto->getIdProducto()."";
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