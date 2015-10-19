<?php
class Registro{
		
	
	private	$cedula;
	private	$nombre;
	private	$apellido1;
	private	$apellido2;

	function Registro( $cedula, $nombre, $apellido1,
	 $apellido2){
		$this->setcedula($cedula);
		$this->setnombre($nombre);
		$this->setapellido1($apellido1);
		$this->setapellido2($apellido2);		
	}


	public function setCedula($cedula) {
		$this->cedula = $cedula;
	}
	public function getCedula() {
		return $this->cedula;
	}

	public function setNombre($nombre) {
		$this->nombre = $nombre;
	}
	public function getNombre() {
		return $this->nombre;
	}

	public function setApellido1($apellido1) {
		$this->apellido1 = $apellido1;
	}
	public function getApellido1() {
		return $this->apellido1;
	}

	public function setApellido2($apellido2) {
		$this->apellido2 = $apellido2;
	}
	public function getApellido2() {
		return $this->apellido2;
	}


}

?>