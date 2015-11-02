<?php
header('Content-Type: text/html; charset=ISO-8859-1');

class DataDoctor{

	function DataDoctor(){
	}

	

	function getNumberDoctors(){
		$con = new DBConexion;
		$quantity = 0;
		if($con->conectar()==true){		
			$query = "SELECT count(*) FROM tbdoctor";
			$result = @mysql_query($query);			
			if($row = mysql_fetch_array($result)){				
	 			$quantity = $row[0];
			}			
		}
		return $quantity;
	}



}
?>