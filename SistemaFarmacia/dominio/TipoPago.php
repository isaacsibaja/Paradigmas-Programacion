<?php
class TipoPago{
		
	
	private	$idTipoPago;
	private	$descripcion;
	

	function TipoPago( $idTipoPago, $descripcion){
		$this->set_idTipoPago($idTipoPago);
		$this->set_descripcion($descripcion);
				
	}

	public function set_idTipoPago($idTipoPago) {
		$this->idTipoPago = $idTipoPago;
	}
	public function get_idTipoPago() {
		return $this->idTipoPago;
	}

	public function set_descripcion($descripcion) {
		$this->descripcion = $descripcion;
	}
	public function get_descripcion() {
		return $this->descripcion;
	}

}


?>