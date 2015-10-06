<?php
class Enfermedad{
		
	
	private	$idEnfermedad;
	private	$nombreCientifico;
	private	$nombreComun;
	
	function Enfermedad( $idEnfermedad, $nombreCientifico, $nombreComun){

		$this->setIdEnfermedad($idEnfermedad);
		$this->setNombreCientifico($nombreCientifico);
		$this->setNombreComun($nombreComun);
		


	public function setIdEnfermedad($idEnfermedad) {
		$this->idEnfermedad = $idEnfermedad;
	}
	public function getIdEnfermedad() {
		return $this->idEnfermedad;
	}

	public function setNombreCientifico($nombreCientifico) {
		$this->nombreCientifico = $nombreCientifico;
	}
	public function getNombreCientifico() {
		return $this->nombreCientifico;
	}

	public function setNombreComun($nombreComun) {
		$this->nombreComun = $nombreComun;
	}
	public function getNombreComun() {
		return $this->nombreComun;
	}


}

?>