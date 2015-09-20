<?php
class unidadMedida{
		
	
	private	$idUnidadMedida;
	private	$descripcionUnidad;
	

	function unidadMedida( $idUnidadMedida, $descripcionUnidad){
		$this->set_idUnidadMedida($idUnidadMedida);
		$this->set_descripcionUnidad($descripcionUnidad);
	}


	public function set_idUnidadMedida($idUnidadMedida) {
		$this->idUnidadMedida = $idUnidadMedida;
	}
	public function get_idUnidadMedida() {
		return $this->idUnidadMedida;
	}

	public function set_descripcionUnidad($descripcionUnidad) {
		$this->descripcionUnidad = $descripcionUnidad;
	}
	public function get_descripcionUnidad() {
		return $this->descripcionUnidad;
	}
}
?>