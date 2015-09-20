<?php
	include ("../../data/DataTipoPago.php");
	include ("../../data/BDConexion.php");
	include ("../../dominio/TipoPago.php");
class ControladoraGetTipoPago {

		
	function ControladoraGetTipoPago(){
	}

	function obtenerTipoPagos(){
	
		$data = new DataTipoPago;
		$TipoPago =$data->get_tipoPagos();
		if(!$TipoPago){
			return false;
		}else{
			return $TipoPago;
		}
	}
}
?>