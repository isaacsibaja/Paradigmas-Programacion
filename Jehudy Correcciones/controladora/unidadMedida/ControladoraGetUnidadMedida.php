<?php
	include ("../../data/DataUnidadMedida.php");
	include ("../../data/BDConexion.php");
	include ("../../dominio/UnidadMedida.php");
class ControladoraGetunidadMedida {

		
	function ControladoraGetUnidadMedida(){
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

	function obtenerUnidadMedida($id){
	
		$data = new DataUnidadMedida;
		$unidadMedida =$data->getUnidadMedida($id);
		if(!$unidadMedida){
			return false;
		}else{
			return $unidadMedida;
		}
	}
}
?>