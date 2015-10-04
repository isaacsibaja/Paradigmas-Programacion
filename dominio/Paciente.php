<?php
class Paciente{
		
	
	private	$idPaciente;
	private	$cedula;
	private	$nombre;
	private	$apellido1;
	private	$apellido2;
	private	$direccion;
	private	$telefono;
	private	$correo;
	private	$contrasenia;

	function Paciente( $idPaciente, $cedula, $nombre,
	 $apellido1, $apellido2, $direccion, 
	 $telefono, $correo, $contrasenia){
		
		$this->setIdPaciente($idPaciente);
		$this->setCedula($cedula);
		$this->setNombre($nombre);
		$this->setApellido1($apellido1);
		$this->setApellido2($apellido2);
		$this->setDireccion($direccion);	
		$this->setTelefono($telefono);
		$this->setCorreo($correo);
		$this->setContrasenia($contrasenia);	
	}


	public function setIdPaciente($idPaciente) {
		$this->idPaciente = $idPaciente;
	}
	public function getIdPaciente() {
		return $this->idPaciente;
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

	public function setDireccion($direccion) {
		$this->direccion = $direccion;
	}
	public function getDireccion() {
		return $this->direccion;
	}

	public function setTelefono($telefono) {
		$this->telefono = $telefono;
	}
	public function getTelefono() {
		return $this->telefono;
	}

	public function setCorreo($correo) {
		$this->correo = $correo;
	}
	public function getCorreo() {
		return $this->correo;
	}

	public function setContrasenia($contrasenia) {
		$this->contrasenia = $contrasenia;
	}
	public function getContrasenia() {
		return $this->contrasenia;
	}

}

?>