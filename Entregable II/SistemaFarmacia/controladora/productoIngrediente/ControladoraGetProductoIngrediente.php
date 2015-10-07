<?php
	include ("../../data/DataProductoIngrediente.php");
	include ("../../data/BDConexion.php");
	include ("../../dominio/ProductoIngrediente.php");

	include ("../../data/DataIngredienteActivo.php");
	include ("../../dominio/IngredienteActivo.php");

	include ("../../data/DataProducto.php");
	include ("../../dominio/Producto.php");
class ControladoraGetProductoIngrediente {
		
	function ControladoraGetProductoIngrediente(){
	}

	function obtenerProductoIngredientes(){		
		$data = new DataProductoIngrediente;
		$lista =$data->getProductoIngredientes();
		if(!$lista){
			return false;
		}else{
			return $lista;
		}
	}

	function obtenerProductoIngrediente($id){
	
		$data = new DataProductoIngrediente;
		$IngredienteActivo =$data->getProductoIngrediente($idP, $idI);
		if(!$IngredienteActivo){
			return false;
		}else{
			return $IngredienteActivo;
		}
	}

	function obtenerProductoIngredientesSimple($id){		
		$data = new DataProductoIngrediente;
		$lista =$data->getProductoIngredienteSimple($id);
		if(!$lista){
			return false;
		}else{
			return $lista;
		}
	}

	function obtenerIngredienteActivos(){		
		$data = new DataIngredienteActivo;
		$lista =$data->getIngredienteActivos();
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