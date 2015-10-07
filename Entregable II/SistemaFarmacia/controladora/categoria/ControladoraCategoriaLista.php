<?php
	include ("../../data/DataCategoria.php");
	include ("../../data/BDConexion.php");
	include ("../../dominio/Categoria.php");
class ControladoraCategoriaLista {

		
	function ControladoraCategoriaLista(){
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

	function obtenerCategoria($idCategoria){
	
		$data = new DataCategoria;
		$miCategoria =$data->getCategoria($idCategoria);
		if(!$miCategoria){
			return false;
		}else{
			return $miCategoria;
		}
	}
}
?>