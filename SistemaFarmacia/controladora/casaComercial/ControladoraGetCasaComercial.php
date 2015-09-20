<?php
	include ("../../data/DataCasaComercial.php");
	include ("../../data/BDConexion.php");
	include ("../../dominio/CasaComercial.php");
class ControladoraGetCasaComercial {

		
	function ControladoraGetCasaComercial(){
	}

	function obtenerCasasComerciales(){		
		$data = new DataCasaComercial;
		$lista =$data->get_casasComerciales();
		if(!$lista){
			return false;
		}else{
			return $lista;
		}
	}

	function obtenerCasaComercial($id){
	
		$data = new DataCasaComercial;
		$casaComercial =$data->get_casaComercial($id);
		if(!$casaComercial){
			return false;
		}else{
			return $casaComercial;
		}
	}
}
?>