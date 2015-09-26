<?php
header('Content-Type: text/html; charset=ISO-8859-1');

class DataTipoProducto{

	function DataTipoProducto(){
	}

	function insertar($tipoProducto){
		$con = new DBConexion;
		if($con->conectar()==true){			
			$query = "INSERT INTO tbTipoProducto (descripcionTipo) VALUES (
				'".$tipoProducto->getDescripcionTipo()."')";		
			$result = @mysql_query($query);	
			if (!$result){
				return false;
			}else{
				return $result;
			}
		}	
	}

	function getTiposProductos(){
		$con = new DBConexion;
		$lista = array();		
		if($con->conectar()==true){		
			$query = "SELECT idTipoProducto, descripcionTipo FROM tbTipoProducto";
			$result = @mysql_query($query);
			while($row = mysql_fetch_array($result)){				
	 			$tipoProducto = new tipoProducto($row[0],$row[1]);				
				array_push($lista, $tipoProducto);
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
			$query = "DELETE FROM tbTipoProducto WHERE idTipoProducto=".$id;		
			$result = @mysql_query($query);	
			echo "$query";
			if (!$result){
				return false;
			}else{
				return $result;
			}
		}	
	}

	function getTipoProducto($id){
		$con = new DBConexion;
		$tipoProducto;	
		if($con->conectar()==true){		
			$query = "SELECT idTipoProducto, descripcionTipo FROM tbTipoProducto 
			WHERE idTipoProducto = ".$id;
			$result = @mysql_query($query);
			if($row = mysql_fetch_array($result)){				
	 			$tipoProducto = new tipoProducto($row[0],$row[1]);				
			}
			if (!$tipoProducto){
				return false;
			}else{
				return $tipoProducto;
			}
		}
	}

	function modificar($tipoProducto){
		$con = new DBConexion;
		if($con->conectar()==true){
			$query = "UPDATE tbTipoProducto SET
					descripcionTipo='".$tipoProducto->getDescripcionTipo()."' 
					WHERE idTipoProducto =".$tipoProducto->getIdTipoProducto()."";
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