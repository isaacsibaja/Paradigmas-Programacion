<?php
	include ("../../data/DataPresentacionProducto.php");
	include ("../../data/BDConexion.php");
	include ("../../dominio/PresentacionProducto.php");
class ControladoraGetPresentacionProducto {

		
	function ControladoraGetPrecentacionProducto(){
	}

	function obtenerPresentacionesProductos(){		
		$data = new DataPresentacionProducto;
		$lista =$data->getPresentacionesProductos();
		if(!$lista){
			return false;
		}else{
			return $lista;
		}
	}

	function obtenerPresentacionProducto($id){
	
		$data = new DataPresentacionProducto;
		$presentacionProducto =$data->getPresentacionProducto($id);
		if(!$presentacionProducto){
			return false;
		}else{
			return $presentacionProducto;
		}
	}
}
?>