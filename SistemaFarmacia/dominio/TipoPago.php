<?php
class TipoPago{
		
	
	private	$idTipoPago;
	private	$descripcion;
	

	function TipoPago( $idTipoPago, $descripcion){
		$this->setIdTipoPago($idTipoPago);
		$this->setDescripcion($descripcion);
				
	}

	public function setIdTipoPago($idTipoPago) {
		$this->idTipoPago = $idTipoPago;
	}
	public function getIdTipoPago() {
		return $this->idTipoPago;
	}

	public function setDescripcion($descripcion) {
		$this->descripcion = $descripcion;
	}
	public function getDescripcion() {
		return $this->descripcion;
	}

}


?>