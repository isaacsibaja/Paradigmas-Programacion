<?php
	include ("../../data/DataSintoma.php");
	include ("../../data/BDConexion.php");
	include ("../../dominio/Sintoma.php");
class ControladoraGetSintoma {

	function ControladoraGetSintoma(){
	}

	function obtenerSintomas($id){		
		$data = new DataSintoma;
		$lista =$data->getSintomas($id);
		if(!$lista){
			return false;
		}else{
			return $lista;
		}
	}
}
?>