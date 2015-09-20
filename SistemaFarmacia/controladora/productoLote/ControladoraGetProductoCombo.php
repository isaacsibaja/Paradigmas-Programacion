<?php
	
	include ("../../data/BDConexion.php");

	include ("../../data/DataProducto.php");	
	include ("../../dominio/Producto.php");

	include ("../../data/DataCategoria.php");	
	include ("../../dominio/Categoria.php");

	include ("../../data/DataPrecentacionProducto.php");
	include ("../../dominio/precentacionProducto.php");

	include ("../../data/DataUnidadMedida.php");
	include ("../../dominio/unidadMedida.php");

	include ("../../data/DataTipoProducto.php");
	include ("../../dominio/tipoProducto.php");

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
		$lista =$data->getcategorias();
		if(!$lista){
			return false;
		}else{
			return $lista;
		}
	}

	function obtenerPresentacionesProductos(){		
		$data = new DataPrecentacionProducto;
		$lista =$data->get_precentacionesProductos();
		if(!$lista){
			return false;
		}else{
			return $lista;
		}
	}

	function obtenerUnidadesMedidas(){		
		$data = new DataUnidadMedida;
		$lista =$data->get_unidadesMedidas();
		if(!$lista){
			return false;
		}else{
			return $lista;
		}
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
}
?>