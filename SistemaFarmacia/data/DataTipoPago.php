<?php
header('Content-Type: text/html; charset=ISO-8859-1');

class DataTipoPago{

	function DataTipoPago(){
	}

	function getTipoPagos(){
		$con = new DBConexion;
		$lista = array();		
		if($con->conectar()==true){		
			$query = "SELECT * FROM tbtipopago";
			$result = @mysql_query($query);
			while($row = mysql_fetch_array($result)){				
	 			$tipoPago = new tipoPago($row[0],$row[1]);				
				array_push($lista, $tipoPago);	
			}
			if (!$lista){
				return false;	
			}else{
				return $lista;
			}
		}
	}	
}
?>