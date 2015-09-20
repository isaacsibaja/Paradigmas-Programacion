<?php
	include ("../../data/DataPrecentacionProducto.php");
	include ("../../data/BDConexion.php");
	include ("../../dominio/precentacionProducto.php");
class ControladoraGetPrecentacionProducto {

		
	function ControladoraGetPrecentacionProducto(){
	}

	function obtenerPrecentacionesProductos(){		
		$data = new DataPrecentacionProducto;
		$lista =$data->get_precentacionesProductos();
		if(!$lista){
			return false;
		}else{
			return $lista;
		}
	}

	function obtenerPrecentacionProducto($id){
	
		$data = new DataPrecentacionProducto;
		$precentacionProducto =$data->get_precentacionProducto($id);
		if(!$precentacionProducto){
			return false;
		}else{
			return $precentacionProducto;
		}
	}
}
?>