<?php
header('Content-Type: text/html; charset=ISO-8859-1');

class DataFactura{

	function DataFactura(){
	}
	

	function insertar($factura){
		$con = new DBConexion;
		if($con->conectar()==true){			
			$query = "INSERT INTO tbfactura( idReceta, idTipoPago, fecha, montoTotal)  VALUES (
				".$factura->getIdReceta().", 
				".$factura->getIdTipoPago().", 
				'".$factura->getFecha()."', 
				".$factura->getMontoTotal().")";		
			$result = @mysql_query($query);	
			//echo "$query<br/>";
			if (!$result){
				return false;
			}else{
				return $result;
			}
		}	
	}

	function getFacturas(){
		$con = new DBConexion;
		$lista = array();		
		if($con->conectar()==true){		
			$query = "SELECT * FROM tbfactura";
			$result = @mysql_query($query);
			while($row = mysql_fetch_array($result)){				
	 			$factura = new Factura($row[0],$row[1],$row[2],$row[3],$row[4]);				
				array_push($lista, $factura);
			}
			if (!$lista){
				return false;
			}else{
				return $lista;
			}
		}
	}


	function getFactura($idFactura){
		$con = new DBConexion;
		$factura;		
		if($con->conectar()==true){		
			$query = "SELECT * FROM tbfactura WHERE idFactura = ".$idFactura;		 
			$result = @mysql_query($query);
			//echo "$query<br/>";
			if($row = mysql_fetch_array($result)){				
	 			$factura = new Factura($row[0],$row[1],$row[2],$row[3],$row[4]);				
			}
			if (!$factura){
				return false;
			}else{
				return $factura;
			}
		}
	}

	
}
?>