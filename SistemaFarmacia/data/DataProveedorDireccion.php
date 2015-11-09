<?php


class DataProveedorDireccion{

	function DataProveedorDireccion(){
	}

	

	function insertar($proveedorDireccion){
		$con = new DBConexion;
		if($con->conectar()==true){			
			$query = "INSERT INTO tbproveedordireccion (idProveedorDireccion, provincia, 
				canton, distrito, otraSenias) VALUES (
				'".$proveedorDireccion->getIdProveedorDireccionDireccion($idProveedorDireccion)."',
				'".$proveedorDireccion->getProvincia($provincia)."',
				'".$proveedorDireccion->getCanton($canton)."',
				'".$proveedorDireccion->getDistrito($distrito)."',
				'".$proveedorDireccion->getOtraSenias($otraSenias)."' )";
			$result = @mysql_query($query);	
			if (!$result){
				return false;
			}else{
				return $result;
			}
		}	
	}

	function getProveedoresDireccion(){
		$con = new DBConexion;
		$lista = array();		
		if($con->conectar()==true){	
			$query = "SELECT * FROM tbproveedordireccion";
			$result = @mysql_query($query);			
			while($row = mysql_fetch_array($result)){				
	 			$proveedorDireccion = new proveedorDireccion($row[0],$row[1],$row[2],$row[3],$row[4]);				
				array_push($lista, $proveedorDireccion);
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
			$query = "DELETE FROM tbproveedordireccion WHERE idProveedorDireccion=".$id;		
			$result = @mysql_query($query);	
			if (!$result){
				return false;
			}else{
				return $result;
			}
		}	
	}

	function getProveedores($id){
		$con = new DBConexion;
		$proveedorDireccion;		
		if($con->conectar()==true){		
			$query = "SELECT * FROM tbproveedordireccion WHERE idProveedorDireccion = ".$id;
			$result = @mysql_query($query);			
			if($row = mysql_fetch_array($result)){				
	 			$proveedorDireccion = new Proveedor($row[0],$row[1],$row[2],$row[3],$row[4]);				
			}
			if (!$proveedorDireccion){
				return false;
			}else{
				return $proveedorDireccion;
			}
		}
	}

	function modificar($proveedorDireccion){
		$con = new DBConexion;
		if($con->conectar()==true){
		$query = "UPDATE tbproveedordireccion SET 					  
					provincia=".$proveedorDireccion->getProvincia().",
					canton='".$proveedorDireccion->getCanton()."',
					distrito='".$proveedorDireccion->getDistrito()."',
					otraSenias='".$proveedorDireccion->getOtraSenias()."
					WHERE idProveedorDireccion=".$proveedorDireccion->getIdProveedorDireccion()."";
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