<?php
header('Content-Type: text/html; charset=ISO-8859-1');
// <!-- Norma iso para los caracteres latinos-->
/*
hola gente 
*/
class DataPrecentacionProducto{

	function DataPrecentacionProducto(){
	}

	function insertar($precentacionProducto){
		$con = new DBConexion;
		if($con->conectar()==true){
			
			$query = "INSERT INTO tbPresentacionProducto(descripcionPresentacion) VALUES (
				'".$precentacionProducto->get_descripcionPrecentacion()."')";
			//echo "<br/>$query<br/>";
			$result = @mysql_query($query);	
			if (!$result){
				return false;
			}else{
				return $result;
			}
		}	
	}


	function get_precentacionesProductos(){
		$con = new DBConexion;
		$lista = array();
		
		if($con->conectar()==true){		
			$query = "SELECT idPresentacionProducto, descripcionPresentacion FROM tbPresentacionProducto";
			$result = @mysql_query($query);
			//echo "<br/>$query<br/>";
			while($row = mysql_fetch_array($result)){				
	 			$precentacionProducto = new precentacionProducto($row[0],$row[1]);				
				array_push($lista, $precentacionProducto);
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



	function get_precentacionProducto($id){
		$con = new DBConexion;
		$precentacionProducto;
		
		if($con->conectar()==true){		
			$query = "SELECT idPresentacionProducto, descripcionPresentacion FROM tbPresentacionProducto 
			WHERE idPresentacionProducto = ".$id;
			$result = @mysql_query($query);
			//echo "<br/>$query<br/>";
			if($row = mysql_fetch_array($result)){				
	 			$precentacionProducto = new precentacionProducto($row[0],$row[1]);				
			}

			if (!$precentacionProducto){
				return false;
			}else{
				return $precentacionProducto;
			}
		}
	}

	function modificar($precentacionProducto){
		$con = new DBConexion;
		if($con->conectar()==true){
			
			$query = "UPDATE tbPresentacionProducto SET
					descripcionPresentacion='".$precentacionProducto->get_descripcionPrecentacion()."' 
					WHERE idPresentacionProducto =".$precentacionProducto->get_idPrecentacionProducto()."";
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