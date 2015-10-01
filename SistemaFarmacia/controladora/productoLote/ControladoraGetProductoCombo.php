<?php
	
	include ("../../data/BDConexion.php");

	include ("../../data/DataProducto.php");	
	include ("../../dominio/Producto.php");

	include ("../../data/DataCategoria.php");	
	include ("../../dominio/Categoria.php");

	include ("../../data/DataPresentacionProducto.php");
	include ("../../dominio/PresentacionProducto.php");

	include ("../../data/DataUnidadMedida.php");
	include ("../../dominio/UnidadMedida.php");

	include ("../../data/DataTipoProducto.php");
	include ("../../dominio/TipoProducto.php");

class ControladoraGetProductoCombo {

		
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

	function obtenerPresentacionesProductos(){		
		$data = new DataPresentacionProducto;
		$lista =$data->getPresentacionesProductos();
		if(!$lista){
			return false;
		}else{
			return $lista;
		}
	}

	function obtenerUnidadesMedidas(){		
		$data = new DataUnidadMedida;
		$lista =$data->getUnidadesMedidas();
		if(!$lista){
			return false;
		}else{
			return $lista;
		}
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
}
?>