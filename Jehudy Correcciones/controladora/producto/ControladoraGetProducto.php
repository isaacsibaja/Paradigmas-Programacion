<?php
	include ("../../data/DataProducto.php");
	include ("../../data/BDConexion.php");
	include ("../../dominio/Producto.php");
class ControladoraGetProducto {

		
	function ControladoraGetProducto(){
	}

	function obtenerProductos(){		
		$data = new DataProducto;
		$lista =$data->getProductos();
		if(!$lista){
			return false;
		}else{
			return $lista;
		}
	}

	function obtenerProducto($id){
	
		$data = new DataProducto;
		$producto =$data->getProducto($id);
		if(!$producto){
			return false;
		}else{
			return $producto;
		}
	}
}
?>