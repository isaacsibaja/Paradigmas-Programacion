<?php
	include ("../../data/DataTipoProducto.php");
	include ("../../data/BDConexion.php");
	include ("../../dominio/TipoProducto.php");
class ControladoraGetTipoProducto {

		
	function ControladoraGetTipoProducto(){
	}

	function obtenerTiposProductos(){		
		$data = new DataTipoProducto;
		$lista =$data->getTiposProductos();
		if(!$lista){
			return false;
		}else{
			return $lista;
		}
	}

	function obtenerTipoProducto($id){
	
		$data = new DataTipoProducto;
		$tipoProducto =$data->getTipoProducto($id);
		if(!$tipoProducto){
			return false;
		}else{
			return $tipoProducto;
		}
	}
}
?>