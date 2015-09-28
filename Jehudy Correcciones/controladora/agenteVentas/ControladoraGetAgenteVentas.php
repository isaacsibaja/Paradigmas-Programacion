<?php
	include ("../../data/DataAgenteVentas.php");
	include ("../../data/BDConexion.php");
	include ("../../dominio/AgenteVentas.php");
class ControladoraGetAgenteVentas {

		
	function ControladoraGetAgenteVentas(){
	}

	function obtenerAgentesVentas(){		
		$data = new DataAgenteVentas;
		$lista =$data->getAgentesVentas();
		if(!$lista){
			return false;
		}else{
			return $lista;
		}
	}

	function obtenerAgenteVentas($id){
	
		$data = new DataAgenteVentas;
		$agenteVentas =$data->getAgenteVentas($id);
		if(!$agenteVentas){
			return false;
		}else{
			return $agenteVentas;
		}
	}
}
?>