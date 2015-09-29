<?php
	include ("../../data/DataInventario.php");
	include ("../../data/BDConexion.php");
	include ("../../dominio/Inventario.php");
class ControladoraGetInventario {

		
	function ControladoraGetInventario(){
	}

	function obtenerInventarios(){		
		$data = new DataInventario;
		$lista =$data->getInventarios();
		if(!$lista){
			return false;
		}else{
			return $lista;
		}
	}

	function obtenerInventario($id){
	
		$data = new DataInventario;
		$inventario =$data->getInventario($id);
		if(!$inventario){
			return false;
		}else{
			return $inventario;
		}
	}
}
?>