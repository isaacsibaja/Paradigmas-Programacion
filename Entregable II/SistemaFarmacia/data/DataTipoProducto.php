<?php
header('Content-Type: text/html; charset=ISO-8859-1');

class DataTipoProducto{

	function DataTipoProducto(){
	}

	function getId(){
		$con = new DBConexion;
		if($con->conectar()==true){		

			$query = mysql_query("SELECT count(*) from tbtipoproducto");
			if ($row = mysql_fetch_row($query)) {
				$cantidadRegistro = trim($row[0]);
			}
						
			$query = mysql_query("SELECT MAX(idTipoProducto) AS idTipoProducto FROM tbtipoproducto");
			if ($row = mysql_fetch_row($query)) {
				$UltimoId = trim($row[0]);				
			}
			$UltimoId+=1;
		}
		if($cantidadRegistro == $UltimoId){
			return $UltimoId;
		}else{
			$lista = array();
			$contador = 1;
			$query = "SELECT idTipoProducto FROM tbtipoproducto";
			$result = @mysql_query($query);			
			while($row = mysql_fetch_array($result)){	 		
				array_push($lista, $row[0]);
			}
			foreach ($lista as $dato) {

				if($contador != $dato){
					break;
				}
				$contador++;
			}
			return $contador;
		}			
	}
	
	
	function insertar($tipoProducto){
		$con = new DBConexion;
		if($con->conectar()==true){	
			$id = $this->getId();		
			$query = "INSERT INTO tbtipoproducto (idTipoProducto, descripcionTipo) VALUES (
				".$id.",
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
			$query = "SELECT idTipoProducto, descripcionTipo FROM tbtipoproducto";
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
			$query = "DELETE FROM tbtipoproducto WHERE idTipoProducto=".$id;		
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
			$query = "SELECT idTipoProducto, descripcionTipo FROM tbtipoproducto 
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
			$query = "UPDATE tbtipoproducto SET
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