<?php


class DataProducto{

	function DataProducto(){
	}
	
	function getId(){
		$con = new DBConexion;
		if($con->conectar()==true){		

			$query = mysql_query("SELECT count(*) from tbproducto");
			if ($row = mysql_fetch_row($query)) {
				$cantidadRegistro = trim($row[0]);
			}
						
			$query = mysql_query("SELECT MAX(idProducto) AS idProducto FROM tbproducto");
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
			$query = "SELECT idProducto FROM tbproducto";
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
	
	
	function insertar($producto){
		$con = new DBConexion;
		if($con->conectar()==true){	
		$id = $this->getId();		
			$query = "INSERT INTO tbproducto(idProducto, idCategoria, idTipoProducto,
			 idPresentacionProducto, idUnidadMedida, descripcion) VALUES (
			 	".$id.",
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
					FROM tbproducto p INNER JOIN tbcategoria c ON p.idCategoria=c.idCategoria 
					INNER JOIN tbtipoproducto t ON p.idTipoProducto = t.idTipoProducto 
					INNER JOIN tbpresentacionproducto pp ON p.idPresentacionProducto = pp.idPresentacionProducto 
					INNER JOIN tbunidadmedida u ON u.idUnidadMedida = p.idUnidadMedida";
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
			$query = "DELETE FROM tbproducto WHERE idProducto = ".$id;
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
					FROM tbproducto p INNER JOIN tbCategoria c ON p.idCategoria=c.idCategoria 
					INNER JOIN tbTipoProducto t ON p.idTipoProducto = t.idTipoProducto 
					INNER JOIN tbPrecentacionProducto pp ON p.idPrecentacionProducto = pp.idPrecentacionProducto 
					INNER JOIN tbUnidadMedida u ON u.idUnidadMedida = p.idUnidadMedida
					 WHERE idProducto = ".$id;*/
			$query = "SELECT * FROM tbproducto WHERE idProducto = ".$id;		 
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

			$query = "UPDATE tbproducto SET 					
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