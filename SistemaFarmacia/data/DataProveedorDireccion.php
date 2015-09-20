<?php
header('Content-Type: text/html; charset=ISO-8859-1');
// <!-- Norma iso para los caracteres latinos-->

class DataProveedorDireccion{

	function DataProveedorDireccion(){
	}

	function insertar($proveedorDireccion){
		$con = new DBConexion;
		if($con->conectar()==true){
			
			
			$query = "INSERT INTO tbproveedordireccion (idProveedorDireccion, provincia, canton, distrito, otraSenias) VALUES (
				'".$proveedorDireccion->get_idProveedorDireccionDireccion($idProveedorDireccion)."',
				'".$proveedorDireccion->get_provincia($provincia)."',
				'".$proveedorDireccion->get_canton($canton)."',
				'".$proveedorDireccion->get_distrito($distrito)."',
				'".$proveedorDireccion->get_otraSenias($otraSenias)."' )";

			$result = @mysql_query($query);	
			if (!$result){
				return false;
			}else{
				return $result;
			}
		}	
	}


	function get_proveedoresDireccion(){
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



	function get_proveedores($id){
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
			// UPDATE `tbproveedordireccion` SET ``=[value-1],``=[value-2],``=[value-3],``=[value-4],``=[value-5] WHERE 1
			$query = "UPDATE tbproveedordireccion SET 
					idProveedorDireccion=".$proveedorDireccion->get_idProveedorDireccion().",  
					provincia=".$provincia->get_provincia().",
					canton='".$canton->get_canton()."',
					distrito='".$distrito->get_distrito()."',
					otraSenias='".$otraSenias->get_cotraSenias()."";
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