<?php
header('Content-Type: text/html; charset=ISO-8859-1');

class DataProductoLote{

	function DataProductoLote(){
	}

	function getId(){
		$con = new DBConexion;
		if($con->conectar()==true){		

			$query = mysql_query("SELECT count(*) from tbproductolote");
			if ($row = mysql_fetch_row($query)) {
				$cantidadRegistro = trim($row[0]);
			}
						
			$query = mysql_query("SELECT MAX(idLote) AS idLote FROM tbproductolote");
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
			$query = "SELECT idLote FROM tbproductolote";
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
	
	function insertar($productoLote){
		$con = new DBConexion;
		if($con->conectar()==true){	
		$id = $this->getId();		
			$query = "INSERT INTO tbproductolote(idLote, idProducto, idAgenteVenta, concentracion,
			 fechaIngreso, fechaVencimiento, cantidad, precioCompra, precioVenta) VALUES (
			 	".$id.",
				".$productoLote->getIdProducto().", 
				".$productoLote->getIdAgenteVenta().", 
				".$productoLote->getConcentracion().", 
				'".$productoLote->getFechaIngreso()."',
				'".$productoLote->getFechaVencimiento()."', 
				".$productoLote->getCantidad().", 
				".$productoLote->getPrecioCompra().", 
				".$productoLote->getPrecioVenta().")";		
			$result = @mysql_query($query);	
			echo "<br/>$query<br/>";
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
			precioCompra, precioVenta FROM tbproductolote pl 
			INNER JOIN tbproducto p ON p.idProducto = pl.idProducto 
			INNER JOIN tbagenteventas av ON pl.idAgenteVenta = av.idAgenteVenta ORDER BY idLote"  ;
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

	function eliminar($idLote){
		$con = new DBConexion;
		if($con->conectar()==true){			
			$query = "DELETE FROM tbproductolote WHERE idLote = ".$idLote;
			//echo "$query<br/>";	
			$result = @mysql_query($query);	
			if (!$result){
				return false;
			}else{
				return $result;
			}
		}	
	}

	function getProductoLote($idLote){
		$con = new DBConexion;
		$productoLote;		
		if($con->conectar()==true){				
			$query = "SELECT * FROM tbproductolote WHERE idLote = ".$idLote;		 
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
			$query = "UPDATE tbproductolote SET 
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