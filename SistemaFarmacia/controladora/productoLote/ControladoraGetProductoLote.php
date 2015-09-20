<?php

	include ("../../data/BDConexion.php");

	include ("../../data/DataProductoLote.php");
	include ("../../dominio/ProductoLote.php");

	include ("../../data/DataProducto.php");
	include ("../../dominio/Producto.php");

	include ("../../data/DataAgenteVentas.php");
	include ("../../dominio/AgenteVentas.php");

class ControladoraGetProductoLote {

		
	function ControladoraGetProductoLote(){
	}

	function obtenerProductoLotes(){		
		$data = new DataProductoLote;
		$lista =$data->getProductoLotes();
		if(!$lista){
			return false;
		}else{
			return $lista;
		}
	}

	function obtenerProductoLote($id){
	
		$data = new DataProductoLote;
		$ProductoLote =$data->getProductoLote($id);
		if(!$ProductoLote){
			return false;
		}else{
			return $ProductoLote;
		}
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

	function obtenerAgentesVentas(){		
		$data = new DataAgenteVentas;
		$lista =$data->get_agentesVentas();
		if(!$lista){
			return false;
		}else{
			return $lista;
		}
	}
}
?>