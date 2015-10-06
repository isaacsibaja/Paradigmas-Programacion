<?php
header('Content-Type: text/html; charset=ISO-8859-1');

class DataSintoma{

	function DataSintoma(){
	}




	function getSintomas($idSintoma){
		$con = new DBConexion;
		$lista = array();		
		if($con->conectar()==true){		
			$query = "SELECT s.* FROM `tbsintoma` s 
						INNER JOIN tbproductosintoma ps ON s.idSintoma = ps.idSintoma 
						INNER JOIN tbproducto p ON ps.idProducto = p.idProducto 
						INNER JOIN tbcategoria c ON c.idCategoria = p.idCategoria 
						WHERE c.idCategoria = ".$idSintoma." 
						GROUP BY s.idSintoma";
			$result = @mysql_query($query);			
			while($row = mysql_fetch_array($result)){				
	 			$sintoma = new Sintoma($row[0], $row[1]);	
	 			array_push($lista, $sintoma);			
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