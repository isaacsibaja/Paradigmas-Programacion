<?php
header('Content-Type: text/html; charset=ISO-8859-1');
// <!-- Norma iso para los caracteres latinos-->
/*
hola gente 
*/
class DataTipoPago{

	function DataTipoPago(){
	}


	function get_tipoPagos(){
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