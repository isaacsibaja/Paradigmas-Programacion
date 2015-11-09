<?php


class DataPresentacionProducto{

	function DataPresentacionProducto(){
	}

	function getId(){
		$con = new DBConexion;
		if($con->conectar()==true){		

			$query = mysql_query("SELECT count(*) from tbpresentacionproducto");
			if ($row = mysql_fetch_row($query)) {
				$cantidadRegistro = trim($row[0]);
			}
						
			$query = mysql_query("SELECT MAX(idPresentacionProducto) AS idPresentacionProducto FROM tbpresentacionproducto");
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
			$query = "SELECT idPresentacionProducto FROM tbpresentacionproducto";
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
	

	function insertar($presentacionProducto){
		$con = new DBConexion;
		if($con->conectar()==true){		
		$id = $this->getId();	
			$query = "INSERT INTO tbpresentacionproducto(idPresentacionProducto, descripcionPresentacion) VALUES (
				".$id.",
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


	function getPresentacionesProductos(){
		$con = new DBConexion;
		$lista = array();		
		if($con->conectar()==true){		
			$query = "SELECT idPresentacionProducto, descripcionPresentacion FROM tbpresentacionproducto";
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
			$query = "DELETE FROM tbpresentacionproducto WHERE idPresentacionProducto=".$id;		
			$result = @mysql_query($query);	
			//echo "<br/>$query<br/>";
			if (!$result){
				return false;
			}else{
				return $result;
			}
		}	
	}

	function getPresentacionProducto($id){
		$con = new DBConexion;
		$presentacionProducto;		
		if($con->conectar()==true){		
			$query = "SELECT idPresentacionProducto, descripcionPresentacion FROM tbpresentacionproducto 
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
			$query = "UPDATE tbpresentacionproducto SET
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