<?php


class DataDoctor{

	function DataDoctor(){
	}

	

	function getNumberDoctors(){
		$con = new DBConexion;
		$quantity = 0;
		if($con->conectar()==true){		
			$query = "SELECT count(*) FROM tbuser WHERE typeUser = 1";
			$result = @mysql_query($query);			
			if($row = mysql_fetch_array($result)){				
	 			$quantity = $row[0];
			}			
		}
		return $quantity;
	}



}
?>