<?php
class Receta{
		
	
	private	$idReceta;
	private	$idProducto;
	private	$idPaciente;
	

	function Receta( $idReceta, $idProducto, $idPaciente{

		$this->setIdReceta($idReceta);
		$this->setIdProducto($idProducto);
		$this->setIdPaciente($idPaciente);
		

	public function setIdReceta($idReceta) {
		$this->idReceta = $idReceta;
	}
	public function getIdReceta() {
		return $this->idReceta;
	}

	public function setIdProducto($idProducto) {
		$this->idProducto = $idProducto;
	}
	public function getIdProducto() {
		return $this->idProducto;
	}

	public function setIdPaciente($idPaciente) {
		$this->idPaciente = $idPaciente;
	}
	public function getIdPaciente() {
		return $this->idPaciente;
	}

}

?>