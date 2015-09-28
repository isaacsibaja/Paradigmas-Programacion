<?php
	include ("../../data/DataTipoPago.php");
	include ("../../data/BDConexion.php");
	include ("../../dominio/TipoPago.php");
class ControladoraGetTipoPago {

		
	function ControladoraGetTipoPago(){
	}

	function obtenerTipoPagos(){
	
		$data = new DataTipoPago;
		$TipoPago =$data->getTipoPagos();
		if(!$TipoPago){
			return false;
		}else{
			return $TipoPago;
		}
	}
}
?>