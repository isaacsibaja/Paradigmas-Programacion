<?php
class Sintoma{
		
	
	private	$idSintoma;
	private	$descripcionSintoma;
	
	function Sintoma( $idSintoma, $descripcionSintoma){

		$this->setIdSintoma($idSintoma);
		$this->setDescripcionSintoma($descripcionSintoma);
				
	}


	public function setIdSintoma($idSintoma) {
		$this->idSintoma = $idSintoma;
	}
	public function getIdSintoma() {
		return $this->idSintoma;
	}

	public function setDescripcionSintoma($descripcionSintoma) {
		$this->descripcionSintoma = $descripcionSintoma;
	}
	public function getDescripcionSintoma() {
		return $this->descripcionSintoma;
	}

}

?>