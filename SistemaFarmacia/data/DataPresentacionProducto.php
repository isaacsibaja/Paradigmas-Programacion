<?php
header('Content-Type: text/html; charset=ISO-8859-1');

class DataPresentacionProducto{

	function DataPresentacionProducto(){
	}

	function insertar($presentacionProducto){
		$con = new DBConexion;
		if($con->conectar()==true){			
			$query = "INSERT INTO tbPresentacionProducto(descripcionPresentacion) VALUES (
				'".$presentacionProducto->getDescripcionPresentacion()."')";
			//echo "<br/>$query<br/>";
			$result = @mysql_query($query);	
			if (!$result){
				return false;
			}else{
				return $result;
			}
		}	
	}


	function getPrecentacionesProductos(){
		$con = new DBConexion;
		$lista = array();		
		if($con->conectar()==true){		
			$query = "SELECT idPresentacionProducto, descripcionPresentacion FROM tbPresentacionProducto";
			$result = @mysql_query($query);
			//echo "<br/>$query<br/>";
			while($row = mysql_fetch_array($result)){				
	 			$presentacionProducto = new PresentacionProducto($row[0],$row[1]);				
				array_push($lista, $presentacionProducto);
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
			$query = "DELETE FROM tbPresentacionProducto WHERE idPresentacionProducto=".$id;		
			$result = @mysql_query($query);	
			//echo "<br/>$query<br/>";
			if (!$result){
				return false;
			}else{
				return $result;
			}
		}	
	}

	function get_PresentacionProducto($id){
		$con = new DBConexion;
		$presentacionProducto;		
		if($con->conectar()==true){		
			$query = "SELECT idPresentacionProducto, descripcionPresentacion FROM tbPresentacionProducto 
			WHERE idPresentacionProducto = ".$id;
			$result = @mysql_query($query);
			//echo "<br/>$query<br/>";
			if($row = mysql_fetch_array($result)){				
	 			$presentacionProducto = new PresentacionProducto($row[0],$row[1]);				
			}
			if (!$presentacionProducto){
				return false;
			}else{
				return $presentacionProducto;
			}
		}
	}

	function modificar($presentacionProducto){
		$con = new DBConexion;
		if($con->conectar()==true){			
			$query = "UPDATE tbPresentacionProducto SET
					descripcionPresentacion='".$presentacionProducto->getDescripcionPresentacion()."' 
					WHERE idPresentacionProducto =".$presentacionProducto->getIdPresentacionProducto()."";
				$result = @mysql_query($query);	
			//echo "<br/>$query<br/>";
			if (!$result){
				return false;
			}else{
				return $result;
			}
		}	
	}
}
?>