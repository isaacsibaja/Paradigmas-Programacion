<?php
class AgenteVentas{
		
	
	private	$idAgenteVenta;
	private	$nombreAgente;
	private	$telefonoAgente;
	private	$correoAgente;

	function AgenteVentas( $idAgenteVenta, $nombreAgente, $telefonoAgente,
	 $correoAgente){
		$this->setIdAgenteVenta($idAgenteVenta);
		$this->setNombreAgente($nombreAgente);
		$this->setTelefonoAgente($telefonoAgente);
		$this->setCorreoAgente($correoAgente);		
	}


	public function setIdAgenteVenta($idAgenteVenta) {
		$this->idAgenteVenta = $idAgenteVenta;
	}
	public function getIdAgenteVenta() {
		return $this->idAgenteVenta;
	}

	public function setNombreAgente($nombreAgente) {
		$this->nombreAgente = $nombreAgente;
	}
	public function getNombreAgente() {
		return $this->nombreAgente;
	}

	public function setTelefonoAgente($telefonoAgente) {
		$this->telefonoAgente = $telefonoAgente;
	}
	public function getTelefonoAgente() {
		return $this->telefonoAgente;
	}

	public function setCorreoAgente($correoAgente) {
		$this->correoAgente = $correoAgente;
	}
	public function getCorreoAgente() {
		return $this->correoAgente;
	}
}
?>