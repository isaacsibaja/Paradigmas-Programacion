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
		$this->setIdCasaComercial($idCasaComercial);
		$this->setDireccionCasaComercial($direccionCasaComercial);
		$this->setNombreCasaComercial($nombreCasaComercial);
		$this->setTelefonoCasaComercial($telefonoCasaComercial);
		$this->setCorreoCasaComercial($correoCasaComercial);
		$this->setFaxCasaComercial($faxCasaComercial);
	}


	public function setIdCasaComercial($idCasaComercial) {
		$this->idCasaComercial = $idCasaComercial;
	}
	public function getIdCasaComercial() {
		return $this->idCasaComercial;
	}

	public function setDireccionCasaComercial($direccionCasaComercial) {
		$this->direccionCasaComercial = $direccionCasaComercial;
	}
	public function getDireccionCasaComercial() {
		return $this->direccionCasaComercial;
	}

	public function setNombreCasaComercial($nombreCasaComercial) {
		$this->nombreCasaComercial = $nombreCasaComercial;
	}
	public function getNombreCasaComercial() {
		return $this->nombreCasaComercial;
	}

	public function setTelefonoCasaComercial($telefonoCasaComercial) {
		$this->telefonoCasaComercial = $telefonoCasaComercial;
	}
	public function getTelefonoCasaComercial() {
		return $this->telefonoCasaComercial;
	}

	public function setCorreoCasaComercial($correoCasaComercial) {
		$this->correoCasaComercial = $correoCasaComercial;
	}
	public function getCorreoCasaComercial() {
		return $this->correoCasaComercial;
	}

	public function setFaxCasaComercial($faxCasaComercial) {
		$this->faxCasaComercial = $faxCasaComercial;
	}
	public function getFaxCasaComercial() {
		return $this->faxCasaComercial;
	}
}



?>