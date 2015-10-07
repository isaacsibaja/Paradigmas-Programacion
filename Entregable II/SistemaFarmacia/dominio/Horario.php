<?php
class Horario{
		
	
	private	$id;
	private	$fecha;
	private	$hora;
	private	$asunto;
	private	$correo;
	

	function Horario( $id, $fecha, $hora, $asunto, $correo){
		$this->setId($id);
		$this->setFecha($fecha);
		$this->setHora($hora);
		$this->setCorreo($correo);
		$this->setAsunto($asunto);
	}


	public function setId($id) {
		$this->id = $id;
	}
	public function getId() {
		return $this->id;
	}

	public function setFecha($fecha) {
		$this->fecha = $fecha;
	}
	public function getFecha() {
		return $this->fecha;
	}

	public function setHora($hora) {
		$this->hora = $hora;
	}
	public function getHora() {
		return $this->hora;
	}
	public function setCorreo($correo) {
		$this->correo = $correo;
	}
	public function getCorreo() {
		return $this->correo;
	}

	public function setAsunto($asunto) {
		$this->asunto = $asunto;
	}
	public function getAsunto() {
		return $this->asunto;
	}
}
?>