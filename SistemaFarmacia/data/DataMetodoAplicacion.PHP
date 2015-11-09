<?php


class DataMetodoAplicacion{

	function DataMetodoAplicacion(){
	}

	function getMetodoAplicacion(($idProducto){
		$con = new DBConexion;
		$categoria;		
		if($con->conectar()==true){		
			$query = "SELECT mp.idMetodoAplicacion, descripcionAplicacion 
					FROM tbmetodoaplicacion mp 
					INNER JOIN  tbproductoaplicacion pa ON mp.idMetodoAplicacion = pa.idMetodoAplicacion 
					WHERE idProducto = ".$idProducto;
			$result = @mysql_query($query);			
			if($row = mysql_fetch_array($result)){				
	 			$categoria = new Categoria( $row[0], $row[1] );					
			}
			if (!$categoria){
				return false;
			}else{
				return $categoria;
			}
		}
	}
}
?>