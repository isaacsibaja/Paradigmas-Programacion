<?php
	
	include ("../../data/BDConexion.php");
	include ("../../data/DataProducto.php");	
	include ("../../dominio/Producto.php");
	include ("../../data/DataCategoria.php");	
	include ("../../dominio/Categoria.php");

class ControladoraGetProductoCategoria {

		
	function ControladoraGetProductoCategoria(){
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
	function obtenerCategorias(){		
		$data = new DataCategoria;
		$lista =$data->getCategorias();
		if(!$lista){
			return false;
		}else{
			return $lista;
		}
	}
}
?>