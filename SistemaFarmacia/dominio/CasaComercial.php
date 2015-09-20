<?php
class CasaComercial{
		
	
	private	$idCasaComercial;
	private	$direccionCasaComercial;
	private	$nombreCasaComercial;
	private	$telefonoCasaComercial;
	private	$correoCasaComercial;
	private	$faxCasaComercial;
	

	function CasaComercial( $idCasaComercial, $direccionCasaComercial, $nombreCasaComercial, 
		$telefonoCasaComercial, $correoCasaComercial, $faxCasaComercial ){
		$this->set_idCasaComercial($idCasaComercial);
		$this->set_direccionCasaComercial($direccionCasaComercial);
		$this->set_nombreCasaComercial($nombreCasaComercial);
		$this->set_telefonoCasaComercial($telefonoCasaComercial);
		$this->set_correoCasaComercial($correoCasaComercial);
		$this->set_faxCasaComercial($faxCasaComercial);
	}


	public function set_idCasaComercial($idCasaComercial) {
		$this->idCasaComercial = $idCasaComercial;
	}
	public function get_idCasaComercial() {
		return $this->idCasaComercial;
	}

	public function set_direccionCasaComercial($direccionCasaComercial) {
		$this->direccionCasaComercial = $direccionCasaComercial;
	}
	public function get_direccionCasaComercial() {
		return $this->direccionCasaComercial;
	}

	public function set_nombreCasaComercial($nombreCasaComercial) {
		$this->nombreCasaComercial = $nombreCasaComercial;
	}
	public function get_nombreCasaComercial() {
		return $this->nombreCasaComercial;
	}

	public function set_telefonoCasaComercial($telefonoCasaComercial) {
		$this->telefonoCasaComercial = $telefonoCasaComercial;
	}
	public function get_telefonoCasaComercial() {
		return $this->telefonoCasaComercial;
	}

	public function set_correoCasaComercial($correoCasaComercial) {
		$this->correoCasaComercial = $correoCasaComercial;
	}
	public function get_correoCasaComercial() {
		return $this->correoCasaComercial;
	}

	public function set_faxCasaComercial($faxCasaComercial) {
		$this->faxCasaComercial = $faxCasaComercial;
	}
	public function get_faxCasaComercial() {
		return $this->faxCasaComercial;
	}
}



?>