<?php
class Factura{
		
	
	private	$idFactura;
	private	$idReceta;
	private	$idTipoPago;
	private	$fecha;
	private	$montoTotal;
	

	function Factura( $idFactura, $idReceta, $idTipoPago,
	 $fecha, $montoTotal){

		$this->setIdFactura($idFactura);
		$this->setIdReceta($idReceta);
		$this->setIdTipoPago($idTipoPago);
		$this->setFecha($fecha);
		$this->setMontoTotal($montoTotal);
				
	}


	public function setIdFactura($idFactura) {
		$this->idFactura = $idFactura;
	}
	public function getIdFactura() {
		return $this->idFactura;
	}

	public function setIdReceta($idReceta) {
		$this->idReceta = $idReceta;
	}
	public function getIdReceta() {
		return $this->idReceta;
	}

	public function setIdTipoPago($idTipoPago) {
		$this->idTipoPago = $idTipoPago;
	}
	public function getIdTipoPago() {
		return $this->idTipoPago;
	}

	public function setFecha($fecha) {
		$this->fecha = $fecha;
	}
	public function getFecha() {
		return $this->fecha;
	}

	public function setMontoTotal($montoTotal) {
		$this->montoTotal = $montoTotal;
	}
	public function getMontoTotal() {
		return $this->montoTotal;
	}

}

?>