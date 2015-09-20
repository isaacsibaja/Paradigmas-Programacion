<?php
class AgenteVentas{
		
	
	private	$idAgenteVenta;
	private	$nombreAgente;
	private	$telefonoAgente;
	private	$correoAgente;

	function AgenteVentas( $idAgenteVenta, $nombreAgente, $telefonoAgente,
	 $correoAgente){
		$this->set_idAgenteVenta($idAgenteVenta);
		$this->set_nombreAgente($nombreAgente);
		$this->set_telefonoAgente($telefonoAgente);
		$this->set_correoAgente($correoAgente);		
	}


	public function set_idAgenteVenta($idAgenteVenta) {
		$this->idAgenteVenta = $idAgenteVenta;
	}
	public function get_idAgenteVenta() {
		return $this->idAgenteVenta;
	}

	public function set_nombreAgente($nombreAgente) {
		$this->nombreAgente = $nombreAgente;
	}
	public function get_nombreAgente() {
		return $this->nombreAgente;
	}

	public function set_telefonoAgente($telefonoAgente) {
		$this->telefonoAgente = $telefonoAgente;
	}
	public function get_telefonoAgente() {
		return $this->telefonoAgente;
	}

	public function set_correoAgente($correoAgente) {
		$this->correoAgente = $correoAgente;
	}
	public function get_correoAgente() {
		return $this->correoAgente;
	}
}
?>