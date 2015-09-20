<?php
	include ("../../data/DataTipoProducto.php");
	include ("../../data/BDConexion.php");
	include ("../../dominio/tipoProducto.php");
class ControladoraGetTipoProducto {

		
	function ControladoraGetTipoProducto(){
	}

	function obtenerTiposProductos(){		
		$data = new DataTipoProducto;
		$lista =$data->get_tiposProductos();
		if(!$lista){
			return false;
		}else{
			return $lista;
		}
	}

	function obtenerTipoProducto($id){
	
		$data = new DataTipoProducto;
		$tipoProducto =$data->get_tipoProducto($id);
		if(!$tipoProducto){
			return false;
		}else{
			return $tipoProducto;
		}
	}
}
?>