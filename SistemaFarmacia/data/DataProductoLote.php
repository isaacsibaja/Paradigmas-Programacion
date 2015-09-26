<?php
header('Content-Type: text/html; charset=ISO-8859-1');

class DataProductoLote{

	function DataProductoLote(){
	}
	
	function insertar($productoLote){
		$con = new DBConexion;
		if($con->conectar()==true){			
			$query = "INSERT INTO tbProductoLote( idProducto, idAgenteVenta, concentracion,
			 fechaIngreso, fechaVencimiento, cantidad, precioCompra, precioVenta) VALUES (
				".$productoLote->getIdProducto().", 
				".$productoLote->getIdAgenteVenta().", 
				".$productoLote->getConcentracion().", 
				'".$productoLote->getFechaIngreso()."',
				'".$productoLote->getFechaVencimiento()."', 
				".$productoLote->getCantidad().", 
				".$productoLote->getPrecioCompra().", 
				".$productoLote->getPrecioVenta().")";		
			$result = @mysql_query($query);	
			//echo "$query<br/>";
			if (!$result){
				return false;
			}else{
				return $result;
			}
		}	
	}

	function getProductoLotes(){
		$con = new DBConexion;
		$lista = array();
		
		if($con->conectar()==true){		
			$query = "SELECT idLote, descripcion, nombreAgente, concentracion, 
			DATE_FORMAT(fechaIngreso,'%d-%m-%Y'), DATE_FORMAT(fechaVencimiento,'%d-%m-%Y'), cantidad, 
			precioCompra, precioVenta FROM tbProductoLote pl 
			INNER JOIN tbProducto p ON p.idProducto = pl.idProducto 
			INNER JOIN tbAgenteVentas av ON pl.idAgenteVenta = av.idAgenteVenta";
			$result = @mysql_query($query);
			//echo "$query<br/>";
			while($row = mysql_fetch_array($result)){				
	 			$productoLote = new ProductoLote($row[0],$row[1],$row[2],$row[3],$row[4], $row[5], $row[6], $row[7], $row[8] );				
				array_push($lista, $productoLote);
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
			$query = "DELETE FROM tbProductoLote WHERE idLote = ".$id;
			//echo "$query<br/>";	
			$result = @mysql_query($query);	
			if (!$result){
				return false;
			}else{
				return $result;
			}
		}	
	}

	function getProductoLote($id){
		$con = new DBConexion;
		$productoLote;		
		if($con->conectar()==true){				
			$query = "SELECT * FROM tbProductoLote WHERE idLote = ".$id;		 
			$result = @mysql_query($query);
			//echo "$query<br/>";
			if($row = mysql_fetch_array($result)){				
	 			$productoLote = new ProductoLote($row[0],$row[1],$row[2],$row[3],$row[4], $row[5], $row[6], $row[7], $row[8] );				
			}
			if (!$productoLote){
				return false;
			}else{
				return $productoLote;
			}
		}
	}

	function modificar($productoLote){
		$con = new DBConexion;
		if($con->conectar()==true){
			$query = "UPDATE tbProductoLote SET 
			idProducto=".$productoLote->getIdProducto().",
			idAgenteVenta=".$productoLote->getIdAgenteVenta().",
			concentracion=".$productoLote->getConcentracion().",
			fechaVencimiento='".$productoLote->getFechaVencimiento()."',
			cantidad=".$productoLote->getCantidad().",
			precioCompra=".$productoLote->getPrecioCompra().",
			precioVenta=".$productoLote->getPrecioVenta()."
			WHERE idLote =  ".$productoLote->getIdLote()."";
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