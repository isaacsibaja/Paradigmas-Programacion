<?php
	include ("../../data/DataIngredienteActivo.php");
	include ("../../data/BDConexion.php");
	include ("../../dominio/IngredienteActivo.php");
class ControladoraGetIngredienteActivo {

		
	function ControladoraGetIngredienteActivo(){
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

	function obtenerIngredienteActivo($id){
	
		$data = new DataIngredienteActivo;
		$IngredienteActivo =$data->getIngredienteActivo($id);
		if(!$IngredienteActivo){
			return false;
		}else{
			return $IngredienteActivo;
		}
	}
}
?>