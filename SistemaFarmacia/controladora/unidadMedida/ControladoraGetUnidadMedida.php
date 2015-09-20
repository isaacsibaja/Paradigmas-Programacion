<?php
	include ("../../data/DataUnidadMedida.php");
	include ("../../data/BDConexion.php");
	include ("../../dominio/unidadMedida.php");
class ControladoraGetunidadMedida {

		
	function ControladoraGetUnidadMedida(){
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

	function obtenerUnidadMedida($id){
	
		$data = new DataUnidadMedida;
		$unidadMedida =$data->get_unidadMedida($id);
		if(!$unidadMedida){
			return false;
		}else{
			return $unidadMedida;
		}
	}
}
?>