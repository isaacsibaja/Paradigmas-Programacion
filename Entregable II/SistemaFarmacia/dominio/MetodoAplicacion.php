<?php
class MetodoAplicacion{
		
	
	private	$idMetodoAplicacion;
	private	$descripcionAplicacion;
	

	function MetodoAplicacion( $idMetodoAplicacion, $descripcionAplicacion){
		$this->setIdMetodoAplicacion($idMetodoAplicacion);
		$this->setDescripcionAplicacion($descripcionAplicacion);
				
	}


	public function setIdMetodoAplicacion($idMetodoAplicacion) {
		$this->idMetodoAplicacion = $idMetodoAplicacion;
	}
	public function getIdMetodoAplicacion() {
		return $this->idMetodoAplicacion;
	}

	public function setDescripcionAplicacion($descripcionAplicacion) {
		$this->descripcionAplicacion = $descripcionAplicacion;
	}
	public function getDescripcionAplicacion() {
		return $this->descripcionAplicacion;
	}

}

?>