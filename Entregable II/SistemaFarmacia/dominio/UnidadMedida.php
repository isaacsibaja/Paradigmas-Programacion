<?php
class UnidadMedida{
		
	
	private	$idUnidadMedida;
	private	$descripcionUnidad;
	

	function unidadMedida( $idUnidadMedida, $descripcionUnidad){
		$this->setIdUnidadMedida($idUnidadMedida);
		$this->setDescripcionUnidad($descripcionUnidad);
	}


	public function setIdUnidadMedida($idUnidadMedida) {
		$this->idUnidadMedida = $idUnidadMedida;
	}
	public function getIdUnidadMedida() {
		return $this->idUnidadMedida;
	}

	public function setDescripcionUnidad($descripcionUnidad) {
		$this->descripcionUnidad = $descripcionUnidad;
	}
	public function getDescripcionUnidad() {
		return $this->descripcionUnidad;
	}
}
?>