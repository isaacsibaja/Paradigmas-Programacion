<?php
class IngredienteActivo{
		
	
	private	$idIngredienteActivo;
	private	$descripcionIngrediente;
	

	function IngredienteActivo( $idIngredienteActivo, $descripcionIngrediente){
		$this->setIdIngredienteActivo($idIngredienteActivo);
		$this->setDescripcionIngrediente($descripcionIngrediente);
				
	}

	public function setIdIngredienteActivo($idIngredienteActivo) {
		$this->idIngredienteActivo = $idIngredienteActivo;
	}
	public function getIdIngredienteActivo() {
		return $this->idIngredienteActivo;
	}

	public function setDescripcionIngrediente($descripcionIngrediente) {
		$this->descripcionIngrediente = $descripcionIngrediente;
	}
	public function getDescripcionIngrediente() {
		return $this->descripcionIngrediente;
	}

}


?>